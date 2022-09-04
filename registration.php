<!DOCTYPE html>
<html lang="es">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/CheckPassword.js"></script>
  <script src="js/CheckPassword2.js"></script>
  <link href="css/CheckPassword.css" rel="stylesheet" />
  <script src="js/Password=.js"></script>

  <title>Registro</title>
  <?php include './inc/link.php'; ?>
</head>

<body id="container-page-registration">
  <?php include './inc/navbar.php'; ?>
  <section id="form-registration">
    <div class="container">
      <div class="page-header">
        <h1 class="text-center">REGISTRATE <small class="tittles-pages-logo"> </small></h1>
      </div>
      <p class="lead text-center">
        Dulcería y Refresquería Mexicana
      </p>
      <div class="row">

        <div class="col-sm-7">
          <div id="container-form">
            <p class="text-center lead">Registro de Clientes</p>
            <br><br>
            <form class="FormCatElec" action="process/regclien.php" role="form" method="POST" data-form="save">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-12">
                    <legend><i class="fa fa-user"></i> &nbsp; Datos personales</legend>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp; Ingrese su número de cedula</label>
                      <input class="form-control" type="number" required name="clien-nit" pattern="[0-9]{1,15}" title="Ingrese su número de cedula. Solamente números" maxlength="10">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-user"></i>&nbsp; Ingrese sus nombres</label>
                      <input class="form-control" type="text" required name="clien-fullname" title="Ingrese sus nombres (solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-user"></i>&nbsp; Ingrese sus apellidos</label>
                      <input class="form-control" type="text" required name="clien-lastname" title="Ingrese sus apellido (solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-mobile"></i>&nbsp; Ingrese su número telefónico</label>
                      <input class="form-control" type="number" required name="clien-phone" maxlength="15" title="Ingrese su número telefónico. Mínimo 8 digitos máximo 15">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Ingrese su Email</label>
                      <input class="form-control" type="email" required name="clien-email" title="Ingrese la dirección de su Email" maxlength="50">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-home"></i>&nbsp; Ingrese su dirección</label>
                      <input class="form-control" type="text" required name="clien-dir" title="Ingrese la direción en la reside actualmente" maxlength="100">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <legend><i class="fa fa-lock"></i> &nbsp; Datos de la cuenta</legend>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp; Ingrese su nombre de usuario</label>
                      <input class="form-control" type="text" required name="clien-name" title="Ingrese su nombre. Máximo 15 caracteres (solamente letras y numeros sin espacios)" pattern="[a-zA-Z0-9]{1,15}" maxlength="15">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-lock"></i>&nbsp; Introduzca una contraseña</label>
                      <input class="form-control" type="password" id="txtPassword" required name="clien-pass" title="Defina una contraseña para iniciar sesión">
                    </div>
                    <div id="strengthMessage"></div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group label-floating">
                      <label class="control-label"><i class="fa fa-lock"></i>&nbsp; Repita la contraseña</label>
                      <input class="form-control" type="password" id="txtPassword2" required name="clien-pass2" title="Repita la contraseña">
                    </div>
                    <label id="poo"></label><br>

                  </div>
           
                </div>
              </div>
              <br>
              <p><button type="submit" class="btn btn-primary btn-block btn-raised">Registrarse</button></p>
            </form>

          </div>
        </div>
        <div class="col-sm-5 text-center">
          <figure>
            <img src="assets/logos/negroamarillo.png" alt="store" class="img-responsive">
          </figure>
        </div>  
           <div class="col-sm-5">
            <br><br><br><br><br><br><br>
        <h3>Criterios de contraseña</h3>
  <ul>
    <li id="criteriop0">Debe tener más de 6 carácteres</li>
    <li id="criteriop1">Debe tener una letra mayúscula</li>
    <li id="criteriop2">Debe tener un caracter especial (@,/,*, etc.)</li>
    <li id="criteriop3">Debe tener letras minúsculas</li>
    <li id="criteriop4">Debe tener mínimo un número</li>
  </ul>
        </div>
      </div>
    </div>
  </section>
  <?php include './inc/footer.php'; ?>
</body>

</html>