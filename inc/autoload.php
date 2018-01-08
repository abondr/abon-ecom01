<?php
include_once 'config.php';
function __autoload($class_name){
    $class = explode("_", $class_name);
    print_r($class);
    $path = implode("/", $class).".php";
    echo $path."<br>";
    require_once $path;
}