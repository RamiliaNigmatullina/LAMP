<div class="user-list row">
  <div>
  <form action="" method="POST">
    <label for="comment-user_id">User ID</label>
    <input type="text" name="comment[user_id]" id="comment-user_id" required><br>
    <label for="comment-text">Text</label>
    <input type="text" name="comment[text]" id="comment-text" required><br>
    <textarea rows="10" cols="45" name="comment[text]" id="comment-text" required></textarea><br>
    <!-- <textarea rows="10" cols="45" name="comment[text]" id="comment-text" required></textarea><br> -->
    <label for="comment-comment_id">Comment ID</label>
    <input type="text" name="comment[comment_id]" id="comment-comment_id"><br>
    <button type="submit" class="btn btn-default" name="submitted">Leave review</button>
  </form>
</div>
