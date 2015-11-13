<?php /* Smarty version 3.1.28-dev/63, created on 2015-11-08 21:12:01
         compiled from "C:\OpenServer\domains\Library\templates\login.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/63',
  'unifunc' => 'content_563f9071d05556_98677823',
  'file_dependency' => 
  array (
    'b2a5bf9655c9d01674767610305736369a37ec83' => 
    array (
      0 => 'C:\\OpenServer\\domains\\Library\\templates\\login.tpl',
      1 => 1447006302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_563f9071d05556_98677823')) {
function content_563f9071d05556_98677823 ($_smarty_tpl) {
?>
<div>
    <form action="/Login" method="POST">
        <input type="hidden" name="uri" value="<?php echo $_SERVER['REQUEST_URI'];?>
"/>
        <?php if ($_SESSION['user']) {?>
            Привет, <?php echo $_SESSION['user'];?>

            <input type="submit" value="Sign out..."/>
        <?php } else { ?>
            Login: <input type="text" name="login"/>
            Password: <input type="password" name="pswd"/>
            <input type="submit" value="Sign in"/>
        <?php }?>
    </form>
</div>
<?php }
}
