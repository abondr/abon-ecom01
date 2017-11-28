<?php
class Catalogue extends Application{
    private $_tblCategories = "categories";
    private $_tblProducts = "products";
    private static $_imagePath = "media/catalogue/";
    private static $_currency = "&#8377;";
    public static function getCurrency(){
        return self::$_currency;
    }
    public static function getImgPath(){
        return self::$_imagePath;
    }
    public function getCategories(){
        $sql = "select * from $this->_tblCategories order by name asc";
        return $this->_db->fetchAll($sql); 
    }
    public function getCategory($id){
        $sql = "select * from $this->_tblCategories where id = ".$this->_db->escape($id);
        return $this->_db->fetchOne($sql); 
    }
    public function getProducts($catId){
        $sql = "select * from $this->_tblProducts where category = ".$this->_db->escape($catId);
        return $this->_db->fetchAll($sql); 
    }
}