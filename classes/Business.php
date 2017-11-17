<?php

class Business extends Application{
    private $_tblBusiness = "business";
    public function getBusiness(){
        $sql = "select * from $this->_tblBusiness where id = 1";
        return $this->_db->fetchOne($sql);
    }
    public function getVatRate(){
        
    }
}