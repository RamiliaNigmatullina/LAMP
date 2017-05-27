<?php
  require_once "main.controller.php";

  class CommentController extends MainController {

    public function index() {
      $notices = null;
      $common = new Common();
      $comment = new Comment();

      $comments = $comment->comment_list();

      if(isset($_POST["submitted"])) {
        $comment_fields = $common->fill_entity($comment->schema(), []);
        $comment_data = $common->fill_entity($comment->schema(), self::params());

        $comment->add_comment($comment_data);
        header("Location:/comment");
        exit();
      } else {
        $comment = null;
      }

      return ["view" => "comment/index",
              "data" => [
                "comments" => $comments
               ]
              ];
    }

    private function params() {
      return $_POST["comment"];
    }
  }
