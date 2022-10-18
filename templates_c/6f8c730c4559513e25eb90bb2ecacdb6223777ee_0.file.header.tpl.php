<?php
/* Smarty version 4.2.1, created on 2022-10-17 19:36:22
  from 'C:\xampp\htdocs\MotorSportPage\app\Templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634d9296a294b0_14285435',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f8c730c4559513e25eb90bb2ecacdb6223777ee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MotorSportPage\\app\\Templates\\header.tpl',
      1 => 1666028180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634d9296a294b0_14285435 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>MotorSport -- Page</title>
</head>
<body>
<header>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
    <img width="98" class="navbar-brand" src="assets/img/logo_page.jpg" alt="Logo de la Pagina">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active fs-4" aria-current="page" href="home">Home</a>
                <a class="nav-link fs-4" href="PoliticayPrivacidad">Politica & Privacidad</>
                <a class="nav-link fs-4" href="contacto">Contacto</a>
                <?php if ((isset($_SESSION['ID_USUARIO']))) {?>
                    <a class="nav-link fs-4" href="logout">Logout</a>
                <?php } else { ?>
                    <a class="nav-link fs-4" href="login">Login</a>
                <?php }?>
            </div>
        </div>
    </div>
</nav>
</header>



<?php }
}
