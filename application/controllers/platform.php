<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Platform extends Site_controller {

  public function __construct () {
    parent::__construct ();
  }

  public function login () {
    if (identity ()->user ())
      return redirect ('');

    $message = identity ()->get_session ('_flash_message', true);
    $email   = identity ()->get_session ('email', true);

    $this->load_view (array ('message' => $message, 'email' => $email));
  }

  public function signin () {
    if (!$this->has_post ())
      return redirect (array ($this->get_class (), 'login'));

    if (identity ()->user ())
      return redirect ('');

    $email    = trim ($this->input_post ('email'));
    $password = trim ($this->input_post ('password'));

    if (!($user = User::find ('one', array ('select' => 'id, login_count, logined_at', 'conditions' => array ('email = ? AND password = ?', $email, md5 ($password))))))
      return identity ()->set_session ('_flash_message', '登入失敗，請再確認一次信箱與密碼！', true)
                        ->set_session ('email', $email, true) && redirect (array ($this->get_class (), 'login'), 'refresh');

    $user->login_count = $user->login_count + 1;
    $user->logined_at = date ('Y-m-d H:i:s');
    $user->save ();

    identity ()->set_session ('user_id', $user->id);
    return redirect ('');
  }

  public function logout () {
    if (!identity ()->user ())
      return redirect ('');

    identity ()->set_session ('user_id', 0);
    return redirect ('');
  }

  public function register () {
    if (identity ()->user ())
      return redirect ('');

    $message = identity ()->get_session ('_flash_message', true);
    $name    = identity ()->get_session ('name', true);
    $email   = identity ()->get_session ('email', true);

    $this->load_view (array ('message' => $message, 'name' => $name, 'email' => $email));
  }
  public function email () {
    if (!$this->has_post ())
      return redirect (array ($this->get_class (), 'register'));

    if (identity ()->user ())
      return redirect ('');

    $name        = trim ($this->input_post ('name'));
    $email       = trim ($this->input_post ('email'));
    $password    = trim ($this->input_post ('password'));
    $re_password = trim ($this->input_post ('re_password'));

    $message = '';
    if (!$message && !preg_match (Cfg::setting ('format', 'user', 'name'), $name))
      $message = '暱稱格式錯誤！';

    if (!$message && !preg_match (Cfg::setting ('format', 'user', 'email'), $email))
      $message = '電子郵件格式錯誤！';

    if (!$message && !preg_match (Cfg::setting ('format', 'user', 'password'), $password))
      $message = '密碼格式錯誤！';

    if (!$message && !(($password === $re_password) && preg_match (Cfg::setting ('format', 'user', 'password'), $re_password)))
      $message = '確認密碼錯誤！';

    if (!$message && ($user = User::find ('one', array ('select' => 'id', 'conditions' => array ('email = ?', $email)))))
      $message = '電子郵件已經被使用！';

    if ($message)
      return identity ()->set_session ('_flash_message', $message, true)
                        ->set_session ('name', $name, true)
                        ->set_session ('email', $email, true) && redirect (array ($this->get_class (), 'register'), 'refresh');
    
    $code = md5 (uniqid (rand () . '_' . time () . '_'));
    if ($temp = TempUser::find ('one', array ('conditions' => array ('email = ? AND user_id IS NULL', $email)))) {
      $temp->password = password ($password);
      $temp->name = $name;
      $temp->code = md5 ($code);

      if (!$temp->save ())
        return identity ()->set_session ('_flash_message', '註冊失敗，請重新填寫表單！', true)
                          ->set_session ('name', $name, true)
                          ->set_session ('email', $email, true) && redirect (array ($this->get_class (), 'register'), 'refresh');
    } else {
      if (!($temp = TempUser::create (array ('name' => $name, 'email' => $email, 'password' => password ($password), 'code' => md5 ($code), 'user_id' => null, 'mail_count' => 0))))
        return identity ()->set_session ('_flash_message', '註冊失敗，請重新填寫表單！', true)
                          ->set_session ('name', $name, true)
                          ->set_session ('email', $email, true) && redirect (array ($this->get_class (), 'register'), 'refresh');
    }

    delay_job ('email', 'confirm_email', array ('temp_user_id' => $temp->id, 'code' => $code));

    identity ()->set_session ('_flash_pass', true, true);
                          
    return redirect (array ($this->get_class (), 'confirm'));
  }
  public function confirm () {
    if (identity ()->user () || !identity ()->get_session ('_flash_pass', true))
      return redirect ('');

    $this->load_view (null);
  }
  public function verify ($code = '') {
    if (identity ()->user ())
      return redirect ('');

    if (($temp = TempUser::find ('one', array ('conditions' => array ('code = ? AND user_id IS NULL', md5 ($code)))))
      && verifyCreateOrm ($user = User::create (array ('name' => $temp->name, 'email' => $temp->email, 'password' => $temp->password, 'login_count' => 0, 'logined_at' => date ('Y-m-d H:i:s'))))) {

      $temp->user_id = $user->id;
      $temp->save ();
    }

    $this->load_view (array ('user' => isset ($user) && $user ? $user : null));
  }

  public function forget () {
    if (identity ()->user ())
      return redirect ('');

    $message = identity ()->get_session ('_flash_message', true);
    $email   = identity ()->get_session ('email', true);

    $this->load_view (array ('message' => $message, 'email' => $email));      
  }

  public function create () {
    if (!$this->has_post ())
      return redirect (array ($this->get_class (), 'forget'));

    $email = trim ($this->input_post ('email'));

    if (!($user = User::find ('one', array ('conditions' => array ('email = ?', $email)))))
      return identity ()->set_session ('_flash_message', '錯誤！此信箱尚未註冊或驗證！', true)
                        ->set_session ('email', $email, true) && redirect (array ($this->get_class (), 'forget'), 'refresh');
    
    delay_job ('email', 'forgot_password', array ('email' => $email));

    identity ()->set_session ('_flash_pass', true, true);
    return redirect (array ($this->get_class (), 'forgot'));
  }
  public function forgot () {
    if (identity ()->user () || !identity ()->get_session ('_flash_pass', true))
      return redirect ('');

    $this->load_view (null);
  }
}
