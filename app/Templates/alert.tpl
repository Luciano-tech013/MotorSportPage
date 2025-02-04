<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="/app/templates/css/alert.css" rel="stylesheet">
</head>
<body>
    <div class="small-box text-center p-5 alert alert-danger" id="alert">
        <h1 class="fs-2">ALERTA!!</h1>
        <div class="fs-4">
            {$error}
        </div>
        <a href="login" class="btn btn-primary mt-5">VOLVER</a>
    </div>
</body>

{include file="app/templates/footer.tpl"} 

