<?php
  require_once "main.controller.php";

  class UserController extends MainController {

    public function show($id) {
      $id = (int) $id;
      $user = new User();
      $profile = $user->profile_data($id);

      if ($profile !== NULL) {
        $data = [ "profile" => $profile, ];
        return [ "view" => "user/show", "data" => $data];
      } else {
        return error404("user");
      }
    }

    public function index() {
      $user = new User();

      $profiles = $user->profile_list();
      $message = "";
      if (isset($_GET["status"]) && $_GET["status"] === "registered") {
        $message = "You has been registered!";
      }

      return ["view" => "user/index",
              "data" => [
                "profiles" => $profiles,
                "message" => $message
               ]
              ];
    }
  }
