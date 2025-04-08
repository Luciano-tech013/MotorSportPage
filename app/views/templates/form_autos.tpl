<section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Formulario para Autos</h1>
<div class="container">
    <div class="p-4 bg-light mt-3">
        <form class="g-3 mt-2" method="POST" action="autos/insertar">
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
                {if !isset($categorias) || $categorias|@count == 0}
                    <p class="text-danger">Primero debes agregar una categoría para poder agregar un auto</p>
                {else}
                    <select class="form-select" name="categoria">
                        <option value="" disabled selected>Seleccione una categoría</option>
                            {foreach from=$categorias item=$categoria}
                                <option value="{$categoria->id_categorias}">{$categoria->nombre}</option>
                            {/foreach}
                    </select>
                {/if}
            </div>
            {if !empty($categorias)}
                <button class="btn btn-badge text-bg-success">ENVIAR</button>
            {/if}
        </form>
    </div>
</div>
</section>
    


















