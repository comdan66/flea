<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Main extends Site_controller {

  public function __construct () {
    parent::__construct ();
  }

  public function test () {

    # Instantiate the client.
    $mgClient = new Mailgun ('key-049c5f015903ebd825e46dbe546a8db9');
    $domain = "ioa.tw";

    # Make the call to the client.
    $result = $mgClient->sendMessage ($domain, array (
        'from'    => 'Admin <admin@flea.ioa.tw>',
        'to'      => 'comdan66 <comdan66@gmail.com>',
        'subject' => 'Testing Hello',
        'text'    => 'Testing!'
    ));

      // $from = 'comdan66@yahoo.com.tw';
      // $to = 'comdan66@gmail.com';
      // $subject = 'Contact form';

      // $body = '';
      // $body .= "Name: asd\n";
      // $body .= "Email: asdas\n";
      // $body .= "Message: \n\ndasdasdadd\n";
      // mail ($to, $subject, $body, "From: <$from>");
  }
  public function index () {
    $this->load_view (null);
  }

  public function login () {
    if (identity ()->user ())
      return redirect ();

    $message = identity ()->get_session ('_flash_message', true);
    $this->load_view (array ('message' => $message));
  }

  public function signin () {

    $email = trim ($this->input_post ('email'));
    $password = trim ($this->input_post ('password'));

    if ($user = User::find ('one', array ('select' => 'id, login_count, logined_at', 'conditions' => array ('email = ? AND password = ?', $email, md5 ($password))))) {
      $user->login_count = $user->login_count + 1;
      $user->logined_at = date ('Y-m-d H:i:s');
      $user->save ();

      identity ()->set_session ('user_id', $user->id);
      return redirect ('', 'refresh');
    }

    identity ()->set_session ('_flash_message', '登入錯誤囉，請再確認一次！', true);
    return redirect (array ('login'), 'refresh');
  }

  public function logout () {
    if (!identity ()->user ())
      return redirect ();

    identity ()->set_session ('user_id', 0);
    return redirect ('', 'refresh');
  }

  public function register () {
    if (identity ()->user ())
      return redirect ();

    $this->load_view (null);
  }
}
