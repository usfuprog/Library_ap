<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?
    define('SMARTY_DIR', str_replace("\\", "/", getcwd()).'/smarty/libs/');
    require_once(SMARTY_DIR . 'Smarty.class.php');
    $smarty = new Smarty();
    //$smarty->addTemplateDir(str_replace("\\", "/", getcwd()).'/views');
    
    require_once 'conn.php';
    require_once 'model_book.php';
    
    $books = FindBooks($conn);
    //require_once 'view_books.php';

    $smarty->assign('books', $books);
    $smarty->display('books.tpl');
?>
    </body>
</html>