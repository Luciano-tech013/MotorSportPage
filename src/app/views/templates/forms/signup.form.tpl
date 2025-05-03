{include file='layout/header.tpl'}

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Registrarse</h1>
    <div class="container">
        <div class="p-4 bg-dark mt-3 h-75" id="signupForm">
            <form class="g-3 mt-2" method="POST" id="signup_form" action="signup">
                <div class="mb-4">
                    <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Tu Nombre:" id="name" required>
                    {if isset($smarty.session.ERRORS.username)}
                        <p class="text-danger">{$smarty.session.ERRORS.username}</p>
                    {/if}
                    {if isset($smarty.session.ERRORS.UNIQUE_NAME_USER)}
                        <p class="text-danger">{$smarty.session.ERRORS.UNIQUE_NAME_USER}</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <label for="password_signup" class="form-label text-white fs-4">PASSWORD</label>
                    <input type="password" class="form-control" id="password_signup" name="password" placeholder="Escribe tu contraseña:" id="password" required>
                    {if isset($smarty.session.ERRORS.password)}
                        <p class="text-danger">{$smarty.session.ERRORS.password}</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <label for="condiciones" class="form-label text-white fs-4">Aceptar Politica & Privacidad</label>
                    <input type="checkbox" name="politicies" id="politicies" required>
                    {if isset($smarty.session.ERRORS.politicies)}
                        <p class="text-danger">{$smarty.session.ERRORS.politicies}</p>
                    {/if}
                </div>

                <button class="btn btn-badge text-bg-success">REGISTRARSE</button>
                <a class="btn btn-primary" href="">VOLVER</a>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </div>
</section>