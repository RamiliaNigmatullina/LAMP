<?php

/**
 * Fron-controller: process almost every request.
 */

  require_once '../src/core/init.php';
  echo '<title>MVC PHP</title>';
  $core = new Core();

  $core->process_request();
