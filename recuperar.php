<!DOCTYPE html>
<html lang="es">

<head>
    <title>Recuperar contraseña</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-login ">
    <?php include './inc/navbar.php'; ?>
<br><br><br>
    <div class="container">
        
            <div class="page-header">
                <h1 class="text-center tittles-logotipo">Recupera tu contraseña <small class="tittles-pages-logo"> </small></h1>
            </div>
   

            <div class="row" >
            <div class="col-sm-2">
            </div>
           
                <div class="col-sm-8">
                    <div id="container-form">
                    <form action="process/recCuenta.php" method="post">
                <div class="form-group label-floating">
                    <label class="control-label"><span class="glyphicon glyphicon-user"></span>&nbsp;Ingresa tu correo electrónico</label>
                    <input type="text" class="form-control" name="clien-email" required="">
                </div>
           
               
              <center>
                  <button type="submit" class="btn btn-primary btn-raised btn-sm">Enviar</button>
                  </center>
                <p  class="text-center">  No tienes una cuenta?<a href="registration.php">
                 Registrate aquí
            </p></a> 
            </form>
                    </div>
                </div>
            </div>
        </div>

</body>
<br><br><br>
<?php include './inc/footer.php'; ?>

</html>