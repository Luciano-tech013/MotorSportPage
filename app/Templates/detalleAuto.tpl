{include file="app/Templates/header.tpl"}

<section>
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">{$titulo}</h1>
    {foreach from=$autos item=$auto}
        <p class="fs-5 pt-4 m-4">{$auto->descripcion}</p>
        <a class="btn btn-primary m-4" href='home'>Volver</a>
    {/foreach}
</section>

{include file="app/Templates/footer.tpl"}