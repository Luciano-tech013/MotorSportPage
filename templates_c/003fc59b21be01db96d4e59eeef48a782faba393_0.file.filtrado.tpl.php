<?php
/* Smarty version 4.2.1, created on 2022-10-08 20:26:19
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\filtrado.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6341c0cbf42351_87304132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '003fc59b21be01db96d4e59eeef48a782faba393' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\filtrado.tpl',
      1 => 1665253574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
    'file:app/Templates/footer.tpl' => 1,
  ),
),false)) {
function content_6341c0cbf42351_87304132 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Autos que pertenecen a <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
:<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></h1>
    
    <ul class="list-group text-center">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
?>
        <li class="list-group-item fs-4"><?php echo $_smarty_tpl->tpl_vars['auto']->value->nombre;?>
</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    
</section>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
