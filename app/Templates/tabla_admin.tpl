{include file="app/Templates/header.tpl"}

{include file="app/Templates/form_autos.tpl"}

<section class="text-center">
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">{$titulo_autos}</h1>
    <table class="table table-dark table-striped">
        <thead>
            <th>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Modelo</td>
                <td>Marca</td>
                <td>Categoria</td>
                <td>Botones</td>
            </th>
        </thead>
        <tbody>
            {foreach from="autos" item="auto"}
                <tr>
                    <td>{$auto->nombre}</td>
                    <td>{$auto->descripcion}</td>
                    <td>{$auto->modelo}</td>
                    <td>{$auto->marca}</td>
                    <td>{$auto->id_categoria} - {$auto->nombre}</td>
                    <td>
                        <button class="badge text-bg-danger"><a href="deleteItems/{$auto->id_nombre}">BORRAR</a></button>
                        <button class="badge text-bg-success"><a href="update">EDITAR</a></button>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    {include file="app/Templates/form_categoria.tpl"}

    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">{$titulo_categorias}</h1>
    <table class="table table-dark table-striped">
        <thead>
            <th>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Tipo</td>
                <td>Botones</td>
            </th>
        </thead>
        <tbody>
            {foreach from="categorias" item="categoria"}
                <tr>
                    <td>{$categoria->nombre}</td>
                    <td>{$categoria->descripcion}</td>
                    <td>{$categoria->tipo}</td>
                    <td>
                        <button class="badge text-bg-danger"><a href="deleteCategory/{$categoria->id_categoria}">BORRAR</a></button>
                        <button class="badge text-bg-success"><a href="updateCategory/{$auto->id_categoria}">EDITAR</a></button>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>

{include file="app/Templates/footer.tpl"}