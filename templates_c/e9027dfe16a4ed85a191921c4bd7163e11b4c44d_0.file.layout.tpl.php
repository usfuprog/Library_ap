<?php /* Smarty version 3.1.28-dev/63, created on 2015-11-15 20:10:55
         compiled from "C:\OpenServer\domains\Library\templates\layout.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/63',
  'unifunc' => 'content_5648bc9fb5e998_13976323',
  'file_dependency' => 
  array (
    'e9027dfe16a4ed85a191921c4bd7163e11b4c44d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Library\\templates\\layout.tpl',
      1 => 1447607336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:login.tpl' => 1,
  ),
),false);
if ($_valid && !is_callable('content_5648bc9fb5e998_13976323')) {
function content_5648bc9fb5e998_13976323 ($_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php $_smarty_tpl->setupSubTemplate('file:login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false)->render();
?>

        <h1>Мой супер сайт</h1>
        <?php $_smarty_tpl->setupSubTemplate(((string)$_smarty_tpl->tpl_vars['content_tpl']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true)->render();
?>

    </body>
</html>
<?php }
}
