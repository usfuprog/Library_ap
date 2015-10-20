<?php
define('DB_NAME', 'Library');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

define('DIR_BASE', str_replace("\\", "/", getcwd()) . '/');
define('DIR_MODEL', DIR_BASE.'models/');
define('DIR_CTRL', DIR_BASE.'controllers/');
define('DIR_VIEW', DIR_BASE.'templates/');

define('DEFAULT_CTRL', 'Book');
define('DEFAULT_ACTION', 'Index');

?>