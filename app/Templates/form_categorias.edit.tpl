{include file="app/Templates/header.tpl"}
<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Editar</h1>
    <div class="container">
        <div class="p-4 bg-light mt-3">
            <form class="g-3 mt-2" method="POST" action="addCategorias">
                <div class="mb-4">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre:">
                </div>
                <div class="mb-4">
                    <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion:"></textarea>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="tipo" placeholder="tipo:">
                </div>

                <button class="btn btn-badge text-bg-success">ENVIAR</button>
            </form>
        </div>
    </div>
</section>