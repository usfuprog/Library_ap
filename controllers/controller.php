<?php

require_once __ROOT__  . 'conf.php';
require_once DIR_BASE . 'conn.php';
require_once DIR_BASE . 'smarty.php';
require_once DIR_BASE . 'view.php';

class Controller {
    protected $conn, $view;
    
    public function __construct() {
        $this->view = new View();
        $this->conn = getConn();
    }
}