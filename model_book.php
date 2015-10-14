<?php

class Book {
        public $id, $name, $date;
        public function __construct($id, $name, $date) {
            $this->id = (int)$id;
            $this->name = $name;
            $this->date = date_create($date); //strtotime($date);
        }
    }

function FindBooks($conn) {
    $q = "Select id, name, date From Books";
    $res = $conn->query($q);
    $books = array();
    while ($book = $res->fetch_row()) {
        $books[] = new Book($book[0], $book[1], $book[2]);
    }
    return $books;
}