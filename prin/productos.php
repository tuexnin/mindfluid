<?php
require './layout/header.php';
require './controller/productos.php';
?>


<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="bradcumbContent">
        <h2>PRODUCTOS</h2>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Top Popular Courses Area Start ##### -->
<div class="top-popular-courses-area mt-50 section-padding-100-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <?php
                    if (empty($producto)) {
                        echo '<span>Catalogo</span>';
                    } else {
                        echo '<span>|Producto|</span>';
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php
                require './layout/filtro.php';
                ?>
                <!-- fin del acordeon -->
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php
                    if (empty($producto)) {
                        if (mysqli_num_rows($respuestaProducto) > 0) {
                            while ($res = mysqli_fetch_assoc($respuestaProducto)) {
                                ?>
                                <!-- Single Top Popular Course -->
                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="900ms">
                                        <div class="popular-course-content">
                                            <h5><?php echo $res['nombre']; ?></h5>
                                            <span><?php echo $res['precioventa']; ?></span>
                                            <p><?php echo $res['resumen']; ?></p>
                                            <a href="productos.php?id=<?php echo $res['idproducto']; ?>" class="btn academy-btn btn-sm">Ver</a>
                                        </div>
                                        <div class="popular-course-thumb bg-img" >
                                            <img class="imgserv1" src="../admin/files/productos/<?php echo $res['foto']; ?>" alt="alt"/>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            echo "<p class='ml-50 mt-100'>No hay resultados que mostrar.</p>";
                        }
                    } else {
                        if (mysqli_num_rows($traerProducto) > 0) {
                            while ($res5 = mysqli_fetch_assoc($traerProducto)) {
                                ?>
                                <div class="col-md-12 col-lg-12 mr-50 ml-50">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="../admin/files/productos/<?php echo $arregloImagen[0]; ?>" class="d-block" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="../admin/files/productos/<?php echo $arregloImagen[1]; ?>" class="d-block" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="../admin/files/productos/<?php echo $arregloImagen[2]; ?>" class="d-block" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                            <!-- Post Title -->
                                            <h2  class="protitulo"><?php echo $res5['nombre']; ?></h2>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p>Marca: <?php echo $res5['marca']; ?></p>
                                                <p>Categoria: <?php echo $res5['categoria']; ?></p>
                                            </div>
                                            <div>
                                                <?php echo $res5['descripcion']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-50">
                                        <div class="card-header">
                                            <h5>Solicitar presupuesto</h5>
                                        </div>
                                        <div class="card-body">
                                            <form name="formularioContacto" id="formularioContacto" method="POST">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="txtProducto" name="txtProducto" value="<?php echo $res5['nombre']; ?>" readonly>
                                                    <input type="hidden" class="form-control" id="txtIdProducto" value="<?php echo $res5['idproducto']; ?>">
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="txtNombreCli" name="txtNombreCli" placeholder="Nombres y Apellidos" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control" id="txtCorreoCli" name="txtCorreoCli" placeholder="Correo" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="txtTelefonoCli" name="txtTelefonoCli" placeholder="Celular" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="txtAsuntoCli" name="txtAsuntoCli" placeholder="Asunto" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <textarea class="form-control" id="txtContenidoMsgCli" name="txtContenidoMsgCli" placeholder="Mensaje" rows="5" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary" id="btnEnviar">Enviar</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>


                                <?php
                            }
                        } else {
                            echo "<p class='ml-50 mt-100'>El producto seleccionado no exite.</p>";
                        }
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- ##### Top Popular Courses Area End ##### -->



<?php
require './layout/footer.php';
?>


<script src="scripts/contacto.js"></script>