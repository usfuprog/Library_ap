<?php

class Author {
    public $id, $name, $surname, $birthdate;
    
    public function __construct($id, $name, $surname, $birthdate) {
        $this->Init($id, $name, $surname, $birthdate);
    }
    
    public function Init($id, $name, $surname, $birthdate) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthdate = $birthdate;
    }
    public function Load($conn, $id) {
        $res = $conn->query("Select name, surname, birthdate From Authors Where id={$id}");
        if ($res && ($r = $res->fetch_row()))
        {
            $this->Init($id, $r[0], $r[1], $r[2]);
            return TRUE;
        }
        return FALSE;
    }
}

class Book {
    public $id, $name, $authors, $category;
    
    
}

function FindBooks($conn, $cat_id, $auth_id, $pub_id) {
    $ret = array();
    
    $q = "Select b.id, b.name, c.id, c.name, p.id, p.name, a.id, a.name, a.surname, a.birthdate "
            . "From Books as b, ";
    //$res = $conn->query("Select");
    
}


?>