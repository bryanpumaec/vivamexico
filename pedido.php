<?php

$total=$_GET['total'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Pedido</title>
  <?php
  include './inc/link.php';
  ?>
</head>

<body id="container-page-index">
  <?php include './inc/navbar.php'; ?>
  <section id="container-pedido">
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
    <div class="container">
      <div class="page-header">
        <h1 class="text-center">PEDIDOS<small class="tittles-pages-logo"></small></h1>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <?php
          require_once "library/configServer.php";
          require_once "library/consulSQL.php";
          if ($_SESSION['UserType'] == "Admin" || $_SESSION['UserType'] == "User") {
            if (isset($_SESSION['carro'])) {
          ?>
              <br><br><br>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-10 col-xs-offset-1">
                    <p class="text-center lead">Selecciona un método de pago</p>
                    <img class="img-responsive center-all-contens" src="assets/logos/blancocolores.png" ">
                            <p class=" text-center">
                    <button class="btn btn-lg btn-raised btn-primary btn-block" data-toggle="modal" data-target="#PagoModalTran">Transaccion Banco Pichincha</button>
                    <button class="btn btn-lg btn-raised btn-info btn-block" data-toggle="modal" data-target="#PagoModalTran2">Transaccion Banco Guayaquil</button>
                    <button class="btn btn-lg btn-raised btn-secondary btn-block">Payphone</button>
                    <center>
                    <div id="pp-button"></div>

                    <div id="smart-button-container"> </div>
                    <div id="paypal-button-container"></div>
                    </center>
                    </p>

                    <p class="text-center">Los productos serán enviados una vez que se procese el pago</p>
                    <br>
                    </p>

                  </div>
                </div>
              </div>
          <?php
            } else {
              echo '<p class="text-center lead">No tienes pedidos pendientes de pago</p>';
            }
          } else {
            echo '<p class="text-center lead">Inicia sesión para realizar pedidos</p>';
          }
          ?>
        </div>
      </div>
    </div>
    <?php
    if ($_SESSION['UserType'] == "User") {
      $consultaC = ejecutarSQL::consultar("SELECT * FROM venta WHERE NIT='" . $_SESSION['UserNIT'] . "'");
    ?>
      <div class="container" style="margin-top: 70px;">
        <div class="page-header">
          <h1>Mis pedidos</h1>
        </div>
      </div>
      <?php
      if (mysqli_num_rows($consultaC) >= 1) {
      ?>
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <table class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Envío</th>
                    <th>Datos de Currier</th>
                    <th>Factura</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($rw = mysqli_fetch_array($consultaC, MYSQLI_ASSOC)) {
                  ?>
                    <tr>
                      <td><?php echo $rw['Fecha']; ?></td>
                      <td>$<?php echo $rw['TotalPagar']; ?></td>
                      <td>
                        <?php
                        switch ($rw['Estado']) {
                          case 'Enviado':
                            echo "En camino";
                            break;
                          case 'Pendiente':
                            echo "En espera";
                            break;
                          case 'Entregado':
                            echo "Entregado";
                            break;
                          default:
                            echo "Sin informacion";
                            break;
                        }
                        ?>
                      </td>
                      <td><?php echo $rw['TipoEnvio']; ?></td>
                      <td><a href="infoCurrier.php" target="_blank">VivaMexCurrier</a></td>
                      <td><a href="./report/recibo.php?id=<?php echo $rw['NumPedido']; ?>" class="btn btn-raised btn-xs btn-primary btn-block" target="_blank">Imprimir</a></td>
                    </tr>
                  <?php
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
    <?php
      } else {
        echo '<p class="text-center lead">No tienes ningun pedido realizado</p>';
      }
      mysqli_free_result($consultaC);
    }
    ?>
  </section>
  <div class="modal fade" id="PagoModalTran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <form class="modal-content FormCatElec" action="process/confirmcompra.php" method="POST" role="form" data-form="save">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Pago por transaccion Banco Pichincha</h4>
        </div>
        <div class="modal-body">
          <?php
          $consult1 = ejecutarSQL::consultar("SELECT * FROM cuentabanco");
          $consulIVA = ejecutarSQL::consultar("SELECT * FROM iva");
          if (mysqli_num_rows($consult1) >= 1) {
            $datBank = mysqli_fetch_array($consult1, MYSQLI_ASSOC);
            if (mysqli_num_rows($consulIVA) >= 1) {
              $datIVA = mysqli_fetch_array($consulIVA, MYSQLI_ASSOC);
          ?>

              <p>Por favor haga el deposito de <strong>$<?php echo $total?> USD</strong> en la siguiente cuenta de banco e ingrese el numero de deposito que se le proporciono.</p><br>
              <p>

                <strong>Nombre del banco:</strong> <?php echo $datBank['NombreBanco']; ?><br>
                <strong>Numero de cuenta:</strong> <?php echo $datBank['NumeroCuenta']; ?><br>
                <strong>Nombre del beneficiario:</strong> <?php echo $datBank['NombreBeneficiario']; ?><br>
                <strong>Tipo de cuenta:</strong> <?php echo $datBank['TipoCuenta']; ?><br><br>

              </p>
              <?php if ($_SESSION['UserType'] == "Admin") : ?>
                <div class="form-group">
                  <label>Numero de deposito</label>
                  <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="50" required="">
                </div>
                <div class="form-group">
                  <span>Tipo De Envio</span>
                  <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                    <option value="" disabled="" selected="">Selecciona una opción</option>
                    <option value="Envio Por Currier">Envio a domicilio</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>DNI del cliente</label>
                  <input class="form-control" type="text" name="Cedclien" placeholder="DNI del cliente" maxlength="15" required="">
                </div>
                <div class="form-group">
                  <input type="file" name="comprobante">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Seleccione la imagen del comprobante...">
                    <span class="input-group-btn input-group-sm">
                      <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                      </button>
                    </span>
                  </div>
                  <p class="help-block"><small>Tipos de archivos admitidos, imagenes .jpg y .png. Maximo 5 MB</small></p>
                </div>
              <?php else : ?>
                <div class="form-group">
                  <label>Numero de deposito</label>
                  <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="50" required="">
                </div>

                <div class="form-group">
                  <span>Tipo De Envio</span>
                  <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                    <option value="" disabled="" selected="">Selecciona una opción</option>
                    <option hidden value="Recoger Por Tienda">Recoger Por Tienda</option>
                    <option required value="Envio Por Currier">Envio a domicilio</option>
                  </select>
                </div>

                <input type="hidden" name="Cedclien" value="<?php echo $_SESSION['UserNIT']; ?>">
                <input type="hidden" name="valorIVA" value="<?php echo $datIVA['valor_iva']; ?>">
                <div class="form-group">
                  <input type="file" required name="comprobante">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Seleccione la imagen del comprobante...">
                    <span class="input-group-btn input-group-sm">
                      <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                      </button>
                    </span>
                  </div>
                  <p class="help-block"><small>Tipos de archivos admitidos, imagenes .jpg y .png. Maximo 5 MB</small></p>
                </div>
          <?php
              endif;
            }
          } else {
            echo "Ocurrio un error: Parese ser que no se ha configurado las cuentas de banco";
          }
          mysqli_free_result($consult1);
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm btn-raised" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary btn-sm btn-raised">Confirmar</button>
        </div>
      </form>
    </div>
  </div>




<!--MODAL BANCO GUAYAQUIL-->
<div class="modal fade" id="PagoModalTran2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <form class="modal-content FormCatElec" action="process/confirmcompra.php" method="POST" role="form" data-form="save">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Pago por transaccion Banco Guayaquil</h4>
        </div>
        <div class="modal-body">
          <?php
          $consult1 = ejecutarSQL::consultar("SELECT * FROM cuentabanco WHERE id='2'");
          $consulIVA = ejecutarSQL::consultar("SELECT * FROM iva");
          if (mysqli_num_rows($consult1) >= 1) {
            $datBank = mysqli_fetch_array($consult1, MYSQLI_ASSOC);
            if (mysqli_num_rows($consulIVA) >= 1) {
              $datIVA = mysqli_fetch_array($consulIVA, MYSQLI_ASSOC);
          ?>

              <p>Por favor haga el deposito de <strong>$<?php echo $total?> USD</strong> en la siguiente cuenta de banco e ingrese el numero de deposito que se le proporciono.</p><br>
              <p>

                <strong>Nombre del banco:</strong> <?php echo $datBank['NombreBanco']; ?><br>
                <strong>Numero de cuenta:</strong> <?php echo $datBank['NumeroCuenta']; ?><br>
                <strong>Nombre del beneficiario:</strong> <?php echo $datBank['NombreBeneficiario']; ?><br>
                <strong>Tipo de cuenta:</strong> <?php echo $datBank['TipoCuenta']; ?><br><br>

              </p>
              <?php if ($_SESSION['UserType'] == "Admin") : ?>
                <div class="form-group">
                  <label>Numero de deposito</label>
                  <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="50" required="">
                </div>
                <div class="form-group">
                  <span>Tipo De Envio</span>
                  <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                    <option value="" disabled="" selected="">Selecciona una opción</option>
                    <option value="Envio Por Currier">Envio a domicilio</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>DNI del cliente</label>
                  <input class="form-control" type="text" name="Cedclien" placeholder="DNI del cliente" maxlength="15" required="">
                </div>
                <div class="form-group">
                  <input type="file" name="comprobante">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Seleccione la imagen del comprobante...">
                    <span class="input-group-btn input-group-sm">
                      <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                      </button>
                    </span>
                  </div>
                  <p class="help-block"><small>Tipos de archivos admitidos, imagenes .jpg y .png. Maximo 5 MB</small></p>
                </div>
              <?php else : ?>
                <div class="form-group">
                  <label>Numero de deposito</label>
                  <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="50" required="">
                </div>

                <div class="form-group">
                  <span>Tipo De Envio</span>
                  <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                    <option value="" disabled="" selected="">Selecciona una opción</option>
                    <option hidden value="Recoger Por Tienda">Recoger Por Tienda</option>
                    <option required value="Envio Por Currier">Envio a domicilio</option>
                  </select>
                </div>

                <input type="hidden" name="Cedclien" value="<?php echo $_SESSION['UserNIT']; ?>">
                <input type="hidden" name="valorIVA" value="<?php echo $datIVA['valor_iva']; ?>">
                <div class="form-group">
                  <input type="file" required name="comprobante">
                  <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="Seleccione la imagen del comprobante...">
                    <span class="input-group-btn input-group-sm">
                      <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                      </button>
                    </span>
                  </div>
                  <p class="help-block"><small>Tipos de archivos admitidos, imagenes .jpg y .png. Maximo 5 MB</small></p>
                </div>
          <?php
              endif;
            }
          } else {
            echo "Ocurrio un error: Parese ser que no se ha configurado las cuentas de banco";
          }
          mysqli_free_result($consult1);
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm btn-raised" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary btn-sm btn-raised">Confirmar</button>
        </div>
      </form>
    </div>
  </div>


  <!--  PAYPAL   -
  MODAL GUAYAQUIK
  
  ->

  
  <!-- <script>
    function initPayPalButton() {
        paypal.Buttons({
            env: 'sandbox',
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'pay',

            },

            client: {
                sandbox: 'AfL1EXv5nbnWvPc2oUvmDzj-Ta4WFzoXVKPivPkV4gz4PRF3vUUjfRRUpPIvpDLbpdRPvKL59Ij-Lm3N',
                production: 'AVJBT0M2hCsEdEK5hlRVvm2gjGiIFWvaUvcQaDHagPSJHF8zUpqIlTFWEB5DOzu8SizhpPVOgTKdYiFO'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "amount": {
                            "currency_code": "USD",
                            "value": "<?php echo $total; ?>",
                            "custom": ""
                        }
                    }]
                });
            },


            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    // Full available details
                    console.log(orderData);
                    // window.location="verificador.php?payerID="+data.payerID+"&paymentID="+data.paymentID;
                    //  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    // Show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Gracias por realizar tu pago!</h3>';


                    //OPERACIONES PARA REDUCIR EL STOCK//


                    // Or go to another URL:  actions.redirect('thank_you.html');

                });

            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }

    initPayPalButton();
</script> -->



  <div class="ResForm"></div>
  <?php include './inc/footer.php'; ?>.
</body>

</html>