<?php
require_once 'model.php';
class Author extends Model {
    public $id, $name, $surname, $birthdate;
    
    public function __construct($id = NULL, $name = NULL, $surname = NULL, $birthdate = NULL) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthdate = date_create($birthdate);
    }
    
    public function __toString() {
        return $this->name . ' ' . $this->surname;
    }
    
    public static function GetAll($conn) {
        return Model::Select($conn, 'Authors', array('id', 'name', 'surname', 'birthdate' ), 'Author');
    }
    
    public static function GetId($conn, $name, $surname, $birthdate)
    {
        $q = "SELECT id FROM Authors WHERE Authors.name = '$name' ".
                "AND Authors.surname = '$surname' ".
                "AND Authors.birthdate = '$birthdate'";
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