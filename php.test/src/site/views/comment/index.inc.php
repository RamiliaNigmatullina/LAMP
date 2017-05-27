<h1>Guest book</h1>
<div class="user-list row">

  <?php
  foreach ($data['comments'] as $id=>$comment) { ?>
    <div>
      <?php echo $comment["text"]; ?>
    </div>
    <?php
  }

  // include("_form.inc.php")
  ?>

  <div>
  <form action="" method="POST">
    <label for="user_id">User ID</label>
    <input type="user_id" name="user_id" id="user_id" required><br>
    <label for="text">Text</label>
    <textarea rows="10" cols="45" name="text" id="text" required></textarea><br>
    <label for="comment_id">Comment ID</label>
    <input type="comment_id" name="comment_id" id="comment_id"><br>
    <input type="submit" value="Leave review">
  </form>
</div>

</div>
