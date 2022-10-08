<?php
/* Smarty version 4.2.1, created on 2022-10-08 22:52:30
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\tabla.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6341e30ef1cdc3_56789962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '039ce5bc43e132e179e5695da53cf931063e8c26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\tabla.tpl',
      1 => 1665262348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
    'file:app/Templates/intro.tpl' => 1,
    'file:app/Templates/form_autos.tpl' => 1,
    'file:app/Templates/footer.tpl' => 1,
  ),
),false)) {
function content_6341e30ef1cdc3_56789962 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!(isset($_SESSION['ID_USUARIO']))) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:app/Templates/intro.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender("file:app/Templates/form_autos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>
<section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo_autos']->value;?>
</h1>
<?php if (!(isset($_SESSION['ID_USUARIO']))) {?>
<p class="p-5 fs-5">Aqui mostraremos informacion sobre algunos ejemplos de autos que pertenecen a algunas de estas categorias. En cada auto vamos a mostrar: Su nombre correspondiente (u apodos), breve descripcion del modelo, el nombre del modelo y la marca del fabricante y proveedor</p>
<?php }?>
<table class="table text-center table-striped">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombre</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Detalle</th>
            <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                <th>BORRAR</th>
            <?php }?>
            <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autosCategoria']->value, 'autoCategoria');
$_smarty_tpl->tpl_vars['autoCategoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['autoCategoria']->value) {
$_smarty_tpl->tpl_vars['autoCategoria']->do_else = false;
?>
            <tr class="fs-5">
                <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->nombre;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->modelo;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['auto']->value->marca;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['autoCategoria']->value->nombre;?>
</td>
                <td><a class="btn btn-primary" href="detalle/<?php echo $_smarty_tpl->tpl_vars['auto']->value->id;?>
/ <?php echo $_smarty_tpl->tpl_vars['auto']->value->nombre;?>
">Detalle</a></td>
                <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                    <td><a href="">BORRAR</a></td>
                <?php }?>
                <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                    <td><a href="">EDITAR</a></td>
                <?php }?>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<h1 class="text-center shadow-sm p-3 mb-0 mt-5 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo_categorias']->value;?>
</h1>
<?php if (!(isset($_SESSION['ID_USUARIO']))) {?>
<p class="p-5 fs-5">En esta tabla mostraremos los autos descriptos en la tabla anterior y la categoria competitiva a la que pertenecen.Mostraremos el nombre de la categoria, una detallada descripcion de su organizacion y obejtivo, y en que parte del mundo rige</p>
<?php }?>
<table class="table text-center table-striped mb-4">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Filtrar</th>
            <th>Descripcion</th>
            <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                <th>BORRAR</th>
            <?php }?>
            <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                <th>EDITAR</th>
            <?php }?>
        </tr>
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
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo;?>
</td>
            <td><a class="btn btn-primary" href="filtrar/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_categorias;?>
">Filtrar</a></td>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->descripcion;?>
</td>
            <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                <td><a href="">BORRAR</a></td>
            <?php }?>
            <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                <td><a href="">EDITAR</a></td>
            <?php }?>
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
