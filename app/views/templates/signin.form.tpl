{include file='layout/header.tpl'}

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Accede a tu Cuenta</h1>
<div class="container">
    <div class="p-4 bg-dark mt-3">
        <form class="g-3 mt-2" method="POST" action="login">
            <div class="mb-4">
                <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                <input type="text" class="form-control" name="username" placeholder="Tu Nombre:" id="nombre">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white fs-4">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña:" id="password">
            </div>
            {if isset($errors.incorrect) && $errors.incorrect}
                <p class="text-danger">Las credenciales ingresadas son incorrectas. Por favor, ingrese nuevamente</p>
            {/if}
            <button class="btn btn-badge text-bg-success">LOGIN</button>

            <p class="form-label text-white fs-5 mt-5">¿No tenes cuenta?. Registrate de forma gratuita en nuestro sistema clickeando en el siguiente boton <a class="btn btn-primary" href="account">REGISTRATE</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</div>
