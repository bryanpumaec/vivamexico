<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <?php include './inc/link.php'; ?>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- CHAT BOT-->
    <script src="https://account.snatchbot.me/script.js"></script>
    <script>
        window.sntchChat.Init(262779)
    </script>


    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            color: #000;
            margin: 0;
            padding: 0;
            background: #111;

        }

        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 200px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 375px;
            background: #000;
            -webkit-box-reflect: below 1px linear-gradient(transparent, transparent, #0006);

        }

        .swiper-slide img {
            display: block;
            width: 100%;

        }
    </style>


</head>

<body id="container-page-index">

    <?php include './inc/navbar.php'; ?>
    <!-- SCRIPT CARGAR Modal AL INICIO-->

    <script>
        $(document).ready(function() {
            $("#Modal").modal("show");
        });
    </script>

    <!-- MODAL NOTICIAS -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center modal-title tittles-logotipo" id="exampleModalLabel">ÚLTIMAS NOTICIAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <video width="500" height="500" autoplay loop muted>
                            <source src="assets/vid/aperturaOtavalo.mp4" type="video/mp4">
                            Tu navegador no soporta HTML5 video.
                        </video>
                    </center>

                </div>

            </div>
        </div>
    </div>




    <!-- CAROUSEL DE IMAGENES -->

    <section id=" slider-store" class="carousel slide" data-ride="carousel" style="padding: 0;">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#slider-store" data-slide-to="0" class="active"></li>
            <li data-target="#slider-store" data-slide-to="1"></li>
            <li data-target="#slider-store" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->


        <!-- Controls -->
        <a class="left carousel-control" href="#slider-store" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider-store" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>
    <BR></BR>
    <!-- SLIDER DE IMAGENES -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="assets/img/slider/slider (1).jpg" />
            </div>
            <div class="swiper-slide">
                <img src="assets/img/slider/slider (2).jpg" />
            </div>
            <div class="swiper-slide">
                <img src="assets/img/slider/slider (3).jpg" />
            </div>
            <div class="swiper-slide">
                <img src="assets/img/slider/slider (4).jpg" />
            </div>
            <div class="swiper-slide">
                <img src="assets/img/slider/slider (5).jpg" />
            </div>
            <div class="swiper-slide">
                <img src="assets/img/slider/slider (6).jpg" />
            </div>
        </div>
       
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 20,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            loop: true,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            }
        });
    </script>



    <section id="marcas-index">
        <div class="container">
            <div class="page-header">
                <h1 class="text-center tittles-logotipo">Tenemos las mejores Marcas<small></small></h1>
            </div>
            <center>
       <p><img src="assets/img/marcas/takis.jpg" alt=""></p>
       <p><img src="assets/img/marcas/pulparindo.jpg" width="900" alt=""></p>
       <p><img src="assets/img/marcas/lucas.jpg" alt="" width="900" ></p>
       </center>
        </div>
    </section>



    <section id="new-prod-index">
        <div class="container ">
            <div class="page-header">
                <h1 class="text-center tittles-logotipo">Recientes Productos <small></small></h1>
            </div>
            <div class="row">
                <?php
                include 'library/configServer.php';
                include 'library/consulSQL.php';
                $consulta = ejecutarSQL::consultar("SELECT * FROM producto WHERE Stock > 0 AND Estado='Activo' ORDER BY id DESC LIMIT 6");
                $totalproductos = mysqli_num_rows($consulta);
                if ($totalproductos > 0) {
                    while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                ?>




                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img class="img-product" src="assets/img-products/<?php if ($fila['Imagen'] != "" && is_file("./assets/img-products/" . $fila['Imagen'])) {
                                                                                        echo $fila['Imagen'];
                                                                                    } else {
                                                                                        echo "default.png";
                                                                                    } ?>">
                                <div class="caption">
                                    <h3 class="tittles-pages-logo text-center"><?php echo $fila['NombreProd']; ?></h3>
                                    <p>
                                    <h4 class="tittles-pages-logo text-center"><?php echo $fila['Marca']; ?></h4>
                                    </p>
                                    <?php if ($fila['Descuento'] > 0) : ?>
                                        <p>
                                            <?php
                                            $pref = number_format($fila['Precio'] - ($fila['Precio'] * ($fila['Descuento'] / 100)), 2, '.', '');
                                            echo $fila['Descuento'] . "% descuento: $" . $pref;
                                            ?>
                                        </p>
                                    <?php else : ?>
                                        <p>
                                        <h3 class="tittles-pages-logo text-center">$<?php echo $fila['Precio']; ?><h3>
                                                </p>
                                            <?php endif; ?>
                                            <p class="text-center">
                                                <a href="infoProd.php?CodigoProd=<?php echo $fila['CodigoProd']; ?>" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
                                            </p>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo '<h2>No hay productos registrados en la tienda</h2>';
                }
                ?>
            </div>

    </section>
    <section id="reg-info-index" hidden>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <article style="margin-top:5%;">
                        <p><i class="fa fa-users fa-4x"></i></p>
                        <h3>REGISTRO</h3>
                        <p>Registrate como cliente de <span class="tittles-pages-logo">Viva México EC</span>para realizar tus pedidos</p>
                        <p><a href="registration.php" class="btn btn-info btn-raised btn-block">Registrarse</a></p>
                    </article>
                </div>

                <center>
                    <img src="assets/logos/vivamexnegro.jpg" width="500px" class="img-responsive">

                </center>

            </div>
        </div>
    </section>

    <?php include './inc/footer.php'; ?>
</body>

</html>