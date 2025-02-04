<?php
/* Smarty version 4.2.1, created on 2024-11-30 20:20:56
  from 'F:\software development\xampp\htdocs\motorsportpage\app\Templates\form_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_674b6598b2a4a5_14959596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '101adc6314c56f6a23ac738d62470e0cfd3ca096' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\Templates\\form_login.tpl',
      1 => 1732994451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/Templates/header.tpl' => 1,
  ),
),false)) {
function content_674b6598b2a4a5_14959596 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:app/Templates/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Accede a tu Cuenta</h1>
<div class="container">
    <div class="p-4 bg-dark mt-3">
        <form class="g-3 mt-2" method="POST" action="validar">
            <div class="mb-4">
                <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                <input type="text" class="form-control" name="nombre" placeholder="Tu Nombre:" id="nombre">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white fs-4">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña:" id="password">
            </div>

            <button class="btn btn-primary">LOGIN</button>
        </form>
    </div>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
</div>
<?php }
}
