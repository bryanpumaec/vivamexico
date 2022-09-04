<?php
if(isset($_GET['email'])){
    $email =$_GET['email'];
    
}else{
    header("Location:./login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <title>Confirmar cuenta</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-login ">
    <?php include './inc/navbar.php'; ?>
<br><br><br>
    <div class="container">
        
            <div class="page-header">
                <h1 class="text-center tittles-logotipo">Verifica tu cuenta <small class="tittles-pages-logo"> </small></h1>
            </div>
   

            <div class="row" >
            <div class="col-sm-4">
            </div>
           
                <div class="col-sm-4">
                    <div id="container-form">
                    <form action="process/confCuenta.php" method="post">
                <div class="form-group label-floating">
                    <label class="control-label"><span class="glyphicon glyphicon-asterisk"></span>&nbsp; Ingresa el código de verificación</label>
                    <input type="number" class="form-control" name="codigo" required="">
                    <input type="hidden" class="form-control" name="email" id="email" value="<?php echo $email;?>">
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