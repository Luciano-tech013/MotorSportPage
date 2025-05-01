{include file="layout/header.tpl"}

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Autos que pertenecen a {foreach from=$categories item=$category}{$category->name}:{/foreach}</h1>
    <ul class="list-group text-center">
        {foreach from=$cars item=$car}
            <li class="list-group-item fs-4">{$car->name} - {$car->brand}</li>
        {/foreach}
    </ul>
    <div class="text-center p-4">
        <a class="btn btn-primary" href="">Volver</a>
    </div>
</section>

{include file="layout/footer.tpl"}