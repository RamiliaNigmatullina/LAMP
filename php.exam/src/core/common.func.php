<?php
  class Common {
    public function dump($var){
      echo "<pre>";
      var_dump($var);
      echo "</pre>";
    }

    public function dumpe($var = NULL){
      dump($var);
      exit();
    }

    public function get_password_hash($password){
      return md5($password);
    }

    public function authorize($email, $passsword){
      $user = new User();
      $db = new DB();
      $user = $user->check_user($email, $passsword);
      if($user !== NULL) {
        $_SESSION["user"] = $user;
        return TRUE;
      }
      else {
        return FALSE;
      }
    }

    public function logout() {
      if(isset($_SESSION["user"])) {
        unset($_SESSION["user"]);
      }
    }

    public function get_authorized_user(){
      if(!empty($_SESSION["user"])){
        return $_SESSION["user"][0];
      }
      return NULL;
    }

    public function fill_entity($schema, $data){
      $result = [];
      foreach($schema as $name){
        $result[$name] = isset($data[$name])?$data[$name]:"";
      }
      return $result;
    }
  }

