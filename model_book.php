<?php

require_once 'model_publisher.php';

class Book {
        private $data;
        public static function Init($id, $name, $date) {
        //public function __construct($id, $name, $date) {
            $ret = new Book();
            $ret->id = (int)$id;
            $ret->name = $name;
            $ret->date = date_create($date); //strtotime($date);
            return ret;
        }
        
        public function __get($name) {
            return $this->data[$name];
        }
        public function __set($name, $value) {
            if ( substr($name, -2) == 'id')
                $this->data[$name] = (int)$value;
            else if ($name == 'date')
                $this->data[$name] = date_create($value);
            else
                $this->data[$name] = $value;
        }
    }

function FindBooks($conn, $pubId) {
    $q = "Select b.id, b.name, b.date, b.publisher_id, p.name ".
            "From Books as b, Publishers as p " .
            "Where b.publisher_id = p.id";
    if (!empty($pubId))
        $q = $q . " And p.id = $pubId";
    
    $books = array();
    $res = $conn->query($q);
    while ($book = $res->fetch_row()) {
        $b = new Book();
        $b->id = $book[0];
        $b->name = $book[1];
        $b->date = $book[2];
        $b->publisher = new Publisher($book[3], $book[4]);
        
        $books[] = $b;
    }
    return $books;
}