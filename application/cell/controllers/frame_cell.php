<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Frame_cell extends Cell_Controller {

  /* render_cell ('frame_cell', 'header', array ()); */
  // public function _cache_header () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function header () {
    $as = array (
      'l' => array (
        '首頁' => base_url ()
        ),
      'r' => array (
        '登入' => base_url (array ('login')),
        '登出' => base_url (array ('logout')),
        '註冊' => base_url (array ('register'))
        ),
      );
    return $this->setUseCssList (true)
                ->load_view (array ('as' => $as));
  }

  /* render_cell ('frame_cell', 'footer', array ()); */
  // public function _cache_footer () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function footer () {
    return $this->setUseCssList (true)
                ->load_view ();
  }
}