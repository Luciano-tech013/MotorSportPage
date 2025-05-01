<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/public/favicon.ico">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>-->
    <script src="/assets/js/validator.form.js"></script>
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/sections.car.css">
    <link rel="stylesheet" href="/assets/css/contact.css">
    <link rel="stylesheet" href="/assets/css/privacity.policy.css">
    <link rel="stylesheet" href="/assets/css/users.forms.css">
    <title>MotorSportPage</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <img width="98" class="navbar-brand" src="/assets/logo_page.jpg" alt="Logo de la Pagina">
                {if !isset($smarty.session.AUTH.IS_LOGGED)}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                {/if}
                {if isset($smarty.session.AUTH.IS_LOGGED)}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span ><i class="bi bi-person fs-1"></i></span>
                    </button>
                {/if}
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active fs-4" aria-current="page" href="">Home</a></li>
                        <li><a class="nav-link fs-4" href="politicies">Politica & Privacidad</a></li>
                        <li><a class="nav-link fs-4" href="contact">Contacto</a></li>
                        {if isset($smarty.session.AUTH.IS_LOGGED)}
                            <li><a class="nav-link fs-4" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal" href="#">Cerrar Sesión</a></li>
                            <li><a class="nav-link fs-4" data-bs-toggle="modal" data-bs-target="#confirmRemoveModal" href="#">Eliminar Cuenta</a></li>
                        {else}
                            <li><a class="nav-link fs-4" href="account/validate">Iniciar Sesión</a></li>
                        {/if}
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
    {include file="../modals/account.remove.modal.tpl"}
    {include file="../modals/logout.modal.tpl"}