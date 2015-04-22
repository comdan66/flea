<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */
class Email extends Delay_controller {

  public function __construct () {
    parent::__construct ();
  }

  private function _random_password ($length = 8) {
    $elements = array_merge (
                  range ('A', 'Z'),
                  range ('a', 'z'),
                  range ('0', '9'),
                  array ('_', '+'));

    $pass = array ();
    for ($i = 0; $i < $length; $i++)
      array_push ($pass, $elements[array_rand ($elements)]);

    return implode ($pass);
  }
  public function confirm_email () {
    $temp_user_id = $this->input_post ('temp_user_id');
    $code = $this->input_post ('code');
    
    if (($temp = TempUser::find_by_id ($temp_user_id)) && ($temp->code === md5 ($code)) && ($temp->user_id == null)) {
      $msg = 'Hi ' . $temp->name . ',<br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;非常感謝您的加入，現在只差最後一個步驟了，請點擊下列網址以啟動您的帳號吧！<br/><br/>驗證網址: <a href="' . base_url ('platform', 'verify', $code) . '" target="_blank">' . base_url ('platform', 'verify', $code) . '</a><br/><br/><br/><font color="#666666">--</font><br/><font color="#777777">' . Cfg::setting ('mail_gun', 'user', 'system', 'signature') . '</font><br/>';

      $this->load->library ('OaMailGun');
      $mail = new OaMailGun ();
      $result = $mail->sendMessage (array (
                  'from' => Cfg::setting ('mail_gun', 'user', 'system', 'name') . ' <' . Cfg::setting ('mail_gun', 'user', 'system', 'email') . '>',
                  'to' => $temp->name . ' <' . $temp->email . '>',
                  'subject' => Cfg::setting ('mail_gun', 'user', 'system', 'subject'),
                  'html' => $msg
                ));

      if ($result && isset ($result->http_response_code) && ($result->http_response_code == 200)) {
        $temp->mail_count = $temp->mail_count + 1;
        $temp->save ();        
      }
    }
  }
  public function forgot_password () {
    $email = $this->input_post ('email');
    if ($user = User::find ('one', array ('select' => 'id, name, email, password', 'conditions' => array ('email = ?', $email)))) {
      $password = $this->_random_password ();
      $user->password = password ($password);
      
      if ($user->save ()) {
        $msg = 'Hi ' . $user->name . ',<br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;系統已經幫您設定了一組新密碼，您現在可以使用這組新密碼<a href="' . base_url (array ('platform', 'login')) . '" target="_blank">登入</a>網站了。<br/><br/>這是您的新密碼: <font color="#bf242c">' . $password . '</font> 登入後記得重新設定個人密碼喔！<br/><br/><br/><font color="#666666">--</font><br/><br/><font color="#777777">' . Cfg::setting ('mail_gun', 'user', 'system', 'signature') . '</font><br/>';

        $this->load->library ('OaMailGun');
        $mail = new OaMailGun ();
        $result = $mail->sendMessage (array (
                    'from' => Cfg::setting ('mail_gun', 'user', 'system', 'name') . ' <' . Cfg::setting ('mail_gun', 'user', 'system', 'email') . '>',
                    'to' => $user->name . ' <' . $user->email . '>',
                    'subject' => Cfg::setting ('mail_gun', 'user', 'system', 'subject'),
                    'html' => $msg
                  ));
      }
    }
  }
}
