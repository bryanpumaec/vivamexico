<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../../icono.ico" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power BI</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/styles.css">



</head>

<body style="background-color:#d4d3d5;">

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

            <iframe title="vivamexico" width="1280" height="700" src="https://app.powerbi.com/view?r=eyJrIjoiNmIwYTAzNmYtOGI4OS00N2VkLWIyMzEtMmVhMDVmYWZlNmExIiwidCI6ImRiNDlmMTcxLTlhZWQtNDQ3Ny1hZmRjLWJjYWIwNjllYjc1YiIsImMiOjR9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>

        </div>
    </div>


































    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/index.js"></script>

</body>

</html>