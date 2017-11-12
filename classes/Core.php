<?php

class Core {
    public function __construct() {
        
    }
    public function run(){
        ob_start();
        require_once(Url::getPage());
        ob_get_flush();
    }
}
