<?php
/* Smarty version 4.2.1, created on 2022-11-23 18:40:34
  from 'C:\xampp\htdocs\motorsportpage\app\Templates\form_autos.edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_637e5b127d56f9_87857203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccf1c12a4a13c3c88c03cef42dbff7581b1814e5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\motorsportpage\\app\\Templates\\form_autos.edit.tpl',
      1 => 1667921472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
  ),
),false)) {
function content_637e5b127d56f9_87857203 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Editar</h1>
<div class="container">
    <div class="p-4 bg-light mt-3">
        <form class="g-3 mt-2" method="POST" action="updateItems/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
            <div class="mb-4">
                <input type="text" class="form-control" name="nombre" value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
echo $_smarty_tpl->tpl_vars['auto']->value->nombres;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" placeholder="Nombre:">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
echo $_smarty_tpl->tpl_vars['auto']->value->descripcion;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" name="descripcion" placeholder="Descripcion:"></input>
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="modelo" value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
echo $_smarty_tpl->tpl_vars['auto']->value->modelo;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" placeholder="Modelo:">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="marca" value="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
echo $_smarty_tpl->tpl_vars['auto']->value->marca;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>" placeholder="Marca:">
            </div>
            <div class="mb-4">
                <label for="categoria" class="form-label fs-5">CATEGORIA</label>
                <select class="form-select" name="categoria">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_categorias;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <button class="btn btn-badge text-bg-success">ENVIAR</button>
            <button class="btn btn-primary">VOLVER</button>
        </form>
    </div>
</div><?php }
}
