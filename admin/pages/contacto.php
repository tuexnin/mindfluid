
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Contacto</h1>
<p class="mb-4">Listado de Correos.</p>


<!-- DataTales Example -->
<div class="card shadow mb-4" id="listadoregistros">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bandeja de entrada</h6>
    </div>
    <div class="card-body" >
        <div class="table-responsive">
            <table class=" display responsive nowrap" id="tbllistado" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Asunto</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Asunto</th>
                    </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- inicio del formulario -->
<div class="panel-body" id="vistacorreo">
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Cliente:</label>
            <input type="hidden" name="idcontactenos" id="idcontactenos">
            <input type="text" class="form-control" name="nombre" 
                   id="Nombre" maxlength="100">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Asunto:</label>
            <input type="text" class="form-control" name="asunto" 
                   id="asunto" maxlength="100">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Correo:</label>
            <input type="text" class="form-control" name="email" 
                   id="email" maxlength="100">
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Mensaje:</label>
            <div id="contenido"></div>
        </div>
</div>

<script src="scripts/contacto.js"></script>