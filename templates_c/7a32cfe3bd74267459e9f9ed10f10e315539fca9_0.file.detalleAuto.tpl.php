<?php
/* Smarty version 4.2.1, created on 2024-11-30 20:47:07
  from 'F:\software development\xampp\htdocs\motorsportpage\app\Templates\detalleAuto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_674b6bbbc607e1_31157699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a32cfe3bd74267459e9f9ed10f10e315539fca9' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\Templates\\detalleAuto.tpl',
      1 => 1732989079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/header.tpl' => 1,
    'file:app/templates/footer.tpl' => 1,
  ),
),false)) {
function content_674b6bbbc607e1_31157699 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
?>
        <p class="fs-5 pt-4 m-4"><?php echo $_smarty_tpl->tpl_vars['auto']->value->descripcion;?>
</p>
        <a class="btn btn-primary m-4" href='home'>Volver</a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:app/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
