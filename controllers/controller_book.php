<?php

require_once 'controller.php';
require_once DIR_MODEL . 'model_book.php';
require_once DIR_MODEL . 'model_publisher.php';
require_once DIR_MODEL . 'model_category.php';
require_once DIR_MODEL . 'model_author.php';

class ControllerBook extends Controller {
    public function Index($params) {
        $this->smarty->
                assign('books', Book::Find($this->conn, $params['pubId'], $params['catId'], $params['authId']));

        $this->smarty->assign('pubs', array(-1 => '- Все -') + Publisher::GetAll($this->conn));
        $this->smarty->assign('pubId', $params['pubId']);

        $this->smarty->assign('cats', array(-1 => '- Все -') + Category::GetAll($this->conn));
        $this->smarty->assign('catId', $params['catId']);
        
        $this->smarty->assign('auth', array(-1 => '- Все -') + Author::GetAll($this->conn));
        $this->smarty->assign('authId', $params['authId']);
        
        $this->smarty->display('books.tpl');
    }
    
    public function Delete($params) {
        Book::Delete($this->conn, $params['id']);
    }
    
    public function Update($params) {  
        
    }
    
    public function Insert($params) {  
        
    }
    
    public function Edit($params) {
        
    }
    
    public function Show($params) {
        
    }
    
    public function Add($params) {
        
    }
    
}