<?php
require_once 'conf.php';

class tester
{
    public static function TEST($params)
    {
        $file = DIR_BASE."TEST.TXT";
        $current = file_get_contents($file);
        if (isset($current))
            $current .= $params;
        else
            $current = $params;
        $current .= "       \n";
        file_put_contents($file, $current);
    }

}
