<?php
  require_once "validators/post.validator.php";

  class Post {
    private $text;

    public function valid($post_params) {
      $validator = new PostValidator;
      $notices = $validator->validate($post_params);

      if(!count($notices)) {
        return true;
      } else {
        return $notices;
      }
    }

    // function uniq($email) {
    //   if (self::find_by_email($email)) {
    //     return "User with such email already exists.";
    //   }
    // }

    function create($post_params) {
      $post = new Post();
      $post->text = $post_params["text"];

      add_user($post);
    }

    function add_post($post) {
      $db = new DB();
      $common = new Common();

      return $db->db_add("posts", self::schema(), $post);
    }

    function schema() {
      return ["text", "tags"];
    }

    // public function profile_data($id){
    //   $db = new DB();
    //   return $db->db_find("user", self::schema(), $id);
    // }

    // function find_by_email($email){
    //   $db = new DB();
    //   return $db->db_find_by("user", self::schema(), ["email" => $email]);
    // }

    function post_list(){
      $db = new DB();
      $user = new User();
      $posts = $db->db_select_all("posts", self::schema());
      $posts_result = [];
      foreach ($posts as $id=>$post) {
        $posts_result[$id] = array(
          // 'user_name' => $db->db_find_by("user", $user->schema(), ["id" => $post["user_id"]])[0]["name"],
          // 'user_avatar' => $db->db_find_by("user", $user->schema(), ["id" => $post["user_id"]])[0]["avatar"],
          // 'text' => $post["text"],
          'text' => $post["text"]
          // 'id' => $id+1
        );
        // $post["post_id"] = $db->db_find_by("user", $user->schema(), ["id" => $post["user_id"]])[0]["name"];
        // var_dump($post["post_id"]);
        // $id = array (
        //   "name"  => $db->db_find_by("users", self::schema(), ["id" => $post_id])).name
        // );
      }
      return $posts_result;
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
