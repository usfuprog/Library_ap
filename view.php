<?php

require_once 'conf.php';
require_once 'smarty.php';

class View extends Smarty {
    private $layout;
    
    public function __construct() {
        parent::__construct();
        $this->SetLayout(DEFAULT_LAYOUT);
    }
    
    public function SetLayout($layout) {
        $this->layout = (file_exists(DIR_VIEW . $layout) ? $layout : '');
    }
    
    public function Show($tpl, $params = NULL) {
        //echo $tpl . " __ " . $params;
        //foreach ($params as $k => $zzz)echo $k . " __ " . $zzz;
        
        if (isset($params)) {
            foreach ($params as $k=>$v) {
                $this->assign($k, $v);
            }
        }
        //echo $this;
        $this->assign('view', $this);
        
        if (empty($this->layout)) {
            $this->display($tpl);
        }
        else {
            $this->assign(CONTENT_TPL_VAR, $tpl);
            $this->display($this->layout);
        }
    }
}
