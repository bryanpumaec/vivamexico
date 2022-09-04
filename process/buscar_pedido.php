<?php
require_once("../Model/persona.php");

$obj= new persona();
$result = $obj->consultar($_POST['valor']);



  echo  "<table class='table table-striped table-hover' id='tabla'>
    <thead>
        <tr>
           
            <th class='text-center'>#</th>
            <th class='text-center'>Número de depósito</th>
            <th class='text-center'>Fecha</th>
            <th class='text-center'>C.I./RUC</th>
            <th class='text-center'>Total pagado</th>
            <th class='text-center'>Estado</th>
            <th class='text-center'>Envío</th>
            <th class='text-center'>Opciones</th>
            <th class='text-center'>Eliminar</th>
           
          
        </tr>
    </thead>
    <tbody>";
    



       $f=1;
     
        while ($fila = mysqli_fetch_assoc($result)) {
           
            echo "
            <tr>
            
              
              
                <td class='text-center'>".$f."</td>
                <td class='text-center'>".$fila['NumeroDeposito']."</td>
                <td class='text-center'>".$fila['Fecha']."</td>
                <td class='text-center'>".$fila['NIT']."</td>
                <td class='text-center'>".$fila['TotalPagar']."</td>
                <td class='text-center'>".$fila['Estado']."</td>
               
                <td class='text-center'>".$fila['TipoEnvio']."</td>
            
                
               

                <td class='text-center'>   <a href='#!' class='btn btn-raised btn-xs btn-success btn-block btn-up-order' data-code=".$fila['NumPedido'].">Actualizar</a> ";
      


                    echo "
                     <a href='./assets/comprobantes/".$fila['Adjunto']."'target='_blank' class='btn 
                    btn-raised btn-xs btn-info btn-block'>Comprobante</a>
                    
                    ";
               
        
                // if(is_file("./assets/comprobantes/".$fila['Adjunto'])){

                //     echo "
                //      <a href='./assets/comprobantes/".$fila['Adjunto']."'target='_blank' class='btn 
                //     btn-raised btn-xs btn-info btn-block'>Comprobante</a>
                    
                //     ";


                //   };

                echo"            

                  <a href='./report/factura.php?id=".$fila['NumPedido']."' class='btn btn-raised btn-xs btn-primary btn-block' target='blank'>Imprimir</a>
               
                  </td>  

     

            <td class='text-center'>
            <form action='process/delPedido.php' method='POST' class='FormCatElec' data-form='delete'>
              <input type='hidden' name='num-pedido' value=".$fila['NumPedido'].">
              <button type='submit' class='btn btn-raised btn-xs btn-danger'>Eliminar</button>  
            </form>
          </td>
      
          </tr>";
          $f++;

        }
    echo 
    "</tbody>
                </table>";
    
    
//     }else{
// $salida.="No existen datos";
// }

// echo $salida;

// $mysqli->close();
echo "
<script>
    $(document).ready(function(){
        $('.btn-up-order').on('click', function(e){
            e.preventDefault();
            var code=$(this).attr('data-code');
            $.ajax({
                url:'./process/checkOrder.php',
                type: 'POST',
                data: 'code='+code,
                success:function(data){
                    $('#OrderSelect').html(data);
                    $('#modal-order').modal({
                        show: true,
                        backdrop: 'static'
                    });  
                }
            });
            return false;

        });
    });
   
</script>
";

?>