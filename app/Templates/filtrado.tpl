{include file="app/Templates/header.tpl"}

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Autos que pertenecen a {foreach from=$categorias item=$categoria}{$categoria->nombre}:{/foreach}</h1>
    
    <ul class="list-group text-center">
    {foreach from=$autos item=$auto}
        <li class="list-group-item fs-4">{$auto->nombre}</li>
    {/foreach}
    </ul>
    
</section>

{include file="app/Templates/footer.tpl"}