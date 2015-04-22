<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class apples extends Site_controller {

  public function __construct () {
    parent::__construct ();
  }

  public function index ($offset = 0) {
// action
// area
// tag
// price
    $qks = array ('action', 'tag', 'area', 'title');
    $qs = array_filter (array_combine($qks, array_map (function ($q) { return $this->input_get ($q); }, $qks)));
    $temp = array_slice($qs, 0);
    array_walk ($temp, function (&$v, $k) { $v = $k . '=' . $v; });
    $q = implode ('&amp;', $temp);

    $temp = array_slice($qs, 0);
    array_walk ($temp, function (&$v, $k) { $v = $k == 'title' ? ($k . ' LIKE ' . User::escape ('%' . $v . '%')) : ($k . ' = ' . User::escape ($v)); });
    $conditions = array (implode (' AND ', $temp));

    $limit = 25;
    $total = AppleFlea::count (array ('conditions' => $conditions));
    $offset = $offset < $total ? $offset : 0;

    $this->load->library ('pagination');
    $pagination_config = array (
      'total_rows' => $total,
      'num_links' => 5,
      'per_page' => $limit,
      'base_url' => base_url (array ($this->get_class (), '%s', $q ? '?' . $q : '')),
      'first_link' => '第一頁',
      'last_link' => '最後頁',
      'prev_link' => '上一頁',
      'next_link' => '下一頁',
      'uri_segment' => $offset ? 2 : 0,
      'page_query_string' => false,
      'full_tag_open' => '<ul class="pagination">',
      'full_tag_close' => '</ul>',
      'first_tag_open' => '<li>',
      'first_tag_close' => '</li>',
      'prev_tag_open' => '<li>',
      'prev_tag_close' => '</li>',
      'num_tag_open' => '<li>',
      'num_tag_close' => '</li>',
      'cur_tag_open' => '<li class="active"><a href="#">',
      'cur_tag_close' => '</a></li>',
      'next_tag_open' => '<li>',
      'next_tag_close' => '</li>',
      'last_tag_open' => '<li>',
      'last_tag_close' => '</li>',
      );

    $this->pagination->initialize ($pagination_config);
    $pagination = $this->pagination->create_links ();
    
    $apple_fleas = AppleFlea::find ('all', array ('offset' => $offset, 'limit' => $limit, 'order' => 'id DESC', 'conditions' => $conditions));
    
    $this->load_view (array ('pagination' => $pagination, 'apple_fleas' => $apple_fleas, 'qs' => $qs));
  }
}
