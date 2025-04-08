{include file="header.tpl"}
<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Editar</h1>
    <div class="container">
        <div class="p-4 bg-light mt-3">
            <form class="g-3 mt-2" method="POST" action="categorias/update/{$id}">
                <div class="mb-4">
                    <input type="text" class="form-control" name="nombre" value="{foreach from=$categorias item=$categoria}{$categoria->nombre}{/foreach}" placeholder="Nombre:">
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" value="{foreach from=$categorias item=$categoria}{$categoria->descripcion}{/foreach}" name="descripcion" placeholder="Descripcion:"></input>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="tipo" value="{foreach from=$categorias item=$categoria}{$categoria->tipo}{/foreach}" placeholder="tipo:">
                </div>

                <button class="btn btn-badge text-bg-success">ENVIAR</button>
            </form>
            <a class="btn btn-primary" href="home">VOLVER</a>
        </div>
    </div>
</section>