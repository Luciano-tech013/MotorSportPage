<?php
/* Smarty version 4.2.1, created on 2024-11-30 20:47:19
  from 'F:\software development\xampp\htdocs\motorsportpage\app\Templates\filtrado.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_674b6bc72b0e37_64877035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db5b926f575973fc8a0e056218683bac162533a4' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\Templates\\filtrado.tpl',
      1 => 1732989065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/header.tpl' => 1,
    'file:app/templates/footer.tpl' => 1,
  ),
),false)) {
function content_674b6bc72b0e37_64877035 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
        <li class="list-group-item fs-4"><?php echo $_smarty_tpl->tpl_vars['auto']->value->nombres;?>
 - <?php echo $_smarty_tpl->tpl_vars['auto']->value->marca;?>
</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

    <div class="text-center p-4">
        <a class="btn btn-primary" href="home">Volver</a>
    </div>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:app/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
