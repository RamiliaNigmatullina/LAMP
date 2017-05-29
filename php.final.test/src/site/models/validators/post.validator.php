<?php
  class PostValidator {
    private $notices = array();

    public function validate($post_params) {

      $this->validateText($notices, $post_params);

      return $notices;
    }

    public function validateText(&$notices, $post_params) {
      if (!strlen($post_params["text"])) {
        $notices["text"] = "You must fill this field.";
      }
    }
  }
