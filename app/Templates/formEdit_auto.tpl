<div class="container text-center">
    <h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">{$titulo}</h1>
    <form class="g-3 mt-2" method="POST" action="addItem">
        <div class="mb-4">
            <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre:">
        </div>
        <div class="mb-4">
            <textarea class="form-label text-white fs-4" name="descripcion">DESCRIPCION</textarea>
        </div>
        <div class="mb-4">
            <label for="modelo" class="form-label text-white fs-4">MODELO</label>
            <input type="text" class="form-control" name="modelo" placeholder="Modelo:">
        </div>
        <div class="mb-4">
            <label for="marca" class="form-label text-white fs-4">MARCA</label>
            <input type="text" class="form-control" name="marca" placeholder="Marca:">
        </div>
        <div class="mb-4">
            <select name="categoria">
                <option value="{autos.id_categoria} - {autos.nombre}">
            </select>
        </div>
        <button><a href="updateItem/{$id}">ENVIAR</a></button>
    </form>