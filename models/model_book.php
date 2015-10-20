<?php

require_once 'model_publisher.php';
require_once 'model_category.php';

class Book {
        private $data;
        public static function Init($id, $name, $date, $pub, $cat) {
            $ret = new Book();
            $ret->id = $id;
            $ret->name = $name;
            $ret->date = $date; //strtotime($date);
            $ret->publisher = $pub;
            $ret->category = $cat;
            return $ret;
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

    public static function Find($conn, $pubId = NULL, $catId = NULL) {
        $q = "Select b.id, b.name, b.date, b.publisher_id, p.name, b.category_id, c.name ".
                "From Books as b, Publishers as p, Categories as c " .
                "Where b.publisher_id = p.id And b.category_id = c.id";
        if (isset($pubId) && $pubId >= 0) {
            $q = $q . " And p.id = $pubId";
        }
        if (isset($catId) && $catId >= 0) {
            $q = $q . " And c.id = $catId";
        }
//echo $q;
        $res = $conn->query($q);
        $books = array();
        while ($book = $res->fetch_row()) {
            $books[] = Book::Init($book[0], $book[1], $book[2],
                    new Publisher($book[3], $book[4]),
                    new Category($book[5], $book[6])
                    );
        }
        return $books;
    }
    }