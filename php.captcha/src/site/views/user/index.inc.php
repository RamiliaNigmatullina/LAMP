<h1>Users List</h1>
<div class="user-list row">

  <?php

  use Abeautifulsite\Simple_php_captcha;
  // session_start();
  // require __DIR__ . '/vendor/autoload.php';
  require '/Users/ramilanigmatullina/University/PHP/php.captcha/vendor/autoload.php';
  include("simple-php-captcha.php");
  $_SESSION['captcha'] = simple_php_captcha();
  ?>
<!--
  <?php
  foreach ($data['profiles'] as $id=>$profile) {
    $avatar = empty($profile['avatar']) ? '/img/def-avatar.jpg' : $profile['avatar'];
    ?>
    <div class="profile-thumbnail">
      <a href="/user/show/<?php echo $id+1; ?>" class="profile-link">
        <img src="<?php echo $avatar; ?>" alt="Name Surname" class="profile-avatar">
        <h3 class="profile-name"><?php echo $profile['name']; ?></h3>
      </a>
    </div>
    <?php
  }
  ?>
 -->
</div>
