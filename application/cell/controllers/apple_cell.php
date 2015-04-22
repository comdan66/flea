<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Apple_cell extends Cell_Controller {

  /* render_cell ('apple_cell', 'fleas', $apple_fleas); */
  // public function _cache_list () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function fleas ($fleas) {
    return $this->setUseCssList (true)
                ->load_view (array ('fleas' => $fleas));
  }

  /* render_cell ('apple_cell', 'conditions', $qs); */
  // public function _cache_list () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function conditions ($qs) {
    return $this->setUseCssList (true)
                ->load_view (array ('qs' => $qs));
  }
}