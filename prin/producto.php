<?php
require './layout/header.php';
require './controller/productos.php';
require './controller/producto.php';

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
                    <span>Catalogo</span>
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
                                        <a href="producto.php?id=<?php echo $res['idproducto']; ?>" class="btn academy-btn btn-sm">Ver</a>
                                    </div>
                                    <div class="popular-course-thumb bg-img" >
                                        <img class="imgpro1" src="../admin/files/productos/<?php echo $res['foto']; ?>" alt="alt"/>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }else{
                        echo "<p class='ml-50 mt-100'>No hay resultados que mostrar.</p>";
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

