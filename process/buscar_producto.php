<?php                                                               
require_once("../model/producto.php");


$obj= new producto();
$result = $obj->consultar($_POST['valor']);



  echo  "<table class='table table-striped table-hover' id='tabla3'>
    <thead>
        <tr>
           
            <th class='text-center'>#</th>
            <th class='text-center'>Código</th>
            <th class='text-center'>Nombre</th>
            <th class='text-center'>Categoría</th>
            <th class='text-center'>Precio</th>
            <th class='text-center'>Modelo</th>
            <th class='text-center'>Marca</th>
            <th class='text-center'>Stock</th>
            <th class='text-center'>Proveedor</th>
            <th class='text-center'>Estado</th>
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
                <td class='text-center'>".$fila['CodigoProd']."</td>
                <td class='text-center'>".$fila['NombreProd']."</td>
                <td class='text-center'>".$fila['CodigoCat']."</td>
                <td class='text-center'>".$fila['Precio']."</td>
                <td class='text-center'>".$fila['Modelo']."</td>
                <td class='text-center'>".$fila['Marca']."</td>
                <td class='text-center'>".$fila['Stock']."</td>
                <td class='text-center'>".$fila['NITProveedor']."</td>
                <td class='text-center'>".$fila['Estado']."</td>

                
               

               
      
                  
                  <td class='text-center'>
	                        		<a href='configAdmin.php?view=productinfo&code=".$fila['CodigoProd']."' class='btn btn-raised btn-xs btn-success'>Actualizar</a>



	                        	</td>

                <td class='text-center'>
                            <form action='process/delprod.php' method='POST' class='FormCatElec' data-form='delete'>
                                <input type='hidden' name='prod-code' value='".$fila['CodigoProd']."'>
                                <button type='submit' class='btn btn-raised btn-xs btn-danger'>Eliminar</button>	
                            </form>
                        </td> 

           
      
          </tr>";
          $f++;

        }
    echo 
    "</tbody>
                </table>";

            
            ?>