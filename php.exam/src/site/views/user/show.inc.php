<?php
$avatar = empty($data['profile']['avatar']) ? '/img/def-avatar.jpg' : $data['profile']['avatar'];

$is_owner = (!empty($user) && $user['id'] === $data['profile']['id']);
?>
<!-- Profile Page -->

  <div class="row ">
    <div class="col-md-5 col-md-offset-1">
      <div class="profile-box">
        <div class="profile-avatar pull-left<?php echo ($is_owner?' owner':''); ?>">
          <img src="<?php echo $avatar; ?>" alt="Avatar">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h1 class="profile-name">
        <?php echo $data['profile']['full_name']; ?>
        <?php echo ($is_owner?'<sup class="text-primary">me</sup>':'') ?>
      </h1>
    </div>
  </div>
</div>
