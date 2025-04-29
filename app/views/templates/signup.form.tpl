{include file='layout/header.tpl'}

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Registrarse</h1>
<div class="container">
    <div class="p-4 bg-dark mt-3">
        <form class="g-3 mt-2" method="POST" action="signup">
            <div class="mb-4">
                <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                <input type="text" class="form-control" name="name" placeholder="Tu Nombre:" id="name">
                {if isset($errors.username) && $errors.username}
                     <p class="text-danger">Debe ingresar un nombre de usuario correcto</p>
                {/if}
                {if isset($errors.usernameRepeat) && $errors.usernameRepeat}
                     <p class="text-danger">Ya existe un usuario con ese nombre en el sistema. Por favor, elija otro</p>
                {/if}
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white fs-4">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña:"
                    id="password">
                {if isset($errors.password) && $errors.password}
                    <p class="text-danger">Debe ingresar una contraseña correcta</p>
                {/if}
            </div>
            <div class="mb-4">
                <label for="condiciones" class="form-label text-white fs-4">Aceptar Politica & Privacidad</label>
                <input type="checkbox" name="politicies" id="politicies">
                {if isset($errors.politicies) && $errors.politicies}
                     <p class="text-danger">Debe aceptar los terminos de Politica y Privacidad</p>
                {/if}
            </div>

            <button class="btn btn-badge text-bg-success">REGISTRARSE</button>
            <a class="btn btn-primary" href="">VOLVER</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</div>