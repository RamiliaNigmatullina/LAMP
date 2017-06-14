<?php
  require_once "main.controller.php";

  class SessionController extends MainController {

    public function new() {
      $id = NULL;
      $data = [];
      $common = new Common();

      if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        if (self::authorized($common)) {
          $id = $common->get_authorized_user()['id'];
        } else {
          $data["notices"] = [
              "Wrong email-password pair!",
          ];
        }
      }

      if (empty($id)) {
        return ["view" => "session/new", "data" => $data];
      } else {
        return ["redirect" => "/profile/show"];
      }
    }

    public function destroy() {
      $common = new Common();
      $common->logout();
      return ["redirect" => "/"];
    }

    private function authorized($common) {
      return $common->authorize($_POST["email"], $_POST["password"]);
    }

  }
