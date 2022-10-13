<?php
/* Smarty version 4.2.1, created on 2022-10-12 20:48:35
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\form_categorias.edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63470c037fb2e6_45952409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '472f3401726f1adc863016b0dfe8bf04b1f8f236' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\form_categorias.edit.tpl',
      1 => 1665600511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
  ),
),false)) {
function content_63470c037fb2e6_45952409 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Editar</h1>
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
