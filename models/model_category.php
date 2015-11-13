<?php

require_once 'model.php';
class Category extends Model {
    public $id, $name;
    
    public function __construct($id = NULL, $name = NULL) {
        $this->id = $id;
        $this->name = $name;
    }
    
    public function __toString() {
        return $this->name;
    }
    
    public static function GetAll($conn) {
        return Model::Select($conn, 'Categories', array('id', 'name'), 'Category');
    }
    
    public static function GetId($conn, $name)
    {
        $q = "SELECT id FROM Categories WHERE Categories.name = '$name'";
        $res = $conn->query($q);
        $zzz = $res->fetch_row();
        if (count($zzz))
        {
            return $zzz[0];
        }
        else 
        {
            return -1;
        }
    }
}