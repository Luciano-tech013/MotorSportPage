<?php
/* Smarty version 4.2.1, created on 2025-02-06 15:54:48
  from '/var/www/html/app/templates/alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_67a4db485ae826_67660445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3920c7bb45f95069fc8b97d3bc5ca4d75b8e3a31' => 
    array (
      0 => '/var/www/html/app/templates/alert.tpl',
      1 => 1738694463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/footer.tpl' => 1,
  ),
),false)) {
function content_67a4db485ae826_67660445 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="/app/templates/css/alert.css" rel="stylesheet">
</head>
<body>
    <div class="small-box text-center p-5 alert alert-danger" id="alert">
        <h1 class="fs-2">ALERTA!!</h1>
        <div class="fs-4">
            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        </div>
        <a href="login" class="btn btn-primary mt-5">VOLVER</a>
    </div>
</body>

<?php $_smarty_tpl->_subTemplateRender("file:app/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 

<?php }
}
