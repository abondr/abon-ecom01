<?php

class paging{
    private $_records;
    private $_max_per_page;
    private $_numb_of_pages;
    private $_current;
    private $_offset = 0;
    private static $_key = "pg";
    public $_url;
    public function __construct($rows,$max = 10) {
        $this->_records = $rows;
        $this->_numb_of_pages = count($rows);
        $this->_max_per_page = $max;
        $this->_url = Url::getCurrentUrl(self::$_key);
        $current = Url::getParam(self::$_key);
        $this->_current = !empty($current) ? $current : 1;
        $this->numberOfPages();
        $this->getOffset();
    }
    
} 