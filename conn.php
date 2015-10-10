<?php

require_once 'conf.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$conn->query("SET NAMES utf8");

?>