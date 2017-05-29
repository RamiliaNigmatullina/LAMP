<?php
  require_once "main.controller.php";

  class PostController extends MainController {

    public function index() {
      $notices = null;
      $common = new Common();
      $post = new Post();

      $posts = $post->post_list();

      // var_dump($common->get_authorized_user());

      if(isset($_POST["submitted"])) {
        $post_fields = $common->fill_entity($post->schema(), []);
        $post_params = self::params();
        $post_params["post_id"] = $_GET["post_id"];

        $post_data = $common->fill_entity($post->schema(), $post_params);
        // var_dump($post_fields);

        $post->add_post($post_data);
        header("Location:/post");
        exit();
      } else {
        $post = null;
      }

      return ["view" => "post/index",
              "data" => [
                "posts" => $posts
               ]
              ];
    }

    public function new() {
      $notices = null;
      $common = new Common();
      $post = new Post();
      $tag = new Tag();
      $post_tag = new PostTag();

      if(isset($_POST["submitted"])) {
        $post_fields = $common->fill_entity($post->schema(), []);

        $user_tags = array('name' => self::params()["tags"]);
        // self::save_tags($tags);

        $user_tags_arr = explode(" ", $user_tags["name"]);
        // $common = new Common();
        // $tag = new Tag();


        $tags = $tag->tag_list();
        $next_posts_id = count($post->post_list()) + 1;

        foreach ($tags as $tag_id=>$tag) {
          foreach ($user_tags_arr as $id=>$user_tag_arr) {
            if ($user_tag_arr == $tag) {
              var_dump($next_posts_id);
              $data = array(
                'post_id' => $next_posts_id,
                'tag_id' => $tag_id,
              );

              $post_tag_data = $common->fill_entity($post_tag->schema(), $data);
              $post_tag->add_post_tag($post_tag_data);
            }
          }
        }



        $post_data = $common->fill_entity($post->schema(), self::params());
        $notices = $post->valid(self::params());

        $post->add_post($post_data);
        // header("Location:/post");
        // exit();

        // if(is_bool($notices)) {
        //   $user->add_user($user_data);
        //   header("Location:/?status=registered");
        //   exit();
        // } else {
        //   $user = null;
        // }
      } else {
        $post = null;
      }
      return ['view' => 'post/new',
        'data' => [
            'post' => $post,
            'notices' => $notices,
            'generalNotice' => $notices["general"]
        ]];
    }

    private function params() {
      return $_POST["post"];
    }

    // public function save_tags($tags) {
    //   $common = new Common();
    //   $tag = new Tag();

    //   $tag_data = $common->fill_entity($tag->schema(), $tags);
    //   $tag->add_tag($tag_data);
    // }

    public function save_tags($user_tags) {
      $user_tags_arr = explode(" ", $user_tags[name]);
      $common = new Common();
      $tag = new Tag();

      $tag_data = $common->fill_entity($tag->schema(), $user_tags);
      $tag->add_tag($tag_data);

      $tags = $tag->tag_list();

      foreach ($tags as $id=>$tag) {
        foreach ($user_tags_arr as $id=>$user_tag_arr) {
          // if ()
          $tag_data = $common->fill_entity($tag->schema(), self::params());
          $tag->add_tag($tag_data);
        }
      }
    }
  }
