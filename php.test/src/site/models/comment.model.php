<?php

  class Comment {
    private $text;
    private $user_id;
    private $comment_id;

    public function valid($comment_params) {
      $validator = new CommentValidator;
      $notices = $validator->validate($comment_params);

      if(!count($notices)) {
        return true;
      } else {
        return $notices;
      }
    }

    function uniq($email) {
      if (self::find_by_email($email)) {
        return "User with such email already exists.";
      }
    }

    function create($comment_params) {
      $comment = new Comment();
      $comment->text = $comment_params["text"];
      $comment->user_id = $comment_params["user_id"];
      $comment->comment_id = $comment_params["comment_id"];

      add_user($comment);
    }

    function add_comment($comment) {
      $db = new DB();
      $common = new Common();

      return $db->db_add("comments", self::schema(), $comment);
    }

    function schema() {
      return ["text", "user_id", "comment_id"];
    }

    // public function profile_data($id){
    //   $db = new DB();
    //   return $db->db_find("user", self::schema(), $id);
    // }

    // function find_by_email($email){
    //   $db = new DB();
    //   return $db->db_find_by("user", self::schema(), ["email" => $email]);
    // }

    function comment_list(){
      $db = new DB();
      $comments = $db->db_select_all("comments", self::schema());

      return $comments;
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
