<?php
define("PATH", "/oop/");
define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'].PATH);
define("WWW", 'http://'.$_SERVER['HTTP_HOST'].PATH);
define("BASE_URL", 'http://'.$_SERVER['HTTP_HOST'].((dirname($_SERVER['SCRIPT_NAME']) != '/') ? dirname($_SERVER["SCRIPT_NAME"]).'/' : '/'));
define("BASE_LIBS", BASE_DIR."application/libs/");
define("BASE_CONTROLLER", BASE_DIR."application/mvc/c/");
define("BASE_VIEW", BASE_DIR."application/mvc/v/");
define("BASE_MODEL", BASE_DIR."application/mvc/m/");
define("USEDB", 1); // 0 if you don't use db

$useModules = array('News','Mlm');

require_once BASE_DIR."application/config/bootstraps.php";

?>