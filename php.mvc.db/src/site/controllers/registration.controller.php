<?php
  require_once "main.controller.php";

  class RegistrationController extends MainController {

    public function new() {
      $notices = null;
      $common = new Common();
      $user = new User();

      if(isset($_POST["submitted"])) {
        $user_fields = $common->fill_entity($user->schema(), []);
        $user_data = $common->fill_entity($user->schema(), self::params());
        // $notices = $user->valid(self::params());


        $user->add_user($user_data);
        // if(is_bool($notices)) {
        //   // var_dump($user_data);
        //   header("Location:/?status=registered");
        //   exit();
        // } else {
        //   $user = null;
        // }
      } else {
        $user = null;
      }
      return ['view' => 'registration/new',
        'data' => [
            'user' => $user,
            // 'notices' => $notices
            // 'notices' => $notices,
            'generalNotice' => $notices["general"]
        ]];
    }

    private function params() {
      return $_POST["reg"];
    }
  }
