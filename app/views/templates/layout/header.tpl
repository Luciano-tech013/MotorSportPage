<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/public/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/sections.car.css">
    <link rel="stylesheet" href="/public/css/contact.css">
    <link rel="stylesheet" href="/public/css/privacity.policy.css">
    <title>MotorSportPage</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <img width="98" class="navbar-brand" src="/public/assets/logo_page.jpg" alt="Logo de la Pagina">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active fs-4" aria-current="page" href="">Home</a></li>
                        <li><a class="nav-link fs-4" href="politicies">Politica & Privacidad</a></li>
                        <li><a class="nav-link fs-4" href="contact">Contacto</a></li>
                        {if isset($smarty.session.USER_ID)}
                            <li><a class="nav-link fs-4" href="account/logout">Logout</a></li>
                        {else}
                            <li><a class="nav-link fs-4" href="account/validate">Login</a></li>
                        {/if}
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>