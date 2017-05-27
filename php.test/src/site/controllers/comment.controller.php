<?php
  require_once "main.controller.php";

  class CommentController extends MainController {

    public function new() {
      $notices = null;
      $common = new Common();
      $comment = new Comment();

      if(isset($_POST["submitted"])) {
        $comment_fields = $common->fill_entity($comment->schema(), []);
        $comment_data = $common->fill_entity($comment->schema(), self::params());

        $comment->add_comment($comment_data);
        exit();
      } else {
        $comment = null;
      }
      return ['view' => 'comment/new',
        'data' => [
            'comment' => $comment,
            'notices' => $notices,
            'generalNotice' => $notices["general"]
        ]];
    }

    public function index() {
      $comment = new Comment();

      $comments = $comment->comment_list();
      $message = "";

      var_dump("asdaD");
      if(isset($_POST["submitted"])) {
        $comment_fields = $common->fill_entity($comment->schema(), []);
        var_dump("$comment_fields");
        $comment_data = $common->fill_entity($comment->schema(), self::params());

        $comment->add_comment(comment_data);
        exit();
      } else {
        $comment = null;
      }

      return ["view" => "comment/index",
              "data" => [
                "comments" => $comments,
                "message" => $message
               ]
              ];
    }

    // public function show() {
    //   $common = new Common();
    //   $user = $common->get_authorized_user();

    //   if ($user !== NULL) {
    //     $data = [ "profile" => $user, ];
    //     return ["view" => "user/show", "data" => $data];
    //   } else {
    //     return error403();
    //   }
    // }

    private function params() {
      return $_POST["comment"];
    }
  }
