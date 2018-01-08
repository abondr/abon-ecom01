<?php
if(!isset($_SESSION)){
    session_start();
}else{
    print_r($_SESSION);
}
//site domain name with http.
defined("SITE_URL") || define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);
//directory separator
defined("DS") || define("DS", DIRECTORY_SEPARATOR);
//root path
defined("ROOT_PATH") || define("ROOT_PATH",  realpath(dirname(__FILE__).DS."..".DS));
//classes folder
defined("CLASSES_DIR") || define("CLASSES_DIR",  realpath(ROOT_PATH.DS."classes"));
//modules folder
defined("MODULES_DIR") || define("MODULES_DIR",  realpath(ROOT_PATH.DS."modules"));
//pages folder
defined("PAGES_DIR") || define("PAGES_DIR",  realpath(ROOT_PATH.DS."pages"));
//inc folder
defined("INC_DIR") || define("INC_DIR",  realpath(ROOT_PATH.DS."inc"));
//template folder
defined("TEMPLATE_DIR") || define("TEMPLATE_DIR",  realpath(ROOT_PATH.DS."template"));
//email folder
defined("EMAIL_DIR") || define("EMAIL_DIR",  realpath(ROOT_PATH.DS."email"));
//catalogue Images folder
defined("CATALOGUE_DIR") || define("CATALOGUE_DIR",  realpath(ROOT_PATH.DS."media"
                                                                .DS."catalogue"));

//Add all directories to the include path
set_include_path(implode(PATH_SEPARATOR,[
    CLASSES_DIR,MODULES_DIR,
    PAGES_DIR,
    INC_DIR,TEMPLATE_DIR,
    EMAIL_DIR,CATALOGUE_DIR,
    get_include_path()
]));

//database host name
defined("DB_HOST_NAME") || define("DB_HOST_NAME",  "localhost");
//database user name
defined("DB_USER_NAME") || define("DB_USER_NAME",  "root");
//database password
defined("DB_PASSWORD") || define("DB_PASSWORD",  "system");
//database name
defined("DB_NAME") || define("DB_NAME",  "ecommerce01");


