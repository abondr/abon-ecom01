<?php

class DBase{
    private $_host = DB_HOST_NAME;
    private $_user = DB_USER_NAME;
    private $_password = DB_PASSWORD;
    private $_name = DB_NAME;
    
    private $_connectDB = false;
    public $_last_query = NULL;
    public $_affected_rows = 0;
    
    public $_insert_keys = [];
    public $_insert_values = [];
    public $_updet_sets = [];
    
    public $_id;
    
    public function __construct() {
        $this->connect();
    }
    public function connect(){
        $this->_connectDB = mysqli_connect(
                $this->_host, $this->_user, $this->_password, $this->_name);
        if(!$this->_connectDB){
            die("Database connection failed".  mysqli_error($this->_connectDB));
        }else{
            mysqli_set_charset($this->_connectDB, "utf8");
        }
    }
    public function close(){
        if(!mysqli_close($this->_connectDB)){
            die("Database closing failed".  mysqli_error($this->_connectDB));
        }
    }
    public function escape($value){
        if(function_exists("mysqli_real_escape_string(")){
            if(get_magic_quotes_gpc()){
                $value = stripslashes($value);
            }
            $value = mysqli_real_escape_string($value);
        }else{
            if(!get_magic_quotes_gpc()){
                $value = addslashes($value);
            }
        }
        return $value;
    }
    public function query($sql){
        $this->_last_query = $sql;
        $result = mysqli_query($this->_connectDB, $sql);
        $this->displayQuery($result);
        return $result;
    }
    public function displayQuery($result){
        if(!$result){
            $output = "Database Query Failed".mysqli_error($this->_connectDB)."<br>";
            $output .= "Last SQL query ".$this->_last_query;
            die($output);
        }else{
            $this->_affected_rows = mysqli_affected_rows($this->_connectDB);
        }
        
    }
    public function fetchAll($sql){
        $result = $this->query($sql);
        $out = [];
        while($row = mysqli_fetch_assoc($result)){
            $out[] = $row;
        }
        mysqli_free_result($result);
        return $out;
    }
    public function fetchOne($sql){
        $out = $this->fetchAll($sql);
        return array_shift($out);
    }
    public function lastId(){
        return mysqli_insert_id($this->_connectDB);
    }
}