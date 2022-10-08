<?php
/* Smarty version 4.2.1, created on 2022-10-07 20:37:57
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\form_registrarse.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63407205dcf2f4_80131051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf1e8fa96228d164f34777f9445fe347543a2918' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\form_registrarse.tpl',
      1 => 1665167874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
  ),
),false)) {
function content_63407205dcf2f4_80131051 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a href="cuenta" class="btn btn-primary">REGISTRARSE</a>
        </form>
    </div>
</div>

<?php }
}
