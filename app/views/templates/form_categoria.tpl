<section>
<h1 class="text-center shadow-sm p-3 mb-0 bg-body rounded">Formulario para categorias</h1>
<div class="container">
    <div class="p-4 bg-light mt-3">
        <form class="g-3 mt-2" method="POST" action="categorias/insertar">
            <div class="mb-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre:">
            </div>
            <div class="mb-4">
                <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion:"></textarea>
            </div>
            <div class="mb-4">
                <select class="form-select" name="tipo">
                    <option value="" disabled selected>Seleccione un tipo</option>
                    <option value="INTERNACIONAL">INTERNACIONAL</option>
                    <option value="NACIONAL">NACIONAL</option>
                    <option value="ZONAL">ZONAL</option>
                    <option value="PROVINCIAL">PROVINCIAL</option>
                    <option value="CONTINENTAL">CONTINENTAL</option>
                </select>
            </div>
            
            <button class="btn btn-badge text-bg-success">ENVIAR</button>
        </form>
    </div>
</div>
</section>