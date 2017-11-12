<?php
if(!isset($_SESSION)) {	session_start();}

// site domain name with http
defined("SITE_URL")	|| define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);	
// directory separator
defined("DS")	|| define("DS", DIRECTORY_SEPARATOR);
// root path
defined("ROOT_PATH")	|| define("ROOT_PATH", realpath(dirname(__FILE__) . DS."..".DS));	
// classes folder
defined("CLASSES_DIR")	|| define("CLASSES_DIR", "classes");
// pages directory
defined("PAGES_DIR")	|| define("PAGES_DIR", "pages");
// modules folder
defined("MOD_DIR")	|| define("MOD_DIR", "mod");	
// inc folder
defined("INC_DIR")	|| define("INC_DIR", "inc");	
// templates folder
defined("TEMPLATE_DIR")	|| define("TEMPLATE_DIR", "template");	
// emails path
defined("EMAILS_PATH")	|| define("EMAILS_PATH", ROOT_PATH.DS."emails");	
// catalogue images path
defined("CATALOGUE_PATH")	|| define("CATALOGUE_PATH", ROOT_PATH.DS."media".DS."catalogue");	
// add all above directories to the include path
set_include_path(implode(PATH_SEPARATOR, array(
	realpath(ROOT_PATH.DS.CLASSES_DIR),
	realpath(ROOT_PATH.DS.PAGES_DIR),
	realpath(ROOT_PATH.DS.MOD_DIR),
	realpath(ROOT_PATH.DS.INC_DIR),
	realpath(ROOT_PATH.DS.TEMPLATE_DIR),
	get_include_path()
)));
//database details
if($_SERVER['REMOTE_ADDR'] == "127.0.0.1"){
    $databaseName = "ecommerce01";    $username = "root";
    $password = "system";    $hostName = "localhost";
} else {
    $databaseName = "u287175439_db01";    $username = "u287175439_root";
    $password = "abondr@1984";    $hostName = "mysql.hostinger.in";
}
defined("DB_HOST")	|| define("DB_HOST", $hostName);
defined("DB_NAME")	|| define("DB_NAME", $databaseName);
defined("DB_USER")	|| define("DB_USER", $username);
defined("DB_PASSWORD")	|| define("DB_PASSWORD", $password);




