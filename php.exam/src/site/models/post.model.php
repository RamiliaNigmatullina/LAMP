<?php
  require_once "validators/post.validator.php";

  class Post {
    private $title;
    private $body;
    private $user_id;
    private $created_at;

    public function valid($post_params) {
      $validator = new PostValidator;
      $notices = $validator->validate($post_params);

      if(!count($notices)) {
        return true;
      } else {
        return $notices;
      }
    }

    function create($post_params) {
      $post = new Post();
      $post->title = $post_params["title"];
      $post->body = $post_params["body"];

      add_post($post);
    }

    function add_post($post) {
      $db = new DB();
      $common = new Common();

      $user_id = $common->get_authorized_user()["id"];
      $post["user_id"] = $user_id;
      $post["created_at"] = date("m.d.Y H:i", time());

      $db->db_add("posts", self::create_schema(), $post);
      $post = $db->db_find_last_record_by("posts", self::show_schema(), ["user_id" => $user_id]);

      return $post;
    }

    public function post_data($id){
      $db = new DB();
      return $db->inner_join_query_by_id("posts", "users", self::show_schema(), self::user_schema(), $id);
    }

    function posts_list(){
      $db = new DB();
      $posts = $db->inner_join_query("posts", "users", self::show_schema(), self::user_schema());

      return $posts;
    }

    function create_schema() {
      return ["title", "body", "user_id", "created_at"];
    }

    function show_schema() {
      return ["id", "title", "body", "user_id", "created_at"];
    }

    function user_schema() {
      return ["id", "username"];
    }
  }
