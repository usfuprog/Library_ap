<?php

require_once 'model_publisher.php';
require_once 'model_category.php';
require_once 'model_author.php';

class Book {
        private $data;
        public static function Init($id, $name, $date, $pub, $cat, $auth = NULL) {
            $ret = new Book();
            $ret->id = $id;
            $ret->name = $name;
            $ret->date = $date; //strtotime($date);
            $ret->publisher = $pub;
            $ret->category = $cat;
            $ret->authors = (isset($auth) ? array($auth) : array());
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
                "a.id, a.name, a.surname, a.birthdate " .
                "From Publishers as p, Categories as c, Books as b " .
                "Left Outer Join BooksAuthors as ba On ba.book_id = b.id " .
                "Left Outer Join Authors as a On a.id = ba.author_id " .
                "Where b.publisher_id = p.id And b.category_id = c.id";
        
        if (isset($pubId) && $pubId >= 0) {
            $q = $q . " And p.id = $pubId";
        }
        if (isset($catId) && $catId >= 0) {
            $q = $q . " And c.id = $catId";
        }
        if (isset($authId) && $authId >= 0)
        {
            $q = $q . " And ba.author_id = $authId";
        }
//echo $q;
        $res = $conn->query($q);
        $books = array();
        while ($book = $res->fetch_row()) {
            $auth = NULL;
            if (isset($book[7])) {
                $auth = new Author($book[7], $book[8], $book[9], $book[10]);
            }
            $id = $book[0];
            
            if (isset($books[$id]) && isset($auth)) {
                $arr = $books[$id]->authors;
                $arr[] = $auth;
                $books[$id]->authors = $arr;
            }
            else {
                $books[$id] = Book::Init($id, $book[1], $book[2],
                        new Publisher($book[3], $book[4]),
                        new Category($book[5], $book[6]),
                        $auth
                        );
            }
        }
        return $books;
    }
    
    public static function Add($conn, $params)
    {
        $q = "SELECT id FROM books WHERE books.name = '$params[book_name]'";
        $res = $conn->query($q);
        $zzz = $res->fetch_row();
        if (count($zzz))
        {
            echo "Book already exist in database";
            return;
        }
        if ($params['book_name'] == "")
        {
            echo "Empty book name";
            return;
        }
        
        if (Category::GetId($conn, $params['category']) < 0)
        {
            $q = "INSERT INTO Categories (name) VALUES ('$params[category]')";
            $conn->query($q);
        }
        if (Publisher::GetId($conn, $params['publisher_name']) < 0)
        {
            $q = "INSERT INTO Publishers (name) VALUES ('$params[publisher_name]')";
            $conn->query($q);
        }
        if (Author::GetId($conn, $params['author_name'], $params['author_surname'], $params['author_birthdate']) < 0)
        {
            $q = "INSERT INTO Authors (name, surname, birthdate) ".
                    "VALUES ('$params[author_name]', '$params[author_surname]', '$params[author_birthdate]')";
            $conn->query($q);
        }
        
        $q = "INSERT INTO Books (name, pages, date, category_id, publisher_id) ".
                "VALUES ('$params[book_name]', '$params[pages]', '$params[date]', ".
                "(SELECT id FROM Categories WHERE Categories.name = '$params[category]'), ".
                "(SELECT id FROM Publishers WHERE Publishers.name = '$params[publisher_name]'))";
        //echo $q;
        $conn->query($q);
        
        $q = "INSERT INTO BooksAuthors (book_id, author_id) VALUES (".
                "(SELECT id FROM Books WHERE Books.name = '$params[book_name]'), ".
                "(SELECT id FROM Authors WHERE Authors.name = '$params[author_name]' AND ".
                "Authors.surname = '$params[author_surname]' AND ".
                "Authors.birthdate = '$params[author_birthdate]'))";
        //echo $q;
        $conn->query($q);
        
        echo "Book was added in the database   ";
        //echo Category::GetId($conn, $params['category']);
        //echo Publisher::GetId($conn, $params['publisher_name']);
        //echo Author::GetId($conn, $params['author_name'], $params['author_surname'], $params['author_birthdate']);
        
    }
    }