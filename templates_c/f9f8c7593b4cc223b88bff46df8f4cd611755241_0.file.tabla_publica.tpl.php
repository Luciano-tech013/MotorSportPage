<?php
/* Smarty version 4.2.1, created on 2022-10-07 03:17:29
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\tabla_publica.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633f7e29bc4f65_04584996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9f8c7593b4cc223b88bff46df8f4cd611755241' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\tabla_publica.tpl',
      1 => 1665105444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
    'file:app/Templates/intro.tpl' => 1,
    'file:app/Templates/footer.tpl' => 1,
  ),
),false)) {
function content_633f7e29bc4f65_04584996 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/intro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo_autos']->value;?>
</h1>
<p class="p-5 fs-5">Aqui mostraremos informacion sobre algunos ejemplos de autos que pertenecen a estas dos categorias. En cada auto vamos a mostrar: Su nombre correspondiente (u apodos), breve descripcion del modelo, el nombre del modelo y la marca del fabricante y proveedor</p>
<table class="table table-striped text-center">
    <thead class="bg-dark text-white">
        <th>
            <td>Nombre</td>
            <td>Modelo</td>
            <td>Marca</td>
            <td>Categoria</td>
            <td>Detalle</td>
        </th>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
            <tr class="fs-5">
                <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->nombre;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->marca;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->id_categorias;?>
 - <?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</td>
                <td><a class="btn btn-primary" href="detalle">Detalle</a></td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo_categorias']->value;?>
</h1>
<p class="p-5 fs-5">En esta tabla mostraremos los autos descriptos en la tabla anterior y la categoria competitiva a la que pertenecen.Mostraremos el nombre de la categoria, una detallada descripcion de su organizacion y obejtivo, y en que parte del mundo rige</p>
<table class="table  table-striped">
    <thead class="bg-dark text-white">
        <th>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Tipo</td>
            <td>Filtrar</td>
        </th>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
        <tr class="fs-5">
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->descripcion;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo;?>
</td>
            <td><a class="btn btn-primary" href="filtrar">Filtrar</a></td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
