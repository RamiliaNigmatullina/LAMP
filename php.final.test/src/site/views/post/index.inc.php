<h1>Guest book</h1>
<div class="user-list row">

  <?php
    // var_dump($data['posts']);
    foreach ($data['posts'] as $id=>$post) { ?>
      <div>
        <!-- <img src="<?php echo $post["user_avatar"]; ?>" height=50px /> -->
        <br>
        <?php echo $post["text"]; ?>
        <hr>
      </div>
      <?php
    }


  ?>
</div>
