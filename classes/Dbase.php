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
        $this->_connDB = mysqli_connect($this->_host, $this->_user,
                $this->_password, $this->_name);
        if(!$this->_connDB){
            die("<br>Database connecion failed<br>".mysqli_error($this->_connDB));
        }else{
            $_select = mysqli_select_db($this->_connDB, $this->_name);
            if(!$_select){
                die("<br>database selection failed<br>".mysqli_error($this->_connDB));
            }
        }
        mysqli_set_charset($this->_connDB, "utf8");
    }
    public function close(){
        if(!mysqli_close($this->_connDB)){
            die("<br>database closing failed<br>".mysqli_error($this->_connDB));            
        }
    }
    public function escape($value){
        if(function_exists("mysqli_escape_string")){
            if(get_magic_quotes_gpc()){
                $value = stripslashes($value);
            }
            $value = mysqli_real_escape_string($this->_connDB,$value);
        }else{
            if(!get_magic_quotes_gpc()){
                $value = addslashes($value);
            }
        }
        return $value;
    }
    public function query($sql){
        $this->_last_query = $sql;
        $result  = mysqli_query($this->_connDB, $sql);
        $this->displayQuery($result);
        return $result;
    }
    public function displayQuery($result){
        if(!$result){
            $output = "<br>database query failed<br>".mysqli_error($this->_connDB);
            $output .= " Last Executed query = <br>".$this->_last_query;
            die($output);
        }else{
            $this->_effected_rows = mysqli_affected_rows($this->_connDB);
        }
    }
    public function fetchAll($sql){
        $result = $this->query($sql);
        $out = [];
        while ($row = mysqli_fetch_assoc($result)){
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
        return mysqli_insert_id($this->_connDB);
    }
}