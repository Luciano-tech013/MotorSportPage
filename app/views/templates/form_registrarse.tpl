{include file='header.tpl'}

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Registrarse</h1>
<div class="container">
    <div class="p-4 bg-dark mt-3">
        <form class="g-3 mt-2" method="POST" action="registrarse">
            <div class="mb-4">
                <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                <input type="text" class="form-control" name="nombre" placeholder="Tu Nombre:" id="nombre">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white fs-4">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña:"
                    id="password">
            </div>
            <div class="mb-4">
                <label for="condiciones" class="form-label text-white fs-4">Aceptar Politica & Privacidad</label>
                <input type="checkbox" name="condiciones" id="condiciones"> 
            </div>

            <button class="btn btn-primary">REGISTRARSE</button>
            <a class="btn btn-badge text-bg-success" href="">VOLVER</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</div>