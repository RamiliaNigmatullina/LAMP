<?php
$birthday = new DateTimeImmutable();
$birthday = $birthday->setTimestamp(intval($data['profile']["0"]['birthday']));
$age = $birthday->diff(new DateTime('NOW'))->format('%y');
$avatar = empty($data['profile']["0"]['avatar']) ? '/img/def-avatar.jpg' : $data['profile']["0"]['avatar'];

$is_owner = (!empty($user) && key($user) === key($data['profile']));
?>
<!-- Profile Page -->
<div class="profile-box">
  <!-- Main User Info -->
  <div class="profile-header">
    <div class="profile-info pull-left">
      <?php echo $data['profile']["0"]['city']; ?>
    </div>
    <div class="profile-avatar pull-left<?php echo ($is_owner?' owner':''); ?>">
      <img src="<?php echo $avatar; ?>" alt="Avatar">
    </div>
    <div class="profile-info pull-right">
      <?php echo $age; ?> y/o
    </div>
    <div class="clear"></div>
  </div>

  <!-- User's Name -->
  <h1 class="profile-name">
    <?php echo $data['profile']["0"]['name']; ?>
    <?php echo ($is_owner?'<sup class="text-primary">me</sup>':'') ?>
  </h1>

  <!-- Other stuff -->
  <div class="profile-body">

    <!-- Gallery -->
    <div class="profile-gallery">
      <div class="row">

        <?php
        for ($i = 0; $i < 5; $i++) {
          ?>
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="/img/def-gallery-pic.jpg" alt="Gallery Pic">
              <div class="caption">
                <h3>Gallery Pic</h3>
                <p>
                  <a href="#" class="btn btn-primary" role="button" title="Vote Up"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
                  <a href="#" class="btn btn-primary" role="button" title="Vote Down"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a>
                </p>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
