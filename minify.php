<?php  
require_once "minify_.php";
?>
<?php

//ob_start('sanitize_output');
ob_start('minify_html');
ob_start('minify_css');
?>