<?php
class Url {
    public static $_page= "page";
    public static $_folder = PAGES_DIR;
    public static $_params = [];
    public static function getParam($par){
         return isset($_GET[$par]) && $_GET[$par] != "" ?
                 $_GET[$par] : NULL;
    }
    public static function cPage() { // returns current page
        return isset($_GET[self::$_page]) ? $_GET[self::$_page]:"index";
    }
    public static function getPage(){
        $page = self::$_folder.DS.self::cPage().".php";
        $error = self::$_folder.DS."error.php";
        return is_file($page) ? $page: $error;
    }
}