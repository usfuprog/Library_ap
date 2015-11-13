<?php
require_once 'tester.php';
try
{
    if (filter_input(INPUT_SERVER, 'QUERY_STRING')) {
        $prm = explode('?', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $prm = trim($prm[0], '/');
        if (strlen($prm)) {
            $prm = $prm . '/';
        }
        foreach(filter_input_array(INPUT_GET) as $k=>$v) {
            $prm = $prm . $k . '/' . $v . '/';
        }
        tester::TEST($prm);
        header("Location: /" . $prm, TRUE, 301);
    }
    
    session_start();
    //print_r($GLOBALS);
    //print_r($_REQUEST);
    //print_r($_SERVER);
    //print_r($qs);
    //echo $_SERVER['REQUEST_URI'];
    
    require_once 'conf.php';
    require_once 'router.php';
    
    
    $req_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
    //echo $req_uri;
    //$post_get = (filter_input_array(INPUT_POST) ?: array()) + (filter_input_array(INPUT_GET) ?: array());
    $post = filter_input_array(INPUT_POST);
    if (isset($post))
        foreach ($post as $k=>$zzz)
            {
                tester::TEST($k."=>".$zzz);
            }
/*    if (isset($_POST["test_zzz"]))
        tester::TEST("____hura");
    else
        tester::TEST("____QQQ");*/
    $router = new Router($req_uri, $post);
    $ctrl = $router->Controller() ?: DEFAULT_CTRL;
    if (strtolower($ctrl) == 'index.php') {
        $ctrl = DEFAULT_CTRL;
    }
    
    $ctrl_php = 'controller_' . strtolower($ctrl) . '.php';
    $ctrl_class = 'Controller' . $ctrl;
    $action = $router->Action() ?: DEFAULT_ACTION;
    $params = $router->Params();

    require_once DIR_CTRL . $ctrl_php;
    $controller = new $ctrl_class();
    
    $controller->$action($params);
    
}
catch(Exception $ex) {
    echo 'Error!!!' . $ex;
}