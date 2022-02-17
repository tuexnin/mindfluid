<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Categoria</h1>
<p class="mb-4">Listado de Categorias.</p>

<!-- Button que llama al siguiente formulario -->
<button class="btn btn-success mb-2" id="btnagregar" onclick="mostrarform(true)">
    <i class="fa fa-plus-circle"></i> Agregar
</button>


<!-- DataTales Example -->
<div class="card shadow mb-4" id="listadoregistros">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categoria</h6>
    </div>
    <div class="card-body" >
        <div class="table-responsive">
            <table class=" display responsive nowrap" id="tbllistado" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- inicio del formulario -->
<div class="panel-body" id="formularioregistros">
    <form name="formulario" id="formulario" method="POST">
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Nombre(*):</label>
                <input type="hidden" name="idcategoria" id="idcategoria">
            <input type="text" class="form-control" name="nombre" 
                   id="nombre" maxlength="100" placeholder="Nombre" required>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Tipo(*):</label>
            <select class="form-control selectpicker" name="tipo" id="tipo" data-live-search="true" title="Seleccione" required>
            </select>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
        </div>
    </form>

</div>

<script src="scripts/categoria.js"></script>