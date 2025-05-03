<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="/assets/css/footer.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="small-box text-center p-5 h-100 mb-0 alert alert-danger">
            <h1 class="fs-2">{if isset($error)}{$error}{/if}</h1>
            <p class="fs-4">Vuelve a intentar mas tarde por favor</p>
        </div>
    </main>
</body>

{include file="layout/footer.tpl"}


