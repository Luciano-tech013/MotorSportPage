<?php
/* Smarty version 4.2.1, created on 2024-12-19 19:02:56
  from 'F:\software development\xampp\htdocs\motorsportpage\app\Templates\form_registrarse.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_67645fd052b6e8_58522716',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2052fa3e098dbd40839ac8394da397be82e6aad8' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\Templates\\form_registrarse.tpl',
      1 => 1734626802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/header.tpl' => 1,
  ),
),false)) {
function content_67645fd052b6e8_58522716 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:app/templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Registrarse</h1>
<div class="container">
    <div class="p-4 bg-dark mt-3">
        <form class="g-3 mt-2" method="POST" action="registrarse">
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
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
</div><?php }
}
