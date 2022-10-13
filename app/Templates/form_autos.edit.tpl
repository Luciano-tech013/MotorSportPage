{include file="app/Templates/header.tpl"}

<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Editar</h1>
<div class="container">
    <div class="p-4 bg-light mt-3">
            <form class="g-3 mt-2" method="POST" action="updateItems/{$id}">
            <div class="mb-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre:">
            </div>
            <div class="mb-4">
                <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion:"></textarea>
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="modelo" placeholder="Modelo:">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="marca" placeholder="Marca:">
            </div>
            <div class="mb-4">
                <label for="categoria" class="form-label fs-5">CATEGORIA</label>
                <select class="form-select" name="categoria">
                    {foreach from=$categorias item=$categoria}
                        <option value="{$categoria->id_categorias}"></option>
                        <option>{$categoria->nombre}</option>
                    {/foreach}
                </select>
            </div>

            <button class="btn btn-badge text-bg-success">ENVIAR</button>
        </form>
    </div>
</div>