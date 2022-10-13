{include file="app/Templates/header.tpl"}

<div class="container">
    <div class="p-4 bg-dark mt-3">
        <p class="fs-5 text-white">Lee la <a href="PoliticayPrivacidad">Politica & Privacidad</a> de nuestra pagina, antes
         de registrarte</p>
        <form class="g-3 mt-2" method="POST" action="cuenta">
            <div class="mb-4">
                <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
                <input type="text" class="form-control" name="nombre" placeholder="Tu Nombre:">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label text-white fs-4">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña:">
            </div>
            <div class="mb-4">
                <div class="form-check">
                    <input type="checkbox" name="condiciones">
                    <label for="condiciones" class="form-check-label text-white">Acepto Politica & Privacidad</label>
                </div>
            </div>
            <button class="btn btn-primary">REGISTRARSE</button>
        </form>
    </div>
</div>

