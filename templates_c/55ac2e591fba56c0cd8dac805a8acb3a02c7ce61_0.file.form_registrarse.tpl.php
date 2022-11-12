<?php
/* Smarty version 4.2.1, created on 2022-11-12 18:55:48
  from 'C:\xampp\htdocs\motorsportpage\app\Templates\form_registrarse.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_636fde240ca115_26243757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55ac2e591fba56c0cd8dac805a8acb3a02c7ce61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\motorsportpage\\app\\Templates\\form_registrarse.tpl',
      1 => 1667761777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
  ),
),false)) {
function content_636fde240ca115_26243757 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:app/Templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Registrarse</h1>
<div class="container">
    <div class="p-4 bg-dark mt-3">
        <form class="g-3 mt-2" method="POST" action="cuenta">
            <div class="mb-4">
                <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                <input type="text" class="form-control" name="nombre" placeholder="Tu Nombre:" id="nombre">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white fs-4">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña:"
                    id="password">
            </div>
            <div class="mb-4">
                <label for="condiciones" class="form-label text-white fs-4">Aceptar Politica & Privacidad</label>
                <input type="checkbox" name="condiciones" id="condiciones"> 
            </div>

            <button class="btn btn-primary">REGISTRARSE</button>
        </form>
    </div>
</div><?php }
}
