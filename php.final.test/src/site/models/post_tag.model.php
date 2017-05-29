<?php
  // require_once "validators/tag.validator.php";

  class PostTag {
    private $post_id;
    private $tag_id;

    function create($post_tag_params) {
      $post_tag = new PostTag();
      $post_tag->text = $post_tag_params["text"];

      add_user($post_tag);
    }

    function add_post_tag($post_tag) {
      $db = new DB();
      $common = new Common();

      return $db->db_add("post_tags", self::schema(), $post_tag);
    }

    function schema() {
      return ["post_id", "tag_id"];
    }

    function schema_with_id() {
      return ["name"];
    }

    function tag_list(){
      $db = new DB();
      $tags = $db->db_select_all("tags", self::schema_with_id());

      foreach ($tags as $id => $tag) {
        $tags[$id+1] = $tag["name"];
      }
      return $tags;
    }

    // function check_user($email, $password){
    //   $db = new DB();
    //   $common = new Common();
    //   $user = $db->db_find_by(
    //       "user",
    //       self::schema(),
    //       [
    //         "email" => $email,
    //         "password" => $common->get_password_hash($password)
    //       ]
    //       );
    //   return $user;
    // }
  }
