<!DOCTYPE html>
<html lang="es">

<head>
    <title>Acceso Administración</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-login ">
    <?php include './inc/navbar.php'; ?>
    <br><br><br>
    <div class="container">

        <div class="page-header">
            <h1 class="text-center tittles-logotipo">ADMINISTRACIÓN<small class="tittles-pages-logo"> </small></h1>
        </div>


        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div id="container-form">
                    <form action="process/loginAD.php" method="post" role="form" class="FormCatElec" data-form="login">
                        <div class="form-group label-floating">
                            <label class="control-label"><span class="glyphicon glyphicon-user"></span>&nbsp;Nombre</label>
                            <input type="text" class="form-control" name="nombre-login" required="">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label"><span class="glyphicon glyphicon-lock"></span>&nbsp;Contraseña</label>
                            <input type="password" class="form-control" name="clave-login" required="">
                        </div>

                    
                      


                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-primary btn-raised btn-sm">Iniciar sesión</button>
                            </center>
                        </div>
                        <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
                
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>
<br><br><br>
<?php include './inc/footer.php'; ?>

</html>