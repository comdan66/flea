<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Mac_cell extends Cell_Controller {

  /* render_cell ('mac_cell', 'fleas', $mac_fleas); */
  // public function _cache_list () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function fleas ($mac_fleas) {
    return $this->setUseCssList (true)
                ->load_view (array ('mac_fleas' => $mac_fleas));
  }

  /* render_cell ('mac_cell', 'conditions', $qs); */
  // public function _cache_list () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function conditions ($qs) {
    return $this->setUseCssList (true)
                ->load_view (array ('qs' => $qs));
  }
}