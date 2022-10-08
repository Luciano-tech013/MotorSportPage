{include file="app/Templates/header.tpl"}

{if !isset($smarty.session.ID_USUARIO)}
    {include file="app/Templates/intro.tpl"}
{else}
    {include file="app/Templates/form_autos.tpl"}
{/if}
<section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">{$titulo_autos}</h1>
{if !isset($smarty.session.ID_USUARIO)}
<p class="p-5 fs-5">Aqui mostraremos informacion sobre algunos ejemplos de autos que pertenecen a algunas de estas categorias. En cada auto vamos a mostrar: Su nombre correspondiente (u apodos), breve descripcion del modelo, el nombre del modelo y la marca del fabricante y proveedor</p>
{/if}
<table class="table text-center table-striped">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombre</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Detalle</th>
            {if isset($smarty.session.ID_USUARIO)}
                <th>BORRAR</th>
            {/if}
            {if isset($smarty.session.ID_USUARIO)}
                <th>EDITAR</th>
            {/if}
        </tr>
    </thead>
    <tbody>
    {foreach from=$autos item=$auto}
        {foreach from=$autosCategoria item=$autoCategoria}
            <tr class="fs-5">
                <td>{$auto->nombre}</td>
                <td>{$auto->modelo}</td>
                <td>{$auto->marca}</td>
                <td>{$autoCategoria->nombre}</td>
                <td><a class="btn btn-primary" href="detalle/{$auto->id}/ {$auto->nombre}">Detalle</a></td>
                {if isset($smarty.session.ID_USUARIO)}
                    <td><a href="">BORRAR</a></td>
                {/if}
                {if isset($smarty.session.ID_USUARIO)}
                    <td><a href="">EDITAR</a></td>
                {/if}
            </tr>
            {/foreach}  
        {/foreach}
    </tbody>
</table>

<h1 class="text-center shadow-sm p-3 mb-0 mt-5 bg-body rounded">{$titulo_categorias}</h1>
{if !isset($smarty.session.ID_USUARIO)}
<p class="p-5 fs-5">En esta tabla mostraremos los autos descriptos en la tabla anterior y la categoria competitiva a la que pertenecen.Mostraremos el nombre de la categoria, una detallada descripcion de su organizacion y obejtivo, y en que parte del mundo rige</p>
{/if}
<table class="table text-center table-striped mb-4">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Filtrar</th>
            <th>Descripcion</th>
            {if isset($smarty.session.ID_USUARIO)}
                <th>BORRAR</th>
            {/if}
            {if isset($smarty.session.ID_USUARIO)}
                <th>EDITAR</th>
            {/if}
        </tr>
    </thead>
    <tbody>
    {foreach from=$categorias item=$categoria}
        <tr class="fs-5">
            <td>{$categoria->nombre}</td>
            <td>{$categoria->tipo}</td>
            <td><a class="btn btn-primary" href="filtrar/{$categoria->id_categorias}">Filtrar</a></td>
            <td>{$categoria->descripcion}</td>
            {if isset($smarty.session.ID_USUARIO)}
                <td><a href="">BORRAR</a></td>
            {/if}
            {if isset($smarty.session.ID_USUARIO)}
                <td><a href="">EDITAR</a></td>
            {/if}
        </tr>
    {/foreach}
    </tbody>
</table>
</section>

{include file="app/Templates/footer.tpl"}

