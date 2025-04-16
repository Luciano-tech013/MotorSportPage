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
            <form class="g-3 mt-2" method="POST" {if isset($action)} action="{$action}" {/if}>
                <div class="mb-4">
                    <input type="text" class="form-control" name="name" {if isset($category) && !empty($category)} value="{$category->name}" {/if}placeholder="Nombre:">
                    {if isset($errors.categoryName) && $errors.categoryName}
                        <p class="text-danger">Debe ingresar un nombre correcto</p>
                    {/if}
                    {if isset($errors.categoryRepeat) && $errors.categoryRepeat}
                        <p class="text-danger">Ya existe esa categoria en el sistema</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <textarea type="text" class="form-control" name="description" placeholder="Descripcion:">{if isset($category) && !empty($category)}{$category->description}{/if}</textarea>
                    {if isset($errors.categoryDescription) && $errors.categoryDescription}
                        <p class="text-danger">Debe ingresar una descripcion correcta</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <select class="form-select" name="type">
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
                    {if isset($errors.type) && $errors.type}
                        <p class="text-danger">Debe ingresar un tipo de categoria correcto</p>
                    {/if}
                </div>

                <button class="btn btn-badge text-bg-success">ENVIAR</button>
                {if isset($category) && !empty($category)}
                    <a class="btn btn-primary" href="home">VOLVER</a>
                {/if}
            </form>
        </div>
    </div>
</section>