<h2><?php echo $data["post"]["title"] ?></h2>
<p><?php echo $data["post"]["body"] ?></p>
<div class="row ">
  <div class="col-md-6">
    <div class="post-author">Author: <a href="/user/show/<?php echo $data["post"]["user_id"] ?>"><?php echo $data["post"]["username"] ?></a></div>
  </div>
  <div class="col-md-6 text-right">
    <div class="post-created_at"><?php echo $data["post"]["created_at"] ?></div>
  </div>
</div>
<br>

<h3>Comments:</h3>
<hr>
