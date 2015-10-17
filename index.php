<!-- ?
    if ($qs = filter_input(INPUT_SERVER, 'QUERY_STRING')) {
        $req = explode('?', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $prm = trim($req[0], '/') . '/';
        foreach(explode('&', trim($qs, '/')) as $itm) {
            $pp = explode('=', $itm);
            $prm = $prm . $pp[0] . '-' . $pp[1] . '/';
        }
                
        header("Location: /" . $prm, TRUE, 301);
    }
? -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?
    //print_r($GLOBALS);
    //print_r($_REQUEST);
    //print_r($_SERVER);
    //print_r($qs);
    //echo $_SERVER['REQUEST_URI'];
    
    require_once 'conn.php';
    require_once 'smarty.php';
    require_once 'model_book.php';
    require_once 'model_publisher.php';
    
    $pubId = filter_input(INPUT_GET, 'publisher');
    $books = FindBooks($conn, $pubId);
    //require_once 'view_books.php';
    $pubs = array(0 => '- Все -') + Publisher::FindAll($conn);
    
    $smarty->assign('books', $books);
    $smarty->assign('pubs', $pubs);
    $smarty->assign('pubId', $pubId);
    $smarty->display('books.tpl');
?>
    </body>
</html>
