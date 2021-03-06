<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class AppleFlea extends OaModel {

  static $table_name = 'apple_fleas';

  static $has_one = array (
  );

  static $has_many = array (
    array ('comments', 'class_name' => 'AppleFleaComment'),
    array ('pictures', 'class_name' => 'AppleFleaPicture'),
    array ('edit_logs', 'class_name' => 'AppleFleaEditLog')
  );

  static $belongs_to = array (
    array ('user', 'class_name' => 'User')
  );

  public function __construct ($attributes = array (), $guard_attributes = true, $instantiating_via_find = false, $new_record = true) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);


  }
}