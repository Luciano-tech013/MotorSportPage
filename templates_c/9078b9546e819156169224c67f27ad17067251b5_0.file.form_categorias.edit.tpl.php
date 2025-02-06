<?php
/* Smarty version 4.2.1, created on 2025-02-06 16:07:51
  from '/var/www/html/app/templates/form_categorias.edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_67a4de57b0fb68_92471127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9078b9546e819156169224c67f27ad17067251b5' => 
    array (
      0 => '/var/www/html/app/templates/form_categorias.edit.tpl',
      1 => 1738858070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/header.tpl' => 1,
  ),
),false)) {
function content_67a4de57b0fb68_92471127 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Editar</h1>
    <div class="container">
        <div class="p-4 bg-light mt-3">
            <form class="g-3 mt-2" method="POST" action="categorias/update/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                <div class="mb-4">
                    <input type="text" class="form-control" name="nombre" value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" placeholder="Nombre:">
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
echo $_smarty_tpl->tpl_vars['categoria']->value->descripcion;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" name="descripcion" placeholder="Descripcion:"></input>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="tipo" value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
echo $_smarty_tpl->tpl_vars['categoria']->value->tipo;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" placeholder="tipo:">
                </div>

                <button class="btn btn-badge text-bg-success">ENVIAR</button>
            </form>
            <a class="btn btn-primary" href="home">VOLVER</a>
        </div>
    </div>
</section><?php }
}
