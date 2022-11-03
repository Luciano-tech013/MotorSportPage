<?php
/* Smarty version 4.2.1, created on 2022-11-03 16:03:24
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\tablaAutos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6363d83cbfaa69_39975090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71e4f27ff2d8196ec98356cdc6b31191c7fa10d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\tablaAutos.tpl',
      1 => 1667487771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
    'file:app/Templates/intro.tpl' => 1,
    'file:app/Templates/form_autos.tpl' => 1,
  ),
),false)) {
function content_6363d83cbfaa69_39975090 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/intro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
            <td><a class="btn btn-primary" href="detalle/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id;?>
/ <?php echo $_smarty_tpl->tpl_vars['auto']->value->nombre;?>
">Detalle</a></td>
            <?php if ((isset($_SESSION['IS_LOGGED']))) {?>
                <td><a class="btn btn-badge text-bg-danger" href="deleteItems/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id;?>
">BORRAR</a></td>
                <td><a class="btn btn-badge text-bg-warning" href="editItems/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id;?>
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
    <?php $_smarty_tpl->_subTemplateRender("file:app/Templates/form_autos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>


<?php }
}
