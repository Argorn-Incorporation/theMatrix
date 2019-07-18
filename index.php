<?php
date_default_timezone_set('Africa/Accra');
require_once "config/paths.php";
require_once "config/autoload.php";
require_once "config/database.php";
require_once "minify.php";

/*  
require "libs/Bootstrap.php";
require "libs/Controller.php";
require "libs/View.php";
*/

$App = new Bootstrap();
$App->init();
?>