<?php /* Smarty version 3.1.28-dev/63, created on 2015-11-17 21:12:54
         compiled from "C:\OpenServer\domains\Library\templates\books.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/63',
  'unifunc' => 'content_564b6e26db72a0_13234090',
  'file_dependency' => 
  array (
    '113d321916b7c620bcac53a3dccc7893c22a9da6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Library\\templates\\books.tpl',
      1 => 1447783821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modify_db/add_book.tpl' => 1,
  ),
),false);
if ($_valid && !is_callable('content_564b6e26db72a0_13234090')) {
function content_564b6e26db72a0_13234090 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:/OpenServer/domains/Library/smarty/libs/plugins\\function.html_options.php';
?>
<div>
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
                <th>Authors</th>
                <th>Edit</th>
                <th>Delete</th>
                <th></th>
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
                <td><?php
$_from = $_smarty_tpl->tpl_vars['b']->value->authors;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_a_1_saved_item = isset($_smarty_tpl->tpl_vars['a']) ? $_smarty_tpl->tpl_vars['a'] : false;
$_smarty_tpl->tpl_vars['a'] = new Smarty_Variable();
$__foreach_a_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_a_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$__foreach_a_1_saved_local_item = $_smarty_tpl->tpl_vars['a'];
echo $_smarty_tpl->tpl_vars['a']->value;?>
<br /><?php
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_1_saved_local_item;
}
}
if ($__foreach_a_1_saved_item) {
$_smarty_tpl->tpl_vars['a'] = $__foreach_a_1_saved_item;
}
?></td>
                <form method="POST" action="/Book/modify_db/" target="_blank">
                    <td><input type='checkbox' name='edit_now' /></td>
                    <td><input type='checkbox' name='delete_now' /></td>
                    <td><input type="submit" value="Go" name="book_id"></td>
                    <input type='hidden' value=<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
 name="book_id" />
                </form>
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
    <?php $_smarty_tpl->setupSubTemplate('file:modify_db/add_book.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false)->render();
?>

</div>
<?php }
}
