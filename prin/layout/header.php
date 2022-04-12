<?php
require 'controller/home.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>MindFluid</title>

        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <!-- ##### Preloader ##### -->
        <div id="preloader">
            <i class="circle-preloader"></i>
        </div>

        <!-- ##### Header Area Start ##### -->
        <header class="header-area">

            <!-- Top Header Area -->
            <div class="top-header">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 h-100">
                            <div class="header-content h-100 d-flex align-items-center justify-content-between">
                                <div class="academy-logo">
                                    <a href=""><img src="img/core-img/logo-minfluid-peru.png" width="150px" alt=""></a>
                                </div>
                                <div class="login-content">
                                    <a href="#">Ingrese</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navbar Area -->
            <div class="academy-main-menu">
                <div class="classy-nav-container breakpoint-off">
                    <div class="container">
                        <!-- Menu -->
                        <nav class="classy-navbar justify-content-between" id="academyNav">

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                            <!-- Menu -->
                            <div class="classy-menu">

                                <!-- close btn -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>

                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul>
                                        <li><a href="#">Inicio</a></li>
                                        <li><a href="#">Productos</a>
                                            <ul class="dropdown">
                                                <?php
                                                if (mysqli_num_rows($respueta) > 0) {
                                                    while ($fila = mysqli_fetch_assoc($respueta)) {
                                                        echo "<li><a href='redirect.php?op=" . $fila['idtipo'] . "'>" . $fila['nombre'] . "</a></li>";
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="#">Servicios</a>
                                                <ul class="dropdown">
                                                    <?php
                                                    if (mysqli_num_rows($respueta2) > 0) {
                                                        while ($fila = mysqli_fetch_assoc($respueta2)) {
                                                            echo "<li><a href='redirect.php?op=" . $fila['idservicios'] . "'>" . $fila['nombre'] . "</a></li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                        </li>
                                        <li><a href="about-us.html">Soluciones</a></li>
                                        <li><a href="course.html">Blog</a></li>
                                        <li><a href="contact.html">Contactenos</a></li>
                                    </ul>
                                </div>
                                <!-- Nav End -->
                            </div>

                            <!-- Calling Info -->
                            <div class="calling-info">
                                <div class="call-center">
                                    <a href="tel:+51930324980"><i class="icon-telephone-2"></i> <span>(+51) 930324980</span></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ##### Header Area End ##### -->