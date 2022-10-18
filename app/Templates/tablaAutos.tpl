{include file="app/Templates/header.tpl"}

{include file="app/Templates/intro.tpl"}

<section>
<h1 class="text-center shadow-sm p-3 mb-4 bg-body rounded">{$titulo}</h1>
{if !isset($smarty.session.IS_LOGGED)}
    <p class="p-5 fs-5">Aqui mostraremos informacion sobre algunos ejemplos de autos que pertenecen a algunas de estas categorias. En cada auto vamos a mostrar: Su nombre correspondiente (u apodos), breve descripcion del modelo, el nombre del modelo y la marca del fabricante y proveedor</p>
{/if}
<table class="table text-center table-striped">
    <thead class="bg-dark text-white">
        <tr>
            <th>Nombres</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Detalle</th>
            {if isset($smarty.session.IS_LOGGED)}
            <th>BORRAR</th>
            <th>EDITAR</th>
            {/if}
        </tr>
    </thead>
    <tbody>
    {foreach from=$autos item=$auto}
        <tr class="fs-5">
            <td>{$auto->nombres}</td>
            <td>{$auto->modelo}</td>
            <td>{$auto->marca}</td>
            <td>{$auto->nombre}</td>
            <td><a class="btn btn-primary" href="detalle/{$auto->id}/ {$auto->nombre}">Detalle</a></td>
            {if isset($smarty.session.IS_LOGGED)}
                <td><a class="btn btn-badge text-bg-danger" href="deleteItems/{$auto->id}">BORRAR</a></td>
                <td><a class="btn btn-badge text-bg-warning" href="editItems/{$auto->id}">EDITAR</a></td>
            {/if}
        </tr>
    {/foreach}
    </tbody>
</table>
</section>

{if isset($smarty.session.IS_LOGGED)}
    {include file="app/Templates/form_autos.tpl"}
{/if}


