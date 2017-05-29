<h1>Guest book</h1>
<div class="user-list row">

  <?php
    // var_dump($data['comments']);
    foreach ($data['comments'] as $id=>$comment) { ?>
      <div>
        <img src="<?php echo $comment["user_avatar"]; ?>" height=50px />
        <b><?php echo $comment["user_name"]; ?></b>
        <br>
        <?php echo $comment["text"]; ?>
        <a href="/comment?comment_id=<?php echo $comment["id"]; ?>" >Ответить</a>
        <hr>
      </div>
      <?php
    }

    include("_form.inc.php")
  ?>
</div>
