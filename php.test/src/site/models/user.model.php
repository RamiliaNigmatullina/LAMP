<?php
  require_once "validators/user.validator.php";

  class User {
    private $avatar;
    private $birthday;
    private $email;
    private $name;
    private $password;

    public function valid($user_params) {
      $validator = new UserValidator;
      $notices = $validator->validate($user_params);

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

    function create($user_params) {
      $user = new User();
      $user->avatar = $user_params["avatar"];
      $user->birthday = $user_params["birthday"];
      $user->email = $user_params["email"];
      $user->name = $user_params["name"];
      $user->password = $user_params["password"];

      add_user($user);
    }

    function add_user($user) {
      $db = new DB();
      $common = new Common();
      $user["password"] = $common->get_password_hash($user["password"]);
      $user["birthday"] = strtotime($user["birthday"]);

      return $db->db_add("users", self::schema(), $user);
    }

    function schema() {
      return ["email", "password", "name", "birthday", "city", "avatar"];
    }

    public function profile_data($id){
      $db = new DB();
      return $db->db_find("user", self::schema(), $id);
    }

    function find_by_email($email){
      $db = new DB();
      return $db->db_find_by("user", self::schema(), ["email" => $email]);
    }

    function profile_list(){
      $db = new DB();
      $profiles = $db->db_select_all("users", self::schema());

      foreach ($profiles as $id => $profile) {
        unset($profile["password"]);
        $profiles[$id] = $profile;
      }
      return $profiles;
    }

    function check_user($email, $password){
      $db = new DB();
      $common = new Common();
      $user = $db->db_find_by(
          "user",
          self::schema(),
          [
            "email" => $email,
            "password" => $common->get_password_hash($password)
          ]
          );
      return $user;
    }
  }
