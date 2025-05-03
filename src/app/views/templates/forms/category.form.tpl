<!--Incluyo de nuevo el header para cargar los estilos si es que 
este archivo no se incluye desde cars.table.tpl, es decir, 
se llama para editar--->
{if !isset($is_embedded) || !$is_embedded}
    {include file="layout/header.tpl"}
{/if}

<section class="section__category__form">
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Formulario para categorias</h1>
    <div class="container">
        <div class="p-4 bg-light mt-3">
            <form class="row g-3 mt-2" method="POST" id="category_form" {if isset($action)} action="{$action}" {/if}>
                <div class="col-12 col-md-6">
                    <input type="text" {if !empty($category)} class="form-control is-valid" {else} class="form-control" {/if} id="category_name" name="name" {if isset($category) && !empty($category)} value="{$category->name}" {/if} placeholder="Nombre:" required>
                    {if isset($smarty.session.ERRORS.categoryName)}
                        <p class="text-danger">{$smarty.session.ERRORS.categoryName}</p>
                    {/if}
                    {if isset($smarty.session.ERRORS.UNIQUE_NAME_CATEGORY)}
                        <p class="text-danger">{$smarty.session.ERRORS.UNIQUE_NAME_CATEGORY}</p>
                    {/if}
                </div>
                <div class="col-12 col-md-6">
                    <select class="form-select" id="type" name="type" required>
                        {if isset($category) && !empty($category)}
                            <option value="{$category->type}" selected>{$category->type}</option>
                        {else}
                            <option value="" disabled selected>Seleccione un tipo</option>
                        {/if}
                        <option value="INTERNACIONAL">INTERNACIONAL</option>
                        <option value="NACIONAL">NACIONAL</option>
                        <option value="ZONAL">ZONAL</option>
                        <option value="PROVINCIAL">PROVINCIAL</option>
                        <option value="CONTINENTAL">CONTINENTAL</option>
                    </select>
                    {if isset($smarty.session.ERRORS.type)}
                        <p class="text-danger">{$smarty.session.ERRORS.type}</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <textarea type="text" {if !empty($category)} class="form-control is-valid" {else} class="form-control" {/if} id="category_description" name="description"
                        placeholder="Descripcion:"
                        required>{if isset($category) && !empty($category)}{$category->description}{/if}</textarea>
                    {if isset($smarty.session.ERRORS.categoryDescription)}
                        <p class="text-danger">{$smarty.session.ERRORS.categoryDescription}</p>
                    {/if}
                </div>
                <div class="col-12">
                    <button class="btn btn-badge text-bg-success">ENVIAR</button>
                    {if isset($category) && !empty($category)}
                        <a class="btn btn-primary" href="">VOLVER</a>
                    {/if}
                </div>
            </form>
        </div>
    </div>
</section>
