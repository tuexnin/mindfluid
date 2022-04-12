
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Servicios</h1>
<p class="mb-4">Listado de Servicios.</p>

<!-- Button que llama al siguiente formulario -->
<button class="btn btn-success mb-2" id="btnagregar" onclick="mostrarform(true)">
    <i class="fa fa-plus-circle"></i> Agregar
</button>


<!-- DataTales Example -->
<div class="card shadow mb-4" id="listadoregistros">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Servicios</h6>
    </div>
    <div class="card-body" >
        <div class="table-responsive">
            <table class=" display responsive nowrap" id="tbllistado" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>Titulo</th>
                        <th>Contenido</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Opciones</th>
                        <th>Titulo</th>
                        <th>Contenido</th>
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
            <label>Titulo(*):</label>
            <input type="hidden" name="idservicios" id="idservicios">
            <input type="text" class="form-control" name="titulo" 
                   id="titulo" maxlength="100" required>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Contenido(*):</label>
            <textarea class="form-control" id="cont" rows="5" name="cont" required></textarea>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
        </div>
    </form>

</div>

<script src="scripts/servicios.js"></script>