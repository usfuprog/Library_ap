<?php

class Publisher {
    public $id, $name;
    
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    public function __toString() {
        return $this->name;
    }
    
    public static function FindAll($conn) {
        $pubs = array();
        $res = $conn->query("Select id, name From Publishers");
        while ($p = $res->fetch_object()) {
            $pubs[ $p->id ] = new Publisher($p->id, $p->name);
        }
        return $pubs;
    }
}

