<?php
if(isset($_GET['email']) && isset($_GET['token'])){
    $email=$_GET['email'];
    $token=$_GET['token'];
    
}else{
    header("Location:./login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/CheckPassword.js"></script>
    <link href="css/CheckPassword.css" rel="stylesheet" />
    <script src="js/Password=.js"></script>
    <title>Cambiar contraseña</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-login ">
    <?php include './inc/navbar.php'; ?>
    <br><br><br>
    <div class="container">

        <div class="page-header">
            <br>
            <h1 class="text-center tittles-logotipo">Crea tu nueva contraseña <small class="tittles-pages-logo"> </small></h1>
        </div>


        <div class="row">
            <div class="col-sm-4">
            </div>

            <div class="col-sm-4">
                <form action="process/updatePassword.php" method="POST">
                    <div class="mb-3">
                        <div class="form-group label-floating">

                            <label for="c" class="form-label"><i class="fa fa-lock"></i>&nbsp;Nueva contraseña</label>
                            <input type="password" class="form-control" name="clien-pass" id="txtPassword">
                            <input type="hidden" class="form-control" name="email" value="<?php echo $email;?>">

                        </div>
                    </div>
                    <div id="strengthMessage"></div>

                    <div class="mb-3">
                        <div class="form-group label-floating">

                            <label for="c" class="form-label"><i class="fa fa-lock"></i>&nbsp;Repita su contraseña</label>
                            <input type="password" class="form-control" name="clien-pass2" id="txtPassword2">
                        </div>
                    </div>
                    <label id="poo"></label><br>
                    <center>
                    <button type="submit" class="btn btn-primary btn-raised btn-sm">Restablecer</button>
                    </center>
                </form>
            </div>
        </div>
    </div>

</body>
<br><br><br>
<?php include './inc/footer.php'; ?>

</html>