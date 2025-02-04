<?php
/* Smarty version 4.2.1, created on 2024-12-19 17:52:42
  from 'F:\software development\xampp\htdocs\motorsportpage\app\templates\intro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_67644f5ad5ca83_42197297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e5d5025f49abc617f444442739f5fb8c499b0d9' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\templates\\intro.tpl',
      1 => 1734626814,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67644f5ad5ca83_42197297 (Smarty_Internal_Template $_smarty_tpl) {
?><section>
<h1 class="text-center shadow p-3 mb-5 bg-body rounded">BIENVENIDO A</h1>
    <div class="text-center mb-5">
        <img width="300" class="img-fluid" src="assets/img/logo_page.jpg"></h1>
    </div>
    <?php if (!(isset($_SESSION['IS_LOGGED']))) {?>
        <p class="text-center p-5 fs-5">Somos una pagina dedicada al mundo del automotor deportivo, y nos gusta aprender cada dia nuevos modelos de autos, el reglamento deportivo de la categoria a la que pertenecen y estudiar su comportamiento. Por eso brindamos esta herramienta para que te mostremos lo que sabemos hasta el dia de hoy, y podamos compartir esta pasion juntos. 
        Debido a lo amplio que es este mundo, seleccionamos solo algunas categorias para mostrarte (BlancPain Series, Formula 1, WEC, NASCAR), con un aplio panorama de autos e informacion que podria interesarte.
        Ademas, esta herramienta cuenta con la opcion de poder 
        <a href="cuenta" class="btn btn-primary">Registrarte</a> con una cuenta en el sistema, y asi poder usarla para interes propio. Nuestro objetivo es que la herramienta pueda intuirte en tu aprendizaje. Para eso brindamos dos tablas: Una para la informacion del auto, y otra para la informacion de la categoria. En esta tabla podras agregar, eliminar y editar filas. Si no te interesa este servicio, solo puedes ver nuestras tablas que nosotros preparamos y usamos dia a dia. Por ejemplo:</p>
    <?php }?>
</section><?php }
}
