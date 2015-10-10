<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    $conn = new mysqli("localhost", "root", "", "Library");
    $conn->query("SET NAMES utf8");
    $res = $conn->query("Select * From Books");
    echo "<table>";
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>{$row->id}</td>";
        echo "<td>{$row->name}</td>";
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>