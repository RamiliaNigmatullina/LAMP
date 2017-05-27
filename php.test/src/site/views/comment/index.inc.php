<h1>Guest book</h1>
<div class="user-list row">

  <?php
    foreach ($data['comments'] as $id=>$comment) { ?>
      <div>
        <?php echo $comment["text"]; ?>
      </div>
      <?php
    }

    include("_form.inc.php")
  ?>
</div>
