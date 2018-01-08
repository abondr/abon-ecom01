<?php

class Application{
    public $_db;
    public function __construct() {
        $this->db = new DBase();
    }
    
}