<?php
/* Smarty version 4.2.1, created on 2022-11-14 15:31:21
  from 'C:\xampp\htdocs\motorsportpage\app\Templates\alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63725139d33889_25005148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bae6c62e758130bf2e4aa99e5446425d91d513ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\motorsportpage\\app\\Templates\\alert.tpl',
      1 => 1668436274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/footer.tpl' => 1,
  ),
),false)) {
function content_63725139d33889_25005148 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="small-box text-center p-5 alert alert-danger">
        <h1 class="fs-2">ALERTA!!</h1>
        <div class="fs-4">
            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        </div>
        <a href="volver" class="btn btn-primary mt-5">VOLVER</a>
    </div>
    <div>
        <p class="ml-4 p-5 fs-4">Si se muestra el error "¡Alerta!" u otro código de error, significa que usted debe eliminar primero los autos que contengan dicha categoria.
        Si aparece un error de eliminar categoria, siga los pasos que aparecen a continuacion: </p>
        <div class="m-5 mt-0">
            <h1 class="fs-3">1.Pruebe eliminando los autos</h1>
            <ul class="fs-5">
                <li>Vaya a la Tabla Autos</li>
                <li>Fijese que categoria tienen en la columna "Categorias"</li>
                <li>Eliminela</li>
                <li>Pruebe de eliminar de nuevo dicha categoria</li>
            </ul>
        </div>
        <p class="ml-4 p-5 fs-4"> También es posible que sea error de la página o problemas de conexion.
        Si aparece un error de carga de la página: Para solucionar el problema, sigue los pasos que aparecen a
        continuación. Para comenzar, vuelve a cargar la página. </p>
        <div class="m-5 mt-0">
            <h1 class="fs-3">2.Internet</h1>
            <ul class="fs-5">
                <li>Comprueba tu conexión a Internet</li>
                <li>Borra la caché</li>
                <li>Cierra otras pestañas o apps</li>
            </ul>
        </div>
    </div>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:app/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 

<?php }
}
