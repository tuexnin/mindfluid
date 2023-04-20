<div class="card shadow mb-4" id="listadoregistros">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Configuracion</h6>
    </div>
    <div class="card-body" >
        <form name="formulario" id="formulario" method="POST">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>whatsapp(*):</label>
                <input type="hidden" name="idconfig" id="idconfig">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-whatsapp"></i></div>
                    </div>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="+51930324980">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Facebook(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-facebook"></i></div>
                    </div>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="https://web.facebook.com/gaming/dota2">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Telefono(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                    </div>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="930324980">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Correo(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                    </div>
                    <input type="text" class="form-control" id="correo" name="correo" placeholder="ejemplo@ejemplo.com">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>LinkedIn(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-linkedin"></i></div>
                    </div>
                    <input type="text" class="form-control" id="linked" name="linked" placeholder="https://pe.linkedin.com/">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Direccion(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-map-marked-alt"></i></div>
                    </div>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Jr. las margaritas 363">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Correo 2(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-at"></i></div>
                    </div>
                    <input type="text" class="form-control" id="correo2" name="correo2" placeholder="noreply@ejemplo.com">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Acerca(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-info-circle"></i></div>
                    </div>
                    <input type="text" class="form-control" id="acerca" name="acerca" placeholder="Mindfluid.com">
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Catalogo(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-info-circle"></i></div>
                    </div>
                    <input type="file" class="form-control" id="catalogo" name="catalogo">
                    
                </div>
                <input type="text" class="form-control" id="catalogoActual" name="catalogoActual" readonly>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label>Mapa(*):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-info-circle"></i></div>
                    </div>
                    <input type="text" class="form-control" id="mapa" name="mapa" placeholder="https://www.google.com/maps/embed?">
                </div>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </form>
    </div>
</div>

<script src="scripts/config.js"></script>