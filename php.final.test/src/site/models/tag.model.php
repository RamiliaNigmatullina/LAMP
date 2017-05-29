<?php
  // require_once "validators/tag.validator.php";

  class Tag {
    private $text;

    // public function valid($tag_params) {
    //   $validator = new tagValidator;
    //   $notices = $validator->validate($tag_params);

    //   if(!count($notices)) {
    //     return true;
    //   } else {
    //     return $notices;
    //   }
    // }

    // function uniq($email) {
    //   if (self::find_by_email($email)) {
    //     return "User with such email already exists.";
    //   }
    // }

    function create($tag_params) {
      $tag = new Tag();
      $tag->text = $tag_params["text"];

      add_user($tag);
    }

    function add_tag($tag) {
      $db = new DB();
      $common = new Common();

      return $db->db_add("tags", self::schema(), $tag);
    }

    function schema() {
      return ["name"];
    }

    function schema_with_id() {
      return ["name"];
    }

    // public function profile_data($id){
    //   $db = new DB();
    //   return $db->db_find("user", self::schema(), $id);
    // }

    // function find_by_email($email){
    //   $db = new DB();
    //   return $db->db_find_by("user", self::schema(), ["email" => $email]);
    // }

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
