<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">{$titulo}</h1>
<form class="g-3 mt-2" method="POST" action="addItem" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre:">
    </div>
    <div class="mb-4">
        <textarea class="form-label text-white fs-4" name="descripcion">DESCRIPCION</textarea>
    </div>
    <div class="mb-4">
        <label for="modelo" class="form-label text-white fs-4">MODELO</label>
        <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo:">
    </div>
    <div class="mb-4">
        <label for="marca" class="form-label text-white fs-4">MARCA</label>
        <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca:">
    </div>
    <div>
        <label class="form-label text-white fs-4">IMAGEN</label>
        <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Adjuntar imagen">
    </div>
    <div class="mb-4">
        <select name="categoria">
            <option value="{autos.id_categoria} - {autos.nombre}">
        </select>    
    </div>
</form>