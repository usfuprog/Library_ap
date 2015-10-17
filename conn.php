<?php
    require_once 'conf.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $conn->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    $conn->query("SET NAMES utf8");

    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
