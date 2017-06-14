<?php

/**
 * Front-controller: process almost every request.
 */

  require_once '../src/core/init.php';
  $core = new Core();

  $core->process_request();
