<?php
date_default_timezone_set('Africa/Accra');
require_once "config/paths.php";
require_once "config/autoload.php";
require_once "config/config.php";
require_once "minify.php";

$App = new Bootstrap();
$App->init();
