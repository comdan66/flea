<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Main extends Site_controller {

  public function __construct () {
    parent::__construct ();
  }

  public function create ($offset = 0) {
    $user_range = 30;
    $apple_range = 30;

    $this->load->library ('CreateDemo');

    $user_ids = array_filter (array_map (function ($t) {
          $user = User::create (array (
            'email' => CreateDemo::email (),
            'password' => password (CreateDemo::password ()),
            'name' => CreateDemo::text (2, 5),
            'login_count' => rand (10, 100),
            'logined_at' => date ('Y-m-d H:i:s', strtotime ('-' . rand (100, 10000) . ' secs'))
            ));
          return verifyCreateOrm ($user) ? $user->id : null;
        }, range (0, $user_range)));

    array_map (function ($i) use ($apple_range, $user_ids) {
      shuffle ($user_ids);
      $action = Cfg::setting ('flea', 'apple', 'actions')[array_rand (Cfg::setting ('flea', 'apple', 'actions'))];
      $area = Cfg::setting ('flea', 'apple', 'areas')[array_rand (Cfg::setting ('flea', 'apple', 'areas'))];
      $tag = Cfg::setting ('flea', 'apple', 'tags')[$key = array_rand (Cfg::setting ('flea', 'apple', 'tags'))];
      $tag = $tag ? $tag[array_rand ($tag)] : $key;

      if (verifyCreateOrm ($obj = AppleFlea::create (array (
                          'user_id' => $user_ids[0],
                          'title' => CreateDemo::text (),
                          'content' => CreateDemo::text (20, 50),
                          'action' => $action,
                          'area' => $area,
                          'tag' => $tag,
                          'price' => rand (1000, 20000),
                          'pv' => rand (100, 500),
                          'comment_count' => 0,
                          'is_traded' => rand (0, 1)
                        )))) {
        $obj->created_at = date ('Y-m-d H:i:s', strtotime ('-' . ($apple_range - $i) * 60 . ' secs'));
        $obj->save ();
      }
    }, range (0, $apple_range));
  }

  public function index () {
    $this->load_view (null);
  }
}
