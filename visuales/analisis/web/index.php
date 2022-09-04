
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de datos</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../../icono.ico" />


  <link rel="stylesheet" href="../css/styles.css">
    


</head>
<body  style="background-color:#d4d3d5;"> 

<div class="container">
<nav class="navbar navbar-expand navbar-dark bg-dark justify-content-center">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="../../../configAdmin.php">- Regresar a la página -</a>
        <a class="navbar-brand" href="index.php">Dashboard Viva México EC</a>
        <a class="navbar-brand" href="powerbi.php">Power BI</a>
                 <a class="nav-item nav-link active printbutton" href="Model/cerrar.php">Imprimir</a>
        <script>
        document.querySelectorAll('.printbutton').forEach(function(element) {
            element.addEventListener('click', function() {
                print();
            });
        });
    </script>
    </div>  
</nav>
<div class="row"> 
    
    <div class="col-md-4">
        <div class="bg-success text-white text-center m-1">
            <div class="card-header"><b>Total Productos Vendidos</b> </div>
            <div class="card-body">
                <h5 class="h1 card-title"><span id="idVendidos">35</span></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="bg-warning text-white text-center m-1">
            <div class="card-header"><b>Stock total en almacén </b> </div>
            <div class="card-body">
                <h5 class="h1 card-title"><span id="idAlmacen">35</span></h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="bg-info text-white text-center m-1">
            <div class="card-header"><b>Total Ingresos de la empresa</b> </div>
            <div class="card-body">
                <h5 class="h1 card-title"><span id="idIngreso"></span></h5>
                <p class="card-text"></p>
            </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12 text-center">
                <h2>Reporte de ventas por fecha</h2>
                <canvas id="idGrafica" class="grafica"></canvas>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 text-center">
                <div id="idContTabla" ></div>
            </div>
        </div>
       

   
    
        <!-- GRAFICA DONA -->
      
        <div class="row">

        <div class="dona ">
            <div class="text-center "  >
                <h2>Productos Mas Vendidos</h2>
                <div class="col-sm-3">
            </div>

                <canvas  width="100" height="100" id="idGrafica2" class= "grafica"></canvas>
                </div>
            

            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 text-center">
                <div id="idContTabla2"></div>
            </div>
        </div>
        </div>

    <!-- GRAFICA BARRA -->
    <div class="row my-3">
            <div class="col-md-12 text-center">
                <h2>Productos - Precios</h2>
                <canvas id="idGrafica3" class="grafica"></canvas>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 text-center">
                <div id="idContTabla3" ></div>
            </div>
        </div>

<!-- GRAFICA BARRA HORIZONTAL -->
<div class="row my-3">
            <div class="col-md-12 text-center">
                <h2>Mejores Clientes</h2>
                <canvas id="idGrafica4" class="grafica"></canvas>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 text-center">
                <div id="idContTabla4" ></div>
            </div>
        </div>




    </div>
    
    
    
    
    
    
    
    














    

<script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/index.js"></script>

</body>
</html>