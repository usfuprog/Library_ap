<?php

require_once 'controller.php';
require_once DIR_MODEL . 'model_book.php';
require_once DIR_MODEL . 'model_publisher.php';
require_once DIR_MODEL . 'model_category.php';
require_once DIR_MODEL . 'model_author.php';

class ControllerBook extends Controller {
    public function __construct() 
    {
        parent::__construct();
    }

    public function Index($params) {
        
        $this->view->Show('books.tpl',
                array(
                    'books' => Book::Find($this->conn, $params['pubId'], $params['catId'], $params['authId']),
                    'pubs' => array(-1 => '- Все -') + Publisher::GetAll($this->conn),
                    'pubId' => $params['pubId'],
                    'cats' => array(-1 => '- Все -') + Category::GetAll($this->conn),
                    'catId' => $params['catId'],
                    'auth' => array(-1 => '- Все -') + Author::GetAll($this->conn),
                    'authId' => $params['authId']
                    )
                );
        
//        $this->smarty->assign('books', Book::Find($this->conn, $params['pubId'], $params['catId']));
//
//        $this->smarty->assign('pubs', array(-1 => '- Все -') + Publisher::GetAll($this->conn));
//        $this->smarty->assign('pubId', $params['pubId']);
//
//        $this->smarty->assign('cats', array(-1 => '- Все -') + Category::GetAll($this->conn));
//        $this->smarty->assign('catId', $params['catId']);
//        
//        $this->smarty->display('books.tpl');
    }
    
    public function Delete($params) {
//        Book::Delete($this->conn, $params['id']);
//        echo ("delete");
        $report = 
                Book::Delete($this->conn, $params['book_id']);
        echo $report;
    }
    
    public function Update($params) {  
        
    }
    
    public function Insert($params) {  
        
    }
    
    public function Edit($params) {
        echo ("edit");
    }
    
    public function Show($params) {
        
    }
    
    public function Add($params) {
        //echo "Add function:";
        //foreach ($params as $k=>$zzz)
        //    echo " " . $k . "=>" . $zzz;
        $this->view->SetLayout("modify_db/add_book.tpl");
        //echo $params['modify_db'];
        if ($params['add_book'] == "Add book" OR isset($params['add_book']) == false)
            $this->view->Show("modify_db/add_book.tpl", array('show_form'=>'true'));
        else
            if ($params['add_book'] == "Done")
            {
                Book::Add($this->conn, $params);
            }
    }
    
    public function modify_db($params)
    {
        if (isset($params['add_book']))
        {
            //$actUri = $_SERVER['REQUEST_URI'];
            //echo strrpos($actUri, "modify_db")."______________";
            //echo $actUri;
            //$newUri = substr($actUri, 0, strrpos($actUri, "modify_db"));
            //echo $newUri;
            //header($newUri . "Add/", TRUE, 301);
            //pocemu eto nerabotejet ^^^^^ ???
            $this->Add($params);
        }
        
        if (isset($params['book_id']))
        {
            if ($params['delete_now'])
            {
                $this->Delete($params);
            }
            else
            if ($params['edit_now'])
            {
                $this->Edit($params);
            }
        }
        
        $default_message = 
        "With our super site you have ability to edit, delete or add books. And much more! ".
        "Just choose your options on main page ...";

        if (isset($params['add_book']) == false)
        if (isset($params['delete_now']) == false AND isset($params['edit_now']) == false)
            echo $default_message;
    }
    
}