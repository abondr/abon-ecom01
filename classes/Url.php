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
    public static function getAll(){
        if(!empty($_GET)){
            foreach ($_GET as $key=>$value){
                if(!empty($value)){
                    self::$_params[$key] = $value;
                }
            }
        }
    }
    public static function getCurrentUrl($remove = null){
       self::getAll();
       $out = [];
       if(!empty($remove)){
           $remove  = !is_array($remove)?[$remove]:$remove;
           foreach (self::$_params as $key=>$value){
               if(in_array($key, $remove)){
                   unset(self::$_params[$key]);
               }
           }
       }
       foreach (self::$_params as $key=>$value){
           $out[] = $key."=".$value;
       }
       return "/?".implode("&", $out);
    }
}