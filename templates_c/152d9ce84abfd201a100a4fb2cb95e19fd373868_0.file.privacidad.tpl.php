<?php
/* Smarty version 4.2.1, created on 2025-02-06 17:09:29
  from '/var/www/html/app/templates/privacidad.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_67a4ecc9c80b25_59051784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '152d9ce84abfd201a100a4fb2cb95e19fd373868' => 
    array (
      0 => '/var/www/html/app/templates/privacidad.tpl',
      1 => 1738694463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/header.tpl' => 1,
    'file:app/templates/footer.tpl' => 1,
  ),
),false)) {
function content_67a4ecc9c80b25_59051784 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section>
<h1 class="text-center shadow p-3 mb-5 bg-body rounded"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
    <p class="text-center fs-5">Recogemos información para proporcionar los mejores servicios a todos nuestros usuarios: desde determinar
    información básica, como el idioma que hablas, hasta datos más complejos, como los anuncios que te resultarán
    más útiles, las personas que más te interesan online o los vídeos de YouTube que te pueden gustar. El tipo de
    información que recoge Google y cómo se utiliza esa información depende del uso que hagas de nuestros servicios
    y de cómo administres los controles de privacidad.
    Si no has iniciado sesión en una cuenta de Google, almacenamos la información que recogemos con identificadores
    únicos vinculados al navegador, la aplicación o el dispositivo que utilices. Esto nos permite, por ejemplo,
    mantener tus preferencias en todas las sesiones de navegación, como tu idioma preferido o si quieres que te
    mostremos resultados de búsqueda o anuncios más relevantes basados en tu actividad.
    Si has iniciado sesión, también recogemos información que almacenamos en tu cuenta de Google y que tratamos como
    información personal.</p>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:app/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
