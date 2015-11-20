<?php /* Smarty version 3.1.28-dev/63, created on 2015-11-17 22:47:14
         compiled from "C:\OpenServer\domains\Library\templates\modify_db\add_book.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/63',
  'unifunc' => 'content_564b8443044bf2_57240406',
  'file_dependency' => 
  array (
    '3c649afd69c712620db0c2f6b0207d4eb06ba190' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Library\\templates\\modify_db\\add_book.tpl',
      1 => 1447789619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_564b8443044bf2_57240406')) {
function content_564b8443044bf2_57240406 ($_smarty_tpl) {
?>
<div>
    </br>
    <?php if ($_smarty_tpl->tpl_vars['show_form']->value) {?>
        <span>Add book</span>
        <form method="POST" action="/Book/modify_db/">
            <input type='text' name='book_name' />
            <span> < < < Book name </span>
            </br>
            <input type='text' name='author_name' />
            <span> < < < Author`s name</span>
            </br>
            <input type='text' name='author_surname' />
            <span> < < < Author`s surname</span>
            </br>
            <input type='text' name='author_birthdate' />
            <span> < < < Author`s birthdate</span>
            </br>
            <input type='text' name='publisher_name' />
            <span> < < < Publisher </span>
            </br>
            <input type='text' name='category' />
            <span> < < < Categorie </span>
            </br>
            <input type='text' name='date' />
            <span> < < < Date </span>
            </br>
            <input type='text' name='pages' />
            <span> < < < Pages count </span>
            </br>
            
            </br>
            <input type="submit" value="Done" name="add_book">
        </form>
        <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
">
            <input type="submit" value="Cancel" name="add_book" />
        </form>
        <?php } else { ?>
            <form method="POST" action="/Book/modify_db/" target="_blank">
                <input type="submit" value="Add book" name="add_book" />
            </form>
        <?php }?>
</div>
<?php }
}
