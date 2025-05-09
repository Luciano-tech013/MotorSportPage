<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/sections.car.css">
    <link rel="stylesheet" href="/assets/css/contact.css">
    <link rel="stylesheet" href="/assets/css/privacity.policy.css">
    <link rel="stylesheet" href="/assets/css/users.forms.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="/assets/js/validator.form.js"></script>
    <title>MotorSportPage</title>
</head>
<body>
<header>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <img width="98" class="navbar-brand" src="/assets/logo_page.jpg" alt="Logo de la Pagina">

        {if isset($smarty.session.AUTH.IS_LOGGED)}
            {if isset($smarty.session.AUTH.NAME)}
                <div class="d-flex align-items-center gap-4">
                    <p class="mb-0 text-white fs-5">¡Hola {$smarty.session.AUTH.NAME}, bienvenido!</p>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="bi bi-person fs-1"></i></span>
                    </button>
                </div>
            {/if}
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li><a class="nav-link active fs-4" href="">Home</a></li>
                    <li><a class="nav-link fs-4" href="politicies">Política & Privacidad</a></li>
                    <li><a class="nav-link fs-4" href="contact">Contacto</a></li>
                    <li><a class="nav-link fs-4" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal" href="#">Cerrar Sesión</a></li>
                    <li><a class="nav-link fs-4" data-bs-toggle="modal" data-bs-target="#infoAccountRemoveModal" href="#" id="removeAccountBtn">Eliminar Cuenta</a></li>
                </ul>
            </div>
                {else}
                    <div class="d-flex ms-3">
                        <ul class="navbar-nav d-flex flex-row gap-5 align-items-center">
                            <li><a class="nav-link custom-nav-link fs-5" href="">HOME</a></li>
                            <li><a class="nav-link custom-nav-link fs-5" href="politicies">POLÍTICA & PRIVACIDAD</a></li>
                            <li><a class="nav-link custom-nav-link fs-5" href="contact">CONTACTO</a></li>
                            <li><a class="nav-link custom-nav-link fs-5" href="account/validate">INICIAR SESIÓN</a></li>
                        </ul>
                    </div>
                {/if}
            </div>
        </nav>
    </header>

    <main>
    {include file="../modals/account.remove.modal.tpl"}
    {include file="../modals/logout.modal.tpl"}