<?php /* Smarty version 3.1.28-dev/63, created on 2015-11-12 13:55:37
         compiled from "C:\OpenServer\domains\Library\templates\modify_db\add_book.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/63',
  'unifunc' => 'content_56447029da7365_51410664',
  'file_dependency' => 
  array (
    '3c649afd69c712620db0c2f6b0207d4eb06ba190' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Library\\templates\\modify_db\\add_book.tpl',
      1 => 1447325720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_56447029da7365_51410664')) {
function content_56447029da7365_51410664 ($_smarty_tpl) {
?>
<div>
    </br>
    <?php if ($_POST['modify_db'] == "Add book") {?>
        <form method="get" action="/Book/Add">
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
            <input type="submit" value="Done">
        </form>
        <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
">
            <input type="submit" value="Cancel" name="modify_db" />
        </form>
    <?php } else { ?>
        <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
">
            <input type="submit" value="Add book" name="modify_db" />
        </form>
    <?php }?>
</div>
<?php }
}
