<?php
session_start();                                                                                                                                                                             
require_once("../model/categoria.php");

include '../library/configServer.php';
include '../library/consulSQL.php';


$obj= new categoria();
$result = $obj->consultar($_POST['valor']);



  echo  "<table class='table table-striped table-hover' id='tabla2'>
    <thead>
        <tr>
           
            <th class='text-center'>#</th>
            <th class='text-center'>Código</th>
            <th class='text-center'>Nombre</th>
            <th class='text-center'>Descripción</th>
            <th class='text-center'>Actualizar</th>
            <th class='text-center'>Eliminar</th>
           
        </tr>
    </thead>
    <tbody>";
    



       $f=1;
     
        while ($fila = mysqli_fetch_assoc($result)) {
           
            echo "
            <tr>
            
              
              
                <td class='text-center'>".$f."</td>
                <td class='text-center'>".$fila['CodigoCat']."</td>
                <td class='text-center'>".$fila['Nombre']."</td>
                <td class='text-center'>".$fila['Descripcion']."</td>
               
               
      
                  
                  <td class='text-center'>
	                        		<a href='configAdmin.php?view=categoryinfo&code=".$fila['CodigoCat']."' class='btn btn-raised btn-xs btn-success'>Actualizar</a>



	                        	</td>

                <td class='text-center'>
                            <form action='process/delcategori.php' method='POST' class='FormCatElec' data-form='delete'>
                                <input type='hidden' name='categ-code' value='".$fila['CodigoCat']."'>
                                <button type='submit' class='btn btn-raised btn-xs btn-danger'>Eliminar</button>	
                            </form>
                        </td> 

           
      
          </tr>";
          $f++;

        }
    echo 
    "</tbody>
                </table>";




echo
" <script>
$('.exit-system').on('click', function(e){
    e.preventDefault();
    swal({
        title: '¿Quieres salir del sistema?',   
        text: 'Estas seguro que quieres cerrar la sesión actual y salir del sistema',   
        type: 'warning',   
        showCancelButton: true,   
        confirmButtonColor: '#16a085',   
        confirmButtonText: 'Si, salir',
        cancelButtonText: 'No, cancelar',
        closeOnConfirm: false,
        animation: 'slide-from-top'
    }, function(){
        window.location='process/logout.php';
    });
}); 

</script>";



    ?>