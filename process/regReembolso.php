<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

$ciCliente=consultasSQL::clean_string($_POST['clien-cedula']);
$fullnameCliente=consultasSQL::clean_string($_POST['clien-fullname']);
$apeCliente=consultasSQL::clean_string($_POST['clien-lastname']);
$phoneCliente=consultasSQL::clean_string($_POST['clien-phone']);
$emailCliente=consultasSQL::clean_string($_POST['clien-email']);
$fechaPedido=consultasSQL::clean_string(($_POST['clien-fechapedido']));
$montoPagado=consultasSQL::clean_string(($_POST['clien-montopagado']));
$detallePedido=consultasSQL::clean_string($_POST['clien-detallepedido']);
$nitCliente=consultasSQL::clean_string($_POST['clien-nit']);


if(!$nitCliente=="" && !$ciCliente=="" && !$fullnameCliente=="" && !$apeCliente=="" && !$phoneCliente=="" && !$emailCliente=="" && !$fechaPedido=="" && !$montoPagado=="" && !$detallePedido==""){
        $verificar= ejecutarSQL::consultar("SELECT * FROM reembolso WHERE NIT='".$nitCliente."'");
        $verificaltotal = mysqli_num_rows($verificar);
        if($verificaltotal<=0){
            if(consultasSQL::InsertSQL("reembolso", "NIT, cedula, nombre, apellido, telefono, email, fechapedido, montopagado, detallepedido", "'$nitCliente','$ciCliente','$fullnameCliente','$apeCliente','$phoneCliente','$emailCliente','$fechaPedido','$montoPagado','$detallePedido'")){
                echo '<script>
                    swal({
                      title: "Registro completado",
                      text: "El registro se completó con éxito, en breve uno de nuestros asesores se contactará contigo para ayudarte",
                      type: "success",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Aceptar",
                      cancelButtonText: "Cancelar",
                      closeOnConfirm: false,
                      closeOnCancel: false
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        location.reload();
                      } else {
                        location.reload();
                      }
                    });
                  </script>';
            }else{
               echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
            }
        }else{
            echo '<script>swal("ERROR", "El pedido que ha ingresado ya está registrado en el sistema, por favor ingrese otro número de depósito", "error");</script>';
        }
        mysqli_free_result($verificar);
   
}else {
    echo '<script>swal("ERROR", "Los campos no pueden estar vacíos", "error");</script>';
}