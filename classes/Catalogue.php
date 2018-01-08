<?php

class Catalogue extends Application{
    private $_categories = "categories";
    private $_products = "products";
    public $_path = "media/catalogue/";
    public static $_currency = "&#8377;";
    public function getCategories(){
        $sql = "select * from {$this->_categories} order by name ";
        return $this->db->fetchAll($sql);
    }
    
    public function getCategory($cat_id){
        $sql = "select * from {$this->_categories} where id = ".
                $this->db->escape($cat_id)." ";
        return $this->db->fetchOne($sql);
    }
    public function getProducts($cat_id){
        $sql = "select * from {$this->_products} where category = ".
                $this->db->escape($cat_id)
                ." order by date desc";
        return $this->db->fetchAll($sql);
    }
}