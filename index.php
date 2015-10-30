<?php
    if (filter_input(INPUT_SERVER, 'QUERY_STRING')) {
        $prm = explode('?', filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $prm = trim($prm[0], '/');
        if (strlen($prm)) {
            $prm = $prm . '/';
        }
        foreach(filter_input_array(INPUT_GET) as $k=>$v) {
            $prm = $prm . $k . '/' . $v . '/';
        }
        header("Location: /" . $prm, TRUE, 301);
    }

    //print_r($GLOBALS);
    //print_r($_REQUEST);
    //print_r($_SERVER);
    //print_r($qs);
    //echo $_SERVER['REQUEST_URI'];
    define('__ROOT__', dirname(__FILE__) . '/');
    
    require_once 'conf.php';
    require_once 'router.php';
    
    $req_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
//    require_once DIR_MODEL . 'model_publisher.php';
//    $test = new Publisher("3", "IDIOT");
//    echo $test;  
//    return;
    //$post_get = (filter_input_array(INPUT_POST) ?: array()) + (filter_input_array(INPUT_GET) ?: array());
    $post = filter_input_array(INPUT_POST);
    $router = new Router($req_uri, $post);
    $ctrl = $router->Controller() ?: DEFAULT_CTRL;
    $ctrl == strtolower('index.php') ? $ctrl = DEFAULT_CTRL : 'QUERY_STRING';
    //echo $ctrl;//cto u programistov jest krome echo? console.log() JS ???
    $ctrl_php = 'controller_' . strtolower($ctrl) . '.php';
    $ctrl_class = 'Controller' . $ctrl;
    $action = $router->Action() ?: DEFAULT_ACTION;
//    echo $action;
//    echo $ctrl_class;
    $params = $router->Params();
 //   foreach ($params as $zzz)echo $zzz;//kak vyjasnit ne znacenije a sam key ???
    
    require_once DIR_CTRL . $ctrl_php;
    $controller = new $ctrl_class();
    
    $controller->$action($params);
