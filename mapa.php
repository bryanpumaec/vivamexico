<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sucursales</title>
    <?php include './inc/link.php'; ?>

</head>

<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>
    <br>
 <br>
    <h1 class="tittles-pages-logo text-center">YA EN TU CIUDAD <BR></BR> <small class="tittles-pages-logo">La mejor Refresquería Mexicana</small></h1>
    <div class="container">
        <h3 class="text-center">Todos los dulces picositos enchilados los encuentras en VivamexicoEC
            Además de dorilocos, marulocos, chamoyadas, micheladas preparadas, etc!
        </h3>
        <br><br>
    </div>
    <br>

   

        <div class="container">
            <!-- Example row of columns -->

            <div class="row">
                <div class="col-md-8">
                    <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 600px; width:100%;">
                    </div>
                </div>
                <div class="col-md-4">
                    <center>
                        <h3>Estamos en todo el Ecuador</h3>
                        <p>Con un solo clic puedes dirigirte a nuestro local mas cercano</p>


                        <p><a class="btn btn-primary" target="_blank" href="https://goo.gl/maps/7G7LyDyBkXbxA5B7A" role="button">Ibarra</a></p>
                        <p><a class="btn btn-primary" target="_blank" href="https://goo.gl/maps/LJLmWG7gakyGVPTt7" role="button">Otavalo</a></p>
                        <p><a class="btn btn-primary" target="_blank" href="https://goo.gl/maps/YCBiBJPLraiwtpyR8" role="button">Tulcan</a></p>
                        <p><a class="btn btn-primary" target="_blank" href="https://goo.gl/maps/2jm9RdPr2xx4bX7j8" role="button">Quito</a></p>

                        <p>¡ PROXIMAMENTE MAS LOCALES !</p>
                    </center>
                </div>
            </div>
                    <!-- MAPA DE GOOGLE -->

            <div class="row">



                <style>
                    body {
                        padding-top: 50px;
                        padding-bottom: 20px;
                    }
                </style>
                <style>
                    .map-container-2 {
                        overflow: hidden;
                        padding-bottom: 56.25%;
                        position: relative;
                        height: 0;
                    }

                    .map-container-2 iframe {
                        left: 0;
                        top: 0;
                        height: 100%;
                        width: 100%;
                        position: absolute;
                    }
                </style>


                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">

                </script>
                <script>
                    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
                </script>

                <script src="js/vendor/bootstrap.min.js"></script>

                <script src="js/main.js"></script>

                <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
                <script>
                    (function(b, o, i, l, e, r) {
                        b.GoogleAnalyticsObject = l;
                        b[l] || (b[l] =
                            function() {
                                (b[l].q = b[l].q || []).push(arguments)
                            });
                        b[l].l = +new Date;
                        e = o.createElement(i);
                        r = o.getElementsByTagName(i)[0];
                        e.src = '//www.google-analytics.com/analytics.js';
                        r.parentNode.insertBefore(e, r)
                    }(window, document, 'script', 'ga'));
                    ga('create', 'UA-XXXXX-X', 'auto');
                    ga('send', 'pageview');
                </script>
                <script>
                    var customLabel = {
                        restaurant: {
                            label: 'R'
                        },
                        bar: {
                            label: 'B'
                        }
                    };

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map-container-google-2'), {
                            center: new google.maps.LatLng(-1.3397668, -79.3666965),
                            zoom: 7,
                            heading: 90,
                            tilt: 45
                        });


                        var infoWindow = new google.maps.InfoWindow;
                        downloadUrl('visuales/mastermapa/xml.php', function(data) {
                            var xml = data.responseXML;
                            var markers = xml.documentElement.getElementsByTagName('marker');
                            Array.prototype.forEach.call(markers, function(markerElem) {
                                var idmapa = markerElem.getAttribute('idmapa');
                                var persona = markerElem.getAttribute('persona');
                                var descripcion = markerElem.getAttribute('descripcion');
                                var direccion = markerElem.getAttribute('direccion');

                                var point = new google.maps.LatLng(
                                    parseFloat(markerElem.getAttribute('lat')),
                                    parseFloat(markerElem.getAttribute('lng')));
                                const contentString =
                                    '<div id="content">' +
                                    '<div id="siteNotice">' +
                                    "</div>" +
                                    '<center>' +
                                    '<h1 id="firstHeading" class="firstHeading">' + persona + '</h1>' +
                                    '</center>' +
                                    '<br>' +
                                    '<div id="bodyContent">' +
                                    '<br>' +
                                    '<center>' +
                                    "<p><b>" + descripcion + "</p>" +
                                    "</p>" +
                                    "<p><b>" + direccion + "</p>" +
                                    "</p>" +
                                    '</center>' +
                                    "</div>" +
                                    "</div>";


                                //const image = "img/soldadoss.png";
                                //  var icon = customLabel[codigo] || {};



                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: point,
                                    //icon: image
                                });
                                marker.addListener('click', function() {
                                    infoWindow.setContent(contentString);
                                    infoWindow.open(map, marker);
                                });
                            });
                        });

                        // Una matriz con las coordenadas de los límites de Bucaramanga, extraídas manualmente de la base de datos GADM


                    }

                    function downloadUrl(url, callback) {
                        var request = window.ActiveXObject ?
                            new ActiveXObject('Microsoft.XMLHTTP') :
                            new XMLHttpRequest;
                        request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                                request.onreadystatechange = doNothing;
                                callback(request, request.status);
                            }
                        };
                        request.open('GET', url, true);
                        request.send(null);
                    }

                    function doNothing() {}
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAet6BC3A-TE6toXKEFBxLcFYscszuNKFw&callback=initMap" defer>
                </script>
        <!-- MAPA DE GOOGLE -->
            </div>
        </div>
        <section id="marcas-index">
        <div class="container">
            <div class="page-header">
                <h1 class="text-center">LAS MEJORES MARCAS<small>...</small></h1>
            </div>
            ...
        </div>
    </section>



        <?php include './inc/footer.php'; ?>
    </body>

</html>