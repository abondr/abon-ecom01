<?php

class Url{
    public static $_page = "page"; // url key page
    public static $_pages_dir = PAGES_DIR;
    public static $_params = []; 
    public function __construct() { }
    public static function getParam($param){
        if(isset($_GET[$param]) && $_GET[$param]!=""){
            echo $_GET[$param];
            return $_GET[$param]; // based on key in url value returns
        }else{
            return null;  // no key ,returns null.
        }
    }
    public static function cPage(){
        return isset($_GET[self::$_page])?$_GET[self::$_page] : "index";
    }
    public static function getPage(){
        $page = self::$_pages_dir.DS.self::cPage().".php";
        $error = self::$_pages_dir.DS."error.php";
        return is_file($page)? $page : $error;
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
            $remove = !is_array($remove) ? array($remove) : $remove;
            foreach (self::$_params as $key => $value){
                if(in_array($key, $remove)){
                    unset(self::$_params[$key]);
                }
            }
            foreach (self::$_params as $key=>$value){
                $out[] = $key."=".$value;
            }
            return "/?".implode("&", $out);
        }
    }
    // ?page=about&category=books
    
}