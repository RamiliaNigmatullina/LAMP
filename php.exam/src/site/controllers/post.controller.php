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
  }
