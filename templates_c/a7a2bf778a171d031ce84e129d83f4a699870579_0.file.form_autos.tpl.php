<?php
/* Smarty version 4.2.1, created on 2022-10-12 20:15:30
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\form_autos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6347044219ffe2_53090911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7a2bf778a171d031ce84e129d83f4a699870579' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\form_autos.tpl',
      1 => 1665598509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6347044219ffe2_53090911 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Formulario para Autos</h1>
<div class="container">
    <div class="p-4 bg-light mt-3">
        <form class="g-3 mt-2" method="POST" action="addItems">
            <div class="mb-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre:">
            </div>
            <div class="mb-4">
               <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion:"></textarea>
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="modelo" placeholder="Modelo:">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="marca" placeholder="Marca:">
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
"></option>
                    <option><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <button class="btn btn-badge text-bg-success">ENVIAR</button>
        </form>
    </div>
</div>
</section>
    


















<?php }
}
