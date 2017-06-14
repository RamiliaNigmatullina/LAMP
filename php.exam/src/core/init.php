<?php
session_start();

define("CORE_PATH", realpath(__DIR__));
define("SITE_PATH", realpath(CORE_PATH."/../site"));
define("PUBLIC_PATH", realpath(CORE_PATH."/../../web"));

// /Users/ramilanigmatullina/University/PHP/php.exam/web/css/main.css
// /Users/ramilanigmatullina/University/PHP/php.exam/src/core/init.php

define("MVC_DEFAULT_CONTROLLER", "post");
define("MVC_DEFAULT_ACTION", "index");

require_once CORE_PATH."/core.func.php";
require_once CORE_PATH."/common.func.php";
require_once CORE_PATH."/db.func.php";
require_once SITE_PATH."/models/user.model.php";
require_once SITE_PATH."/models/post.model.php";

require_once PUBLIC_PATH."/css/main.css";
// require_once PUBLIC_PATH."/css/bootstrap.min.css";
