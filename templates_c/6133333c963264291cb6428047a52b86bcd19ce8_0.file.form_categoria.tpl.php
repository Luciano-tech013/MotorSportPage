<?php
/* Smarty version 4.2.1, created on 2024-11-30 18:54:13
  from 'F:\software development\xampp\htdocs\motorsportpage\app\templates\form_categoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_674b5145e66467_99390406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6133333c963264291cb6428047a52b86bcd19ce8' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\templates\\form_categoria.tpl',
      1 => 1732989032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_674b5145e66467_99390406 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Formulario para categorias</h1>
<div class="container">
    <div class="p-4 bg-light mt-3">
        <form class="g-3 mt-2" method="POST" action="categorias/insertar">
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
