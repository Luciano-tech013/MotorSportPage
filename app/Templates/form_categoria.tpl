<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">{$titulo}</h1>
<form class="g-3 mt-2" method="POST" action="addCategory">
    <div class="mb-4">
        <label for="nombre" class="form-label text-white fs-4">NOMBRE</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre:">
    </div>
    <div class="mb-4">
        <textarea class="form-label text-white fs-4" name="descripcion">DESCRIPCION</textarea>
    </div>
    <div class="mb-4">
        <label for="nombre" class="form-label text-white fs-4">TIPO</label>
        <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo:">
    </div>
</form>