<h1>Posts List (<?php echo count($data["posts"]) ?>)</h1>

  <?php
  foreach ($data["posts"] as $id=>$post) {
  ?>

    <h3><a href="/post/show/<?php echo $post["id"] ?>"><?php echo $post["title"] ?></a></h3>
    <p><?php echo $post["body"] ?></p>
    <div class="row ">
      <div class="col-md-6">
        <div class="post-author">Author: <a href="/user/show/<?php echo $post["user_id"] ?>"><?php echo $post["username"] ?></a></div>
      </div>
      <div class="col-md-6 text-right">
        <div class="post-created_at"><?php echo $post["created_at"] ?></div>
      </div>
    </div>
    <hr>
    <?php
  }
  ?>


