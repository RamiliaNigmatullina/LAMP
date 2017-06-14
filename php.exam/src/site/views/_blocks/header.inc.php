<html>
  <head>
    <meta charset="utf-8">
    <title>Blog</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>

    <!-- Top Menu -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-left-space">
            <li><a href="/">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right nav-right-space">
            <?php
            if (!empty($user)) {
              ?>
              <li><a href = "/profile/show">My Profile</a></li>
              <li><a href = "/session/destroy">Exit</a></li>
              <?php
            }
            else {
              ?>
              <li><a href = "/session/new">Sign in</a></li>
              <li><a href = "/registration/new">Register</a></li>
              <?php
            }
            ?>
        </div>
      </div>
    </nav>

    <!-- Centered Pane -->
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-md-offset-1">
