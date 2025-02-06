<?php
/* Smarty version 4.2.1, created on 2025-02-05 18:29:56
  from '/var/www/html/app/templates/tablaAutos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_67a3ae24f0d816_24825271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3093e0036a8e79818b50b02a0e1364c05e9d54d' => 
    array (
      0 => '/var/www/html/app/templates/tablaAutos.tpl',
      1 => 1738694463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/header.tpl' => 1,
    'file:app/templates/intro.tpl' => 1,
    'file:app/templates/form_autos.tpl' => 1,
  ),
),false)) {
function content_67a3ae24f0d816_24825271 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:app/templates/intro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section>
<h1 class="text-center shadow-sm p-3 mb-4 bg-body rounded">Lista de Autos</h1>
<?php if (!(isset($_SESSION['IS_LOGGED']))) {?>
    <p class="p-5 fs-5">Aqui mostraremos informacion sobre algunos ejemplos de autos que pertenecen a algunas de estas categorias. En cada auto vamos a mostrar: Su nombre correspondiente (u apodos), breve descripcion del modelo, el nombre del modelo y la marca del fabricante y proveedor</p>
<?php }?>
<table class="table text-center table-striped">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombres</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Detalle</th>
            <?php if ((isset($_SESSION['IS_LOGGED']))) {?>
                <th>BORRAR</th>
                <th>EDITAR</th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autos']->value, 'auto');
$_smarty_tpl->tpl_vars['auto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['auto']->value) {
$_smarty_tpl->tpl_vars['auto']->do_else = false;
?>
        <tr class="fs-5">
            <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->nombres;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->marca;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->nombre;?>
</td>
            <td><a class="btn btn-primary" href="autos/detalle/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id;?>
">Detalle</a></td>
            <?php if ((isset($_SESSION['IS_LOGGED']))) {?>
                <td><a class="btn btn-badge text-bg-danger" href="autos/eliminar/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id;?>
">BORRAR</a></td>
                <td><a class="btn btn-badge text-bg-warning" href="autos/edit/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id;?>
">EDITAR</a></td>
            <?php }?>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
</section>

<?php if ((isset($_SESSION['IS_LOGGED']))) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:app/templates/form_autos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>


<?php }
}
