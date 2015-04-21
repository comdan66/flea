<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Migration_Add_temp_users extends CI_Migration {
  public function up () {
    $this->db->query (
      "CREATE TABLE `temp_users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '信箱',
        `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密碼',
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密碼',
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '驗證碼',
        `user_id` int(11) DEFAULT '0' COMMENT '驗證過後的 user id，未驗證則 0',
        `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "' COMMENT '註冊時間',
        `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "' COMMENT '更新時間',
        PRIMARY KEY (`id`),
        KEY `code_user_index` (`code`, `user_id`),
        KEY `email_user_index` (`email`, `user_id`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"
    );
  }
  public function down () {
    $this->db->query (
      "DROP TABLE `temp_users`;"
    );
  }
}