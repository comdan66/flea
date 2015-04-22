<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */
class Mail extends Delay_controller {

  public function __construct () {
    parent::__construct ();
  }

  public function confirm () {
    $temp_user_id = $this->input_post ('temp_user_id');
    $code = $this->input_post ('code');
    
    if (($temp = TempUser::find_by_id ($temp_user_id)) && ($temp->code === md5 ($code)) && ($temp->user_id == null)) {
      $this->load->library ('OaMailGun');
      $mail = new OaMailGun ();
      
      return ;

      $msg = "Hi " . $temp->name . ",\n\n\n    非常感謝您的加入，現在只差最後一個步驟了，請點擊下列網址以啟動您的帳號吧！\n\n驗證網址: " . base_url ('verify', $code) . "\n\n\n--\n\n此為系統信件，請勿直接回復。\n";
      $result = $mail->sendMessage (array (
                  'from' => Cfg::setting ('mail_gun', 'user', 'system', 'name') . ' <' . Cfg::setting ('mail_gun', 'user', 'system', 'email') . '>',
                  'to' => $temp->name . ' <' . $temp->email . '>',
                  'subject' => "OA's Flea 系統通知",
                  'text' => $msg
                ));

      if ($result && isset ($result->http_response_code) && ($result->http_response_code == 200)) {
        $temp->mail_count = $temp->mail_count + 1;
        $temp->save ();        
      }
    }
  }
}
