<?php
/* Smarty version 4.2.1, created on 2022-10-04 23:55:34
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\contacto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633cabd6418318_29616499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a86821d546fbfb6a7a55d8212baf968ee598c971' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\contacto.tpl',
      1 => 1664909937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
    'file:app/Templates/footer.tpl' => 1,
  ),
),false)) {
function content_633cabd6418318_29616499 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center shadow p-3 mb-5 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
<div class="text-center">
    <ul class="list-group p-4">
        <li class="list-group-item badge text-bg-danger">INSTAGRAM</li>
        <li class="list-group-item badge text-bg-info">FACEBOOK</li>
        <li class="list-group-item badge text-bg-primary">GitHub</li>
    </ul>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
