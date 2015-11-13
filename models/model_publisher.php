<?php
require_once 'model.php';

class Publisher extends Model {
    public $id, $name;
    
    public function __construct($id = NULL, $name = NULL) {
        $this->id = $id;
        $this->name = $name;
    }
    
    public function __toString() {
        return $this->name;
    }
    
    public static function GetAll($conn) {
        return Model::Select($conn, 'Publishers', array('id', 'name'), 'Publisher');
//        $pubs = array();
//        $res = $conn->query("Select id, name From Publishers Order by name");
//        while ($p = $res->fetch_object()) {
//            $pubs[ $p->id ] = new Publisher($p->id, $p->name);
//        }
//        return $pubs;
    }
    
    public static function GetId($conn, $name)
    {
        $q = "SELECT id FROM Publishers WHERE Publishers.name = '$name'";
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

