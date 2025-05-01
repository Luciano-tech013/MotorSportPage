{include file="layout/header.tpl"}

{include file="init.tpl"}

<section>
    <h1 class="text-center shadow-sm p-3 mb-4 bg-body rounded">Lista de Autos</h1>
    {if !isset($smarty.session.AUTH.IS_LOGGED)}
        <p class="p-5 fs-5">Aqui mostraremos informacion sobre algunos ejemplos de autos que pertenecen a algunas de estas
            categorias. En cada auto vamos a mostrar: Su nombre correspondiente (u apodos), breve descripcion del modelo, el
            nombre del modelo y la marca del fabricante y proveedor</p>
    {/if}
    <table class="table text-center table-striped">
        <thead class="bg-dark text-white">
            <tr>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Detalle</th>
                {if isset($smarty.session.AUTH.IS_LOGGED)}
                    <th>BORRAR</th>
                    <th>EDITAR</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$cars item=$car}
                <tr class="fs-5">
                    <td>{$car->name}</td>
                    <td>{$car->model}</td>
                    <td>{$car->brand}</td>
                    <td>{$car->category_name}</td>
                    <td><a class="btn btn-primary" href="car/detail/{$car->car_id}">Detalle</a></td>
                    {if isset($smarty.session.AUTH.IS_LOGGED)}
                        <td><a class="btn btn-badge text-bg-danger" href="remove/car/{$car->car_id}">BORRAR</a></td>
                        <td><a class="btn btn-badge text-bg-warning" href="edit/car/{$car->car_id}">EDITAR</a></td>
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<!--Pongo el valor en null porque no quiero que car.form cuando sea 
incluido desde aca utilize la variable $car, ya que aca se incluye 
para agregar no para editar. Entonces, en vez de asignarsela desde la vista
se la asigno desde acá con valor null. Por eso en car.form.tpl se valida que no se null
para mostrar los datos en el formulario. Lo mismo con $optionsCategory-->
{if isset($smarty.session.AUTH.IS_LOGGED)}
    {include file="forms/car.form.tpl" is_embedded=true current_year=date('Y') car=null categories=$categories action="save/car"}
{/if}

<section>
    <h1 class="text-center shadow-sm p-3 mb-4 mt-5 bg-body rounded">Categorias a las que pertenecen</h1>
    {if !isset($smarty.session.AUTH.IS_LOGGED)}
        <p class="p-5 fs-5">En esta tabla mostraremos los autos descriptos en la tabla anterior y la categoria competitiva a
            la
            que pertenecen.Mostraremos el nombre de la categoria, una detallada descripcion de su organizacion y objetivo, y
            en
            que parte del mundo rige</p>
    {/if}
    <table class="table text-center table-striped mb-4">
        <thead class="bg-dark text-white">
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Filtrar</th>
                <th>Detalle</th>
                {if isset($smarty.session.AUTH.IS_LOGGED)}
                    <th>BORRAR</th>
                    <th>EDITAR</th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$categories item=$category}
                <tr class="fs-5">
                    <td>{$category->name}</td>
                    <td>{$category->type}</td>
                    <td><a class="btn btn-primary" href="category/cars/{$category->category_id}">Filtrar</a></td>
                    <td><a class="btn btn-primary" href="category/detail/{$category->category_id}">Detalle</a></td>
                    {if isset($smarty.session.AUTH.IS_LOGGED)}
                        {if isset($smarty.session.ERRORS.INVALID_DELETABLE)}
                            <td><a class="btn btn-badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#infoCategoryRemoveModal" href="#">BORRAR</a></td>
                        {else}
                            <td><a class="btn btn-badge text-bg-danger" href="remove/category/{$category->category_id}">BORRAR</a></td>
                        {/if}
                        <td><a class="btn btn-badge text-bg-warning" href="edit/category/{$category->category_id}">EDITAR</a></td>
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<!--Pongo el valor en null porque no quiero que category.form cuando sea 
incluido desde aca utilize la variable $categories, ya que aca se incluye 
para agregar no para editar-->
{if isset($smarty.session.AUTH.IS_LOGGED)}
    {include file="forms/category.form.tpl" is_embedded=true category=null action="save/category"}
{/if}

{include file="modals/category.remove.modal.tpl"}

{include file="layout/footer.tpl"}