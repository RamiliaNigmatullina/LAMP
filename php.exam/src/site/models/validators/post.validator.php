<?php
  class PostValidator {
    private $notices = array();

    public function validate($post_params) {
      // $this->validateUser($notices, $post_params);
      $this->validateTitle($notices, $post_params);
      $this->validateBody($notices, $post_params);


      return $notices;
    }

    public function validateUser(&$notices, $post_params) {
      // if (!strlen($post_params[""])){
      //   $notices["username"] = "You must fill this field.";
      // }
      // elseif (!filter_var($user_params["username"], FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => '/^[a-zA-Z0-9\-_\s]{2,16}$/']])){
      //   $notices["username"] = "Name may contain only alphanumerical symbols, digits or dash or space.";
      // }
    }

    public function validateTitle(&$notices, $post_params) {
      if (!strlen($post_params["title"])){
        $notices["email"] = "You must fill this field.";
      }
      elseif (strlen($post_params["title"]) < 2 ) {
        $notices["title"] = "Title's length must be greater than 2 symbols.";
      }
    }

    public function validateBody(&$notices, $post_params) {
      if (!strlen($post_params["body"])){
        $notices["body"] = "You must fill this field.";
      }
      elseif (strlen($post_params["body"]) < 10 ) {
        $notices["body"] = "Body's length must be greater than 10 symbols.";
      }
    }
  }
