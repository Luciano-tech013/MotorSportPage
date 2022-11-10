<?php
/* Smarty version 4.2.1, created on 2022-11-08 16:55:59
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_636a7c0f0f0150_81788669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efe615595830248eda6d4d2bfa4da8256bdbd28e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\alert.tpl',
      1 => 1667922956,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636a7c0f0f0150_81788669 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<div class="small-box text-center mt-5 p-5 alert alert-danger">
    <h1 class="fs-2">ALERTA!!</h1>
    <div class="fs-4">
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
    <a href="volver" class="btn btn-primary mt-5">VOLVER</a>
</div><?php }
}
