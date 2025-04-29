<!--Incluyo de nuevo el header para cargar los estilos si es que 
este archivo no se incluye desde cars.table.tpl, es decir, 
se llama para editar--->
{if !isset($is_embedded) || !$is_embedded}
    {include file="layout/header.tpl"}
{/if}

<section class="section__car__form">
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Formulario para Autos</h1>
    <div class="container">
        <div class="p-4 bg-light mt-3">
            <form class="g-3 mt-2" method="POST" {if isset($action)} action="{$action}" {/if}>
                <div class="mb-4">
                    <input type="text" class="form-control" name="name" {if !empty($car)} value="{$car->name}" {/if} placeholder="Nombre:">
                    {if isset($errors.carName) && $errors.carName}
                        <p class="text-danger">Debe ingresar un nombre correcto</p>
                    {/if}
                    {if isset($errors.carRepeat) && $errors.carRepeat}
                        <p class="text-danger">Ya existe ese vehículo en el sistema</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <textarea type="text" class="form-control" name="description"
                    placeholder="Descripcion:">{if !empty($car)}{$car->description}{/if}</textarea>
                    {if isset($errors.carDescription) && $errors.carDescription}
                        <p class="text-danger">Debe ingresar una descripcion correcta</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="model" {if !empty($car)} value="{$car->model}" {/if}
                        placeholder="Año del Modelo:">
                    {if isset($errors.model) && $errors.model}
                        <p class="text-danger">Debe ingresar un modelo correcto</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="brand" {if !empty($car)} value="{$car->brand}" {/if}
                        placeholder="Marca:">
                    {if isset($errors.brand) && $errors.brand}
                        <p class="text-danger">Debe ingresar una marca correcta</p>
                    {/if}
                </div>
                <div class="mb-4">
                    <label for="category_id" class="form-label fs-5">CATEGORIA</label>
                    <select class="form-select" name="category_id">
                        {if !isset($car)}
                            <option value="" disabled selected>Seleccione un tipo</option>
                            {foreach from=$categories item=$category}
                                <option value="{$category->category_id}">{$category->name}</option>
                            {/foreach}
                        {/if}
                        

                        {if isset($car) && !empty($car)}
                            {foreach from=$categories item=$category}
                                {if isset($car) && !empty($car) && $car->category_id == $category->category_id}
                                    <option value="{$category->category_id}" selected>{$category->name}</option>
                                {/if}

                                {if isset($car) && !empty($car) && $car->category_id != $category->category_id}
                                    <option value="{$category->category_id}">{$category->name}</option>
                                {/if}
                            {/foreach}
                        {/if}
                    </select>
                    {if isset($errors.category_id) && $errors.category_id}
                        <p class="text-danger">Debe seleccionar una categoria</p>
                    {/if}
                </div>
                {if isset($categories) && !empty($categories)}
                    <button class="btn btn-badge text-bg-success">ENVIAR</button>
                {/if}
                {if isset($car) && !empty($car)}
                    <a class="btn btn-primary" href="home">VOLVER</a>
                {/if}
            </form>
        </div>
    </div>
</section>