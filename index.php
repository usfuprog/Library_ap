<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?
    require_once 'conn.php';
    require_once 'model_book.php';
    
    $books = FindBooks($conn);
    
    require_once 'view_books.php';
?>
    </body>
</html>