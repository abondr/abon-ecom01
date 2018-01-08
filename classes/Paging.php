<?php

class Paging {

    private $_records;
    private $_max_per_page;
    private $_number_of_pages;
    private $_number_of_records;
    private $_current;
    private $_offset = 0;
    private static $_key = "pg";
    public $_url;

    public function __construct($rows, $max_records = 10) {
        $this->_records = $rows;
        $this->_number_of_records = count($rows);
        $this->_max_per_page = $max_records;
        $this->_url = Url::getCurrentUrl(self::$_key);
        $current = Url::getParam(self::$_key);
        $this->_current = !empty($current) ? $current : 1;
        $this->numberOfPages();
        $this->getOffSet();
    }

    private function numberOfPages() {
        $this->_number_of_pages = ceil($this->_number_of_records / $this->_max_per_page);
    }

    private function getOffSet() {
        $this->_offset = ($this->_current - 1) * $this->_max_per_page;
    }

    public function getRecords() {
        if ($this->_number_of_pages > 1) {
            $last = $this->_offset + $this->_max_per_page;
            for ($i = $this->_offset; $i < $last; $i++) {
                $out[] = $this->_records[$i];
            }
        } else {
            $out = $this->_records;
        }
        return $out;
    }

    private function getLinks() {
        if($this->_number_of_pages > 1){
            $out = [];
            if($this->_current > 1){
                $url = Url::getCurrentUrl(self::$_key);
                echo $url;
                $out[] = "<a href=\"{$url}\">First</a>";
            }else{
                $out[] = "<span>First</span>";
            }
            
            if($this->_current > 1){
                $id = ($this->_current -1);
                $url = $id > 1 ? $this->_url."&amp;".self::$_key."=".$id : $this->_url;
                
                $out[] = "<a href=\"{$url}\">Previous</a>";
            }else{
                $out[] = "<span>Previous</span>";
            }
            
            if($this->_current != $this->_number_of_pages){
                $id = ($this->_current +1);
                $url = $id > 1 ? $this->_url."&amp;".self::$_key."=".$id : $this->_url;
                
                $out[] = "<a href=\"{$url}\">Next</a>";
            }else{
                $out[] = "<span>Next</span>";
            }
            
            if($this->_current != $this->_number_of_pages){
                $id = $this->_number_of_pages;
                $url = $id > 1 ? $this->_url."&amp;".self::$_key."=".$id : $this->_url;
                
                $out[] = "<a href=\"{$url}\">Last</a>";
            }else{
                $out[] = "<span>Last</span>";
            }
            return "<li>".implode("</li><li>",$out)."</li>";
        }
    }
    public function getPaging(){
        $links = $this->getLinks();
        if(!empty($links)){
            $out = "<ul class=\"paging\">".$links."</ul>";
            return $out;
        }
    }
}
