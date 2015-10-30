<?php

require_once __ROOT__  . 'conf.php';
require_once DIR_BASE . 'conn.php';
require_once DIR_BASE . 'smarty.php';

class Controller {
    protected $conn, $smarty;
    
    public function __construct() {
        $this->smarty = new Smarty();
        $this->conn = getConn();
    }
}