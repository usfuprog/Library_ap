<?php /* Smarty version 3.1.28-dev/63, created on 2015-10-29 12:04:56
         compiled from "C:\OpenServer\domains\Library\templates\books.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/63',
  'unifunc' => 'content_5631e13864af88_14536776',
  'file_dependency' => 
  array (
    '113d321916b7c620bcac53a3dccc7893c22a9da6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Library\\templates\\books.tpl',
      1 => 1446109443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5631e13864af88_14536776')) {
function content_5631e13864af88_14536776 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:/OpenServer/domains/Library/smarty/libs/plugins\\function.html_options.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="get" action="/Book/Index">
            <?php echo smarty_function_html_options(array('name'=>"catId",'options'=>$_smarty_tpl->tpl_vars['cats']->value,'selected'=>$_smarty_tpl->tpl_vars['catId']->value),$_smarty_tpl);?>

            <?php echo smarty_function_html_options(array('name'=>"pubId",'options'=>$_smarty_tpl->tpl_vars['pubs']->value,'selected'=>$_smarty_tpl->tpl_vars['pubId']->value),$_smarty_tpl);?>

            <?php echo smarty_function_html_options(array('name'=>"authId",'options'=>$_smarty_tpl->tpl_vars['auth']->value,'selected'=>$_smarty_tpl->tpl_vars['authId']->value),$_smarty_tpl);?>

            <input type="submit" value="Refresh">
        </form>
        
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Publisher</th>
                    <th>Author</th>
                </tr>
            </thead>
            <?php
$_from = $_smarty_tpl->tpl_vars['books']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_b_0_saved_item = isset($_smarty_tpl->tpl_vars['b']) ? $_smarty_tpl->tpl_vars['b'] : false;
$_smarty_tpl->tpl_vars['b'] = new Smarty_Variable();
$__foreach_b_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_b_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['b']->value) {
$__foreach_b_0_saved_local_item = $_smarty_tpl->tpl_vars['b'];
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
</td>
                    <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['b']->value->date->format('d.m.Y');?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['b']->value->category;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['b']->value->publisher;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['b']->value->author;?>
</td>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['b'] = $__foreach_b_0_saved_local_item;
}
}
if ($__foreach_b_0_saved_item) {
$_smarty_tpl->tpl_vars['b'] = $__foreach_b_0_saved_item;
}
?>
        </table>
    </body>
</html>
<?php }
}