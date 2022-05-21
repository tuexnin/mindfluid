<?php
require './layout/header.php';
require './controller/blog.php';
?>


<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="bradcumbContent">
        <h2>BLOG</h2>
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
                    if (empty($blog)) {
                        echo '<span>Lista</span>';
                    } else {
                        echo '<span>|Blog|</span>';
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <?php
                    if (empty($blog)) {
                        if (mysqli_num_rows($respuestaBlog) > 0) {
                            while ($res = mysqli_fetch_assoc($respuestaBlog)) {
                                ?>
                                <!-- Single Top Popular Course -->
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="400ms">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb ">
                                        <img class="imgserv1" src="../admin/files/contenido/<?php echo $res['portada']; ?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="#" class="post-title"><?php echo $res['titulo']; ?></a>
                                    <!-- Post Meta -->

                                    <!-- Post Excerpt -->
                                    <p><?php echo $res['seo']; ?></p>
                                    <!-- Read More btn -->
                                    <a href="blog.php?id=<?php echo $res['idblog']; ?>" class="btn academy-btn btn-sm mt-15">ver</a>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p class='ml-50 mt-100'>No hay resultados que mostrar.</p>";
                        }
                    } else {
                        if (mysqli_num_rows($traerBlog) > 0) {
                            while ($res = mysqli_fetch_assoc($traerBlog)) {
                                ?>
                                <div class="col-md-12 col-lg-12 mr-50 ml-50">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="blog-post-thumb ">
                                                <img class="imgserv1" src="../admin/files/contenido/<?php echo $res['portada']; ?>" alt="">
                                            </div>
                                            <!-- Post Title -->
                                            <h2  class="protitulo"><?php echo $res['titulo']; ?></h2>
                                            <!-- Post Meta -->
                                            <div class="post-meta">

                                            </div>
                                            <div>
                                                <?php echo $res['contenido']; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <?php
                            }
                        } else {
                            echo "<p class='ml-50 mt-100'>El Contenido seleccionado no exite.</p>";
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

