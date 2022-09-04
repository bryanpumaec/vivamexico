<!DOCTYPE html>
<html lang="es">
<head>
    <title>VivaMexCurrier</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>


    <section id="new-prod-index">    
         <div class="container">

      <div class="jumbotron">
          <h2 class="display-3 text-center">¡Entrega Inmediata!</h2>
          <h1 class="display-3 text-center">con VivaMexCurrier</h1>

        
      </div>


            <div class="row">
              	<?php
                  include 'library/configServer.php';
                  include 'library/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("SELECT * FROM producto WHERE Stock > 0 AND Estado='Activo' ORDER BY id DESC LIMIT 7");
                  $totalproductos = mysqli_num_rows($consulta);
                  if($totalproductos>0){
                      while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                ?>
              
                <?php
                     }   
                  }else{
                      echo '<h2>No hay productos registrados en la tienda</h2>';
                  }  
              	?>  
                <div class="col-sm-6 text-center">
                    <figure>
                      <img src="assets/logos/camionvivamex.png" alt="store" class="img-responsive">
                    </figure>
                </div>   
                <div class="col-sm-6 text-center">
            <br>
                    <div >
                       
                       <br><br>
                       
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-xs-12">
                                <legend><i class="fa fa-car"></i> &nbsp; Contactanos</legend>
                              </div>
                            <h1>Teléfono:</h1>
                            <h2>+593 969 750 973</h2>
                            <h1>Dirección:</h1>
                            <h2>Av. Teodoro Gómez y Juana Atabalipa </h2>
                            <h1>Horarios de atención</h1>
                            <h2>Lunes a Viernes - de 12h00 a 19h30</h2>
                            <h2>Sábado y Domingo - de 14h00 a 18h30</h2>
                             
                              
                              
                             
                            </div>
                          </div>
                                         
                    </div> 
                </div>

             
                </div>  
                </div>
                <hr class="my-2">
                <div>
                 <h1 class="tittles-pages-logo text-center">Para Reembolsos</h1>
                 <h3 class="text-center">Llena el siguiente formulario:</h3>
                 <div>
                 <div id="container-form">
                      
                       <form class="FormCatElec" action="process/regReembolso.php" role="form" method="POST" data-form="save">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-xs-12">
                                <legend><i class="fa fa-user"></i> &nbsp; Datos de cliente</legend>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp; Ingrese su número de cedula</label>
                                  <input class="form-control" type="number" required name="clien-cedula" pattern="[0-9]{1,15}" title="Ingrese su número de cedula. Solamente números" maxlength="10" >
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
                             <br>
                              <div class="col-xs-12">
                                <legend><i class="fa fa-refresh"></i> &nbsp; Datos del pedido a reembolsar</legend>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label"><i class="fa fa-book"></i>&nbsp; Número de depósito</label>
                                    <input class="form-control" type="text" required name="clien-nit" title="Indique el número de depósito">
                                </div>
                              </div>
                              <div class="col-xs-12 col-xs-6">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-date" aria-hidden="true"></i>&nbsp; </label>
                                    <input class="form-control" type="date" required name="clien-fechapedido" title="Ingrese la fecha del pedido">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                  <label class="control-label"><i class="fa fa-dollar"></i>&nbsp; Ingrese el monto pagado</label>
                                  <input class="form-control" type="text" required name="clien-montopagado" title="Indique el monto pagado">
                                </div>
                              </div>
                              <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label"><i class="fa fa-comment"></i>&nbsp; Detalle su pedido</label>
                                    <input class="form-control" type="text" required name="clien-detallepedido" title="Detalle su pedido">
                                </div>
                              </div>
                            </div>
                          </div>
                          <p><button type="submit" class="btn btn-primary btn-block btn-raised">Enviar Formulario</button></p>
                        </form> 
                    </div> 

             </div>
         </div>
    </section>
 
    <?php include './inc/footer.php'; ?>
</body>
</html>