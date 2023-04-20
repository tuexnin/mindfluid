<div class="card shadow mb-4" id="listadoregistros">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Slider</h6>
    </div>
    <div class="card-body" >
        <form name="formulario" id="formulario" method="POST">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Imagen 1(*):</label>
                        <input type="hidden" name="idslider" id="idslider">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-image"></i></div>
                            </div>
                            <input type="file" class="form-control" id="imagen1" name="imagen1">
                        </div>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Titulo 1(*):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-award"></i></i></div>
                            </div>
                            <input type="text" class="form-control" id="titulo1" name="titulo1" placeholder="Ejemplo">
                        </div>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label>Texto 1(*):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-align-justify"></i></div>
                            </div>
                            <input type="text" class="form-control" id="texto1" name="texto1" placeholder=".......">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="imagenactual1" id="imagenactual1">
                    <img class="mb-2" src="" width="500px" height="280px" id="imagenmuestra1">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Imagen 2(*):</label>
                        <input type="hidden" name="idslider" id="idslider">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-image"></i></div>
                            </div>
                            <input type="text" class="form-control" id="imagen2" name="imagen2" placeholder="imagen 2">
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Titulo 2(*):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-award"></i></i></div>
                            </div>
                            <input type="text" class="form-control" id="titulo2" name="titulo2" placeholder="Ejemplo">
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Texto 2(*):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-align-justify"></i></div>
                            </div>
                            <input type="text" class="form-control" id="texto2" name="texto2" placeholder=".......">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="imagenactual2" id="imagenactual2">
                    <img class="mb-2" src="" width="500px" height="280px" id="imagenmuestra2">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Imagen 3(*):</label>
                        <input type="hidden" name="idslider" id="idslider">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-image"></i></div>
                            </div>
                            <input type="text" class="form-control" id="imagen3" name="imagen3" placeholder="imagen 3">
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Titulo 3(*):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-award"></i></i></div>
                            </div>
                            <input type="text" class="form-control" id="titulo3" name="titulo3" placeholder="Ejemplo">
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Texto 3(*):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-align-justify"></i></div>
                            </div>
                            <input type="text" class="form-control" id="texto3" name="texto3" placeholder=".......">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" name="imagenactual3" id="imagenactual3">
                    <img src="" width="500px" height="280px" id="imagenmuestra3">
                </div>
            </div>


            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </form>
    </div>
</div>

<script src="scripts/slider.js"></script>