<?php
/* Smarty version 4.2.1, created on 2022-10-12 20:42:57
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\form_categoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63470ab1d456d4_06097603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20943910f0d59add6c208cdcc1751e2442d4d1ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\form_categoria.tpl',
      1 => 1665600171,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63470ab1d456d4_06097603 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Formulario para categorias</h1>
<div class="container">
    <div class="p-4 bg-light mt-3">
        <form class="g-3 mt-2" method="POST" action="addCategorias">
            <div class="mb-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre:">
            </div>
            <div class="mb-4">
                <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion:"></textarea>
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="tipo" placeholder="tipo:">
            </div>
            
            <button class="btn btn-badge text-bg-success">ENVIAR</button>
        </form>
    </div>
</div>
</section><?php }
}
