<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Blog</h1>
<p class="mb-4">Listado de Blogs.</p>

<!-- Button que llama al siguiente formulario -->
<button class="btn btn-success mb-2" id="btnagregar" onclick="mostrarform(true)">
    <i class="fa fa-plus-circle"></i> Agregar
</button>


<!-- DataTales Example -->
<div class="card shadow mb-4" id="listadoregistros">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Publicaciones</h6>
    </div>
    <div class="card-body" >
        <div class="table-responsive">
            <table class=" display responsive nowrap" id="tbllistado" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Fecha P.</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Opciones</th>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Fecha P.</th>
                        <th>Estado</th>
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
            <input type="hidden" name="idblog" id="idblog">
            <input type="hidden" name="tipopublicacion" id="tipopublicacion" value="blog">
            <input type="text" class="form-control" name="titulo" 
                   id="titulo" maxlength="100" required>
        </div>
        <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Portada(*):</label>
                <input type="file" class="form-control" name="portada" id="portada">
                <input type="hidden" name="imagenactual" id="imagenactual">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="" width="250px" height="120px" id="imagenmuestra">
            </div>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Descripcion(*):</label>
            <textarea class="form-control" id="descripcion" rows="2" name="descripcion" maxlength="200" required></textarea>
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

<script src="scripts/blog.js"></script>