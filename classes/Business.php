<?php

class Business extends Application{
    private $_table = "business";
    public function getBusiness(){
        $sql = "select * from {$this->_table} where id = 1";
        return $this->db->fetchOne($sql);
    }
    public function getVatRate(){
        
    }
}