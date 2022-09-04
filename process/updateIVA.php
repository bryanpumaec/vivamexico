<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

$idiva=consultasSQL::clean_string($_POST['idiva']);
$valor_iva=consultasSQL::clean_string($_POST['valor_iva']);


if(consultasSQL::UpdateSQL("iva", "valor_iva='$valor_iva'", "id='$idiva'")){
    echo '<script>
        swal({
          title: "IVA actualizado",
          text: "Los datos del IVA se actualizaron correctamente",
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