<?php
require './layout/header.php';
?>


<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="bradcumbContent">
        <h2>CONTACTENOS</h2>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Top Popular Courses Area Start ##### -->
<div class="top-popular-courses-area mt-50 section-padding-100-70">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6">

                <div class="card mt-50">
                    <div class="card-header">
                        <h5>Ingrese sus datos</h5>
                    </div>
                    <div class="card-body">
                        <form name="formularioContacto" id="formularioContacto" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="txtNombreCli" name="txtNombreCli" placeholder="Nombres y Apellidos" required>
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control" id="txtCorreoCli" name="txtCorreoCli" placeholder="Correo" required>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" id="txtTelefonoCli" name="txtTelefonoCli" placeholder="Celular" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="txtAsuntoCli" name="txtAsuntoCli" placeholder="Asunto" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="txtContenidoMsgCli" name="txtContenidoMsgCli" placeholder="Mensaje" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnEnviar">Enviar</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-6 ">
                
                <ul class="ninite">
                    <li class="ninite2"><i class="icon-map ninite3"></i> <span>Av. Los Gorriones #470, Urb. La Campiña – Chorrillos - Lima</span></li>
                    <li class="ninite2"><i class="icon-telephone-2 ninite3"></i> <span>+51 930324980</span></li>
                    <li class="ninite2"><i class="icon-email ninite3"></i> <span>info@minfluid.com</span></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- ##### Top Popular Courses Area End ##### -->



<?php
require './layout/footer.php';
?>


<script src="scripts/contacto.js"></script>