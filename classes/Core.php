<?php

class Core{
    public function run(){
        ob_start(); // Turn on output buffering
        
        require_once(Url::getPage()); // from pages folder
        
        ob_get_flush(); //Flush the output buffer, return it as a string 
                        //and turn off output buffering
    }
    public function __construct() { }
}