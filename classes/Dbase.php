<?php
class Dbase{
    private $_host = DB_HOST;
    private $_user = DB_USER;
    private $_password = DB_PASSWORD;
    private $_name = DB_NAME;
    
    private $_connDB = false;
    public $_last_query = null;
    public $_effected_rows = 0;
    
    public $_insert_keys = [];
    public $_insert_values = [];
    public $_update_sets = [];
    
    public $_id;
    
    public function __construct() {
        $this->connect();
    }
    private function connect(){
        
    }
}