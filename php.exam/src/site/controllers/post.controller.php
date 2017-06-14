<?php
  require_once "main.controller.php";

  class PostController extends MainController {

    public function show($id) {
      $id = (int) $id;
      $post = new Post();
      $post = $post->post_data($id);

      if ($post !== NULL) {
        $data = [ "post" => $post, ];
        return [ "view" => "post/show", "data" => $data];
      } else {
        return error404("post");
      }
    }

    public function index() {
      $post = new Post();

      $posts = $post->posts_list();
      $message = "";

      return ["view" => "post/index",
              "data" => [
                "posts" => $posts,
                "message" => $message
               ]
              ];
    }

    public function new() {
      $notices = null;
      $common = new Common();
      $post = new Post();

      if(isset($_POST["submitted"])) {
        $post_fields = $common->fill_entity($post->create_schema(), []);
        $post_data = $common->fill_entity($post->create_schema(), self::params());
        $notices = $post->valid(self::params());

        if(is_bool($notices)) {
          $post = $post->add_post($post_data);
          header("Location:/post/show/".$post["id"]);
          exit();
        } else {
          $post = $post_data;
        }
      } else {
        $post = null;
      }
      return ['view' => 'post/new',
        'data' => [
            'post' => $post,
            'notices' => $notices
        ]];
    }

    private function params() {
      return $_POST["post"];
    }
  }
