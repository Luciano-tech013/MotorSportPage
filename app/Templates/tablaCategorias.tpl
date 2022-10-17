<section>
<h1 class="text-center shadow-sm p-3 mb-4 mt-5 bg-body rounded">{$titulo}</h1>
{if !isset($smarty.session.ID_LOGGED)}
    <p class="p-5 fs-5">En esta tabla mostraremos los autos descriptos en la tabla anterior y la categoria competitiva a la
        que pertenecen.Mostraremos el nombre de la categoria, una detallada descripcion de su organizacion y obejtivo, y en
        que parte del mundo rige</p>
{/if}
<table class="table text-center table-striped mb-4">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Filtrar</th>
            <th>Descripcion</th>
            {if isset($smarty.session.IS_LOGGED)}
                <th>BORRAR</th>
                <th>EDITAR</th>
            {/if}
        </tr>
    </thead>
    <tbody>
        {foreach from=$categorias item=$categoria}
            <tr class="fs-5">
                <td>{$categoria->nombre}</td>
                <td>{$categoria->tipo}</td>
                <td><a class="btn btn-primary" href="filtrar/{$categoria->id_categorias}/{$categoria->nombre}">Filtrar</a>
                </td>
                <td>{$categoria->descripcion}</td>
                {if isset($smarty.session.IS_LOGGED)}
                    <td><a class="btn btn-badge text-bg-danger" href="deleteCategorias/{$categoria->id_categorias}">BORRAR</a></td>
                     <td><a class="btn btn-badge text-bg-warning" href="editCat/{$categoria->id_categorias}">EDITAR</a>
                    </td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>
</section>

{if isset($smarty.session.IS_LOGGED)}
    {include file="app/Templates/form_categoria.tpl"}
{/if}

{include file="app/Templates/footer.tpl"}