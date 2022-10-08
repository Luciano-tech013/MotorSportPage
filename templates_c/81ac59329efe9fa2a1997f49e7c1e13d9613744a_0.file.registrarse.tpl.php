<?php
/* Smarty version 4.2.1, created on 2022-10-06 21:27:31
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\registrarse.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633f2c234fd6f3_34680360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81ac59329efe9fa2a1997f49e7c1e13d9613744a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\registrarse.tpl',
      1 => 1665072061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
  ),
),false)) {
function content_633f2c234fd6f3_34680360 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/Templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="p-4 bg-dark mt-3">
        <p class="fs-5 text-white">Lee la <a href="PoliticayPrivacidad">Politica & Privacidad</a> de nuestra pagina, antes
         de registrarte</p>
        <form class="g-3 mt-2" method="POST" action="administrador">
            <div class="mb-4">
                <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                <input type="text" class="form-control" name="nombre" placeholder="Tu Nombre:">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white fs-4">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña:">
            </div>
            <div class="mb-4">
                <div class="form-check">
                    <input type="checkbox" name="condiciones">
                    <label for="condiciones" class="form-check-label text-white">Acepto Politica & Privacidad</label>
                </div>
            </div>
            <button class="btn btn-primary"><a href="administrador">REGISTRARSE</a></button>
        </form>
    </div>
</div>

<?php }
}
