<?php

require_once 'model_publisher.php';
require_once 'model_category.php';
require_once 'model_author.php';

class Book {
        private $data;
        public static function Init($id, $name, $date, $pub, $cat, $auth) {
            $ret = new Book();
            $ret->id = $id;
            $ret->name = $name;
            $ret->date = $date; //strtotime($date);
            $ret->publisher = $pub;
            $ret->category = $cat;
            $ret->author = $auth;
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

    public static function Find($conn, $pubId = NULL, $catId = NULL, $authId = NULL) {
        $q = "Select b.id, b.name, b.date, b.publisher_id, p.name, b.category_id, c.name, ".
                "b_a.book_id, b_a.author_id, a.id, a.name, a.surname ".
                "From Books as b, Publishers as p, Categories as c, " .
                "BooksAuthors as b_a, Authors as a ".
                "Where b.publisher_id = p.id And b.category_id = c.id ".
                "And b_a.book_id = b.id And b_a.author_id = a.id";
        if (isset($pubId) && $pubId >= 0) {
            $q = $q . " And p.id = $pubId";
        }
        if (isset($catId) && $catId >= 0) {
            $q = $q . " And c.id = $catId";
        }
        if (isset($authId) && $authId >= 0) {
            $q = $q . " And a.id = $authId";
        }
//echo $q;
        $res = $conn->query($q);
        $books = array();
        while ($book = $res->fetch_row()) {
            $books[] = Book::Init($book[0], $book[1], $book[2],
                    new Publisher($book[3], $book[4]),
                    new Category($book[5], $book[6]),
                    new Author($book[9], $book[11])
                    );
        }
        return $books;
    }
    }