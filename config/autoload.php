<?php
//constants
define('HASH_GENERAL_KEY', 'MixitUp200');

define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

//database
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'p2precycler');
define('DB_USER', 'root');
define('DB_PASS', '');

//Autoload classes
spl_autoload_register(function ($class_name) {
    require_once "libs/".$class_name.'.php';
});
?>