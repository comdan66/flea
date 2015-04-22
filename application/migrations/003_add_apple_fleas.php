<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Migration_Add_apple_fleas extends CI_Migration {
  public function up () {
    $this->db->query (
      "CREATE TABLE `apple_fleas` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int(11) NOT NULL,
        `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '標題',
        `content` text COMMENT '內容',
        `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '買賣',
        `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '地點',
        `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '標籤',
        `price` int(11) NOT NULL DEFAULT '0' COMMENT '價錢',
        `pv` int(11) NOT NULL DEFAULT '0' COMMENT '瀏覽數',
        `comment_count` int(11) NOT NULL DEFAULT '0' COMMENT '留言數',
        `is_traded` int(11) NOT NULL DEFAULT '0' COMMENT '成交，1 已成交，2 未成交',
        `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
        `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
        PRIMARY KEY (`id`),
        KEY `user_index` (`user_id`),
        KEY `action_index` (`action`),
        KEY `area_index` (`area`),
        KEY `tag_index` (`tag`),
        KEY `action_area_index` (`action`, `area`),
        KEY `action_tag_index` (`action`, `tag`),
        KEY `action_area_tag_index` (`action`, `area`, `tag`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"
    );
  }
  public function down () {
    $this->db->query (
      "DROP TABLE `apple_fleas`;"
    );
  }
}