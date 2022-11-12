<?php
/* Smarty version 4.2.1, created on 2022-11-12 18:55:21
  from 'C:\xampp\htdocs\motorsportpage\app\Templates\tablaCategorias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_636fde09bed026_16549991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e2239dbcee4f80bf4f68c78031b72e4a6dff1fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\motorsportpage\\app\\Templates\\tablaCategorias.tpl',
      1 => 1667921745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/form_categoria.tpl' => 1,
    'file:app/Templates/footer.tpl' => 1,
  ),
),false)) {
function content_636fde09bed026_16549991 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
<h1 class="text-center shadow-sm p-3 mb-4 mt-5 bg-body rounded">Categorias a las que pertenecen</h1>
<?php if (!(isset($_SESSION['ID_LOGGED']))) {?>
    <p class="p-5 fs-5">En esta tabla mostraremos los autos descriptos en la tabla anterior y la categoria competitiva a la
        que pertenecen.Mostraremos el nombre de la categoria, una detallada descripcion de su organizacion y obejtivo, y en
        que parte del mundo rige</p>
<?php }?>
<table class="table text-center table-striped mb-4">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Filtrar</th>
            <th>Descripcion</th>
            <?php if ((isset($_SESSION['IS_LOGGED']))) {?>
                <th>BORRAR</th>
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
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
">Filtrar</a>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->descripcion;?>
</td>
                <?php if ((isset($_SESSION['IS_LOGGED']))) {?>
                    <td><a class="btn btn-badge text-bg-danger" href="deleteCategorias/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_categorias;?>
">BORRAR</a></td>
                     <td><a class="btn btn-badge text-bg-warning" href="editCat/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_categorias;?>
">EDITAR</a>
                    </td>
                <?php }?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
</section>

<?php if ((isset($_SESSION['IS_LOGGED']))) {?>
    <?php $_smarty_tpl->_subTemplateRender("file:app/Templates/form_categoria.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

<?php $_smarty_tpl->_subTemplateRender("file:app/Templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
