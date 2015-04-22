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
        array ('name' => '首頁', 'href' => base_url (), 'show' => true),
        array ('name' => 'Apple', 'href' => base_url ('apples'), 'show' => true),
        ),
      'r' => array (
        array ('name' => '登入', 'href' => base_url ('platform/login'), 'show' => identity ()->user () ? false : true),
        array ('name' => '登出', 'href' => base_url ('platform/logout'), 'show' => identity ()->user () ? true : false),
        array ('name' => '註冊', 'href' => base_url ('platform/register'), 'show' => identity ()->user () ? false : true),
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

  /* render_cell ('frame_cell', 'pagination', $pagination); */
  // public function _cache_pagination () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function pagination ($pagination) {
    return $this->setUseCssList (true)
                ->load_view (array ('pagination' => $pagination));
  }
}