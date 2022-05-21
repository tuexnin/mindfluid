
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
                        <th>Asunto</th>
                        <th>Cliente</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Opciones</th>
                        <th>Asunto</th>
                        <th>Cliente</th>
                        <th>Email</th>
                    </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4" id="vistacorreo">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mensaje</h6>
    </div>
    <div class="panel-body" id="">
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Asunto:</label>
            <input type="text" class="form-control" name="asunto" 
                   id="asunto" readonly>
        </div>    
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Cliente:</label>
            <input type="hidden" name="idcontactenos" id="idcontactenos">
            <input type="text" class="form-control" name="persona" 
                   id="persona" readonly>
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Correo:</label>
            <input type="text" class="form-control" name="email" 
                   id="email" readonly>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Telefono:</label>
            <input type="text" class="form-control" name="telefono" 
                   id="telefono" readonly>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Producto:</label>
            <input type="text" class="form-control" name="producto" 
                   id="producto" readonly>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Mensaje:</label>
            <div>
                <p id="mensaje"></p>
            </div>
        </div>
    </div>
</div>
<script src="scripts/contacto.js"></script>