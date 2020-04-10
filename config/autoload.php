<?php
//Autoload classes
spl_autoload_register(function ($class_name) {
    require_once "libs/".$class_name.'.php';
});
