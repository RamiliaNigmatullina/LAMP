<div class="user-list row">
  <div>
  <form action="" method="POST">
    <label for="post-text">Text</label>
    <input type="text" name="post[text]" id="post-text" required><br>
    <!-- <textarea rows="10" cols="45" name="post[text]" id="post-text" required></textarea><br> -->
    <select name="post[tags]" multiple="multiple">
      <option value="one">one</option>
      <option value="two">two</option>
      <option value="three">three</option>
      <option value="four">four</option>
      <option value="five">five</option>
    </select>
    <button type="submit" class="btn btn-default" name="submitted">Create post</button>
  </form>
</div>
