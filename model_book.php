<?php

class Book {
        public $id, $name, $date;
        public function __construct($id, $name, $date) {
            $this->id = $id;
            $this->name = $name;
            $this->date = $date;
        }
    }

    function FindBooks($conn) {
        $q = "Select id, name, date From Books";
        $res = $conn->query($q);
        $books = array();
        while ($book = $res->fetch_object()) {
            $books[] = new Book($book->id, $book->name, $book->date);
        }
        return $books;
    }
    

