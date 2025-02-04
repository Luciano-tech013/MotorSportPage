<?php
/* Smarty version 4.2.1, created on 2024-12-19 19:18:03
  from 'F:\software development\xampp\htdocs\motorsportpage\app\Templates\alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6764635be474d6_08365246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea12cfb32101c8339d6e76153d6e9f4aa17f3b22' => 
    array (
      0 => 'F:\\software development\\xampp\\htdocs\\motorsportpage\\app\\Templates\\alert.tpl',
      1 => 1734632270,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/footer.tpl' => 1,
  ),
),false)) {
function content_6764635be474d6_08365246 (Smarty_Internal_Template $_smarty_tpl) {
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
