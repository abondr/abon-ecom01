<?php

class Application{
    public $_db;
    public function __construct() {
        $this->_db = new Dbase();
        
    }
}