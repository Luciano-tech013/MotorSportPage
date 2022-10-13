<?php
/* Smarty version 4.2.1, created on 2022-10-12 20:29:50
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\tablaCategorias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6347079e1b82c7_16887542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfd29fcb7df8b505db473606adeb8efd654cb264' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\tablaCategorias.tpl',
      1 => 1665599048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6347079e1b82c7_16887542 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
<h1 class="text-center shadow-sm p-3 mb-0 mt-5 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo_categorias']->value;?>
</h1>
<?php if (!(isset($_SESSION['ID_USUARIO']))) {?>
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
            
                <th>BORRAR</th>
           
            
                <th>EDITAR</th>
            
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
                
                <td><a class="btn btn-badge text-bg-danger" href="deleteCategorias/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_categorias;?>
">BORRAR</a></td>
                
                
                <td><a class="btn btn-badge text-bg-warning" href="showFormCat/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_categorias;?>
">EDITAR</a></td>
                
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
</section><?php }
}
