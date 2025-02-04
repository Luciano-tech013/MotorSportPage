{include file="app/templates/header.tpl"}

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Autos que pertenecen a {foreach from=$categorias item=$categoria}{$categoria->nombre}:{/foreach}</h1>
    
    <ul class="list-group text-center">
    {foreach from=$autos item=$auto}
        <li class="list-group-item fs-4">{$auto->nombres} - {$auto->marca}</li>
    {/foreach}
    </ul>

    <div class="text-center p-4">
        <a class="btn btn-primary" href="home">Volver</a>
    </div>
</section>

{include file="app/templates/footer.tpl"}