<?php
session_start();

define("CORE_PATH", realpath(__DIR__));
define("SITE_PATH", realpath(CORE_PATH."/../site"));
define("PUBLIC_PATH", realpath(CORE_PATH."/../../web"));

define("MVC_DEFAULT_CONTROLLER", "user");
define("MVC_DEFAULT_ACTION", "index");

require_once CORE_PATH."/core.func.php";
require_once CORE_PATH."/common.func.php";
require_once CORE_PATH."/db.func.php";
require_once SITE_PATH."/models/user.model.php";
require_once SITE_PATH."/models/comment.model.php";
// require_once CORE_PATH."/captcha.php";
// require_once CORE_PATH."/random.php";
