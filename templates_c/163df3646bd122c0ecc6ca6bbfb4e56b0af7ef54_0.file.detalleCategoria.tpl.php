<?php
/* Smarty version 4.2.1, created on 2022-10-08 22:46:41
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\detalleCategoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6341e1b1a01490_76372922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '163df3646bd122c0ecc6ca6bbfb4e56b0af7ef54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\detalleCategoria.tpl',
      1 => 1665261863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
    'file:app/Templates/footer.tpl' => 1,
  ),
),false)) {
function content_6341e1b1a01490_76372922 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
        <p class="fs-5 pt-4 m-4"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->descripcion;?>
</p>
        <a class="btn btn-primary m-4" href='home'>Volver</a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
