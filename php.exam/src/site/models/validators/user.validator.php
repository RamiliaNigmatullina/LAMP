<?php
  class UserValidator {
    private $notices = array();

    public function validate($user_params) {

      $this->validateUsername($notices, $user_params);
      $this->validateEmailUniq($notices, $user_params);
      $this->validateEmail($notices, $user_params);
      $this->validateFullName($notices, $user_params);
      $this->validatePassword($notices, $user_params);
      $this->validateAvatar($notices, $user_params);
      $this->validateTerms($notices, $user_params);

      return $notices;
    }

    public function validateUsername(&$notices, $user_params) {
      if (!strlen($user_params["username"])){
        $notices["username"] = "You must fill this field.";
      }
      elseif (!filter_var($user_params["username"], FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => '/^[a-zA-Z0-9\-_\s]{2,16}$/']])){
        $notices["username"] = "Name may contain only alphanumerical symbols, digits or dash or space.";
      }
    }

    public function validateEmail(&$notices, $user_params) {
      if (!strlen($user_params["email"])){
        $notices["email"] = "You must fill this field.";
      }
      elseif (!filter_var($user_params["email"], FILTER_VALIDATE_EMAIL)) {
        $notices["email"] = "Email has incorrect format.";
      }
    }

    public function validateEmailUniq(&$notices, $user_params) {
      $db = new DB();
      $user = new User();

      if (!is_null($db->db_find_by("user", $user->schema(), ["email" => $user_params["email"]]))) {
        $notices["general"] = "User with such email already exists.";
      }
    }

    public function validateFullName(&$notices, $user_params) {
      if (!strlen($user_params["full_name"])){
        $notices["full_name"] = "You must fill this field.";
      }
      elseif (!filter_var($user_params["full_name"], FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => '/^[a-zA-Z0-9\-_\s]{2,16}$/']])){
        $notices["full_name"] = "Name may contain only alphanumerical symbols, digits or dash or space.";
      }
    }

    public function validatePassword(&$notices, $user_params) {
      if (!strlen($user_params["password"])) {
        $notices["password"] = "You must fill this field.";
      }
      elseif (strlen($user_params["password"]) < 2 ) {
        $notices["password"] = "Password's length must be greater than 2 symbols.";
      }
      if (!strlen($user_params["password-repeat"])) {
        $notices["password-repeat"] = "You must fill this field.";
      }
      elseif ($user_params["password-repeat"] !== $user_params["password"]) {
        $notices["password-repeat"] = "Password Repeat must be the same as Password.";
      }
    }

    public function validateAvatar(&$notices, $user_params) {
      if (!strlen($user_params["avatar"])) {
        $notices["avatar"] = "You must fill this field.";
      }
      elseif (!filter_var($user_params["avatar"], FILTER_VALIDATE_URL)) {
        $notices["avatar"] = "Avatar has incorrect format.";
      }
    }

    public function validateTerms(&$notices, $user_params) {
      $user_params["terms"] = isset($_POST["reg"]["terms"]) ? true : false;

      if (!strlen($user_params["terms"])) {
        $notices["terms"] = "You must check this field.";
      }
    }
  }
