<?php
  class ProfileController {

    public function show() {
      $common = new Common();
      $user = $common->get_authorized_user();

      if ($user !== NULL) {
        $data = [ "profile" => $user, ];
        return ["view" => "user/show", "data" => $data];
      } else {
        return error403();
      }
    }
  }
