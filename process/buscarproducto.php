<?php
$mysqli = new mysqli("localhost","vivamexi_4DM1Nm","VMm@573R","vivamexi_dbmaster");

$salida="";
$query="SELECT * FROM producto ORDER BY id";

if (isset($_POST['consulta'])) {
    $q=$mysqli->real_escape_string($_POST['consulta']);
    $query="SELECT id, CodigoProd, NombreProd, CodigoCat, Precio, Modelo, Marca, Stock, NITProveedor, Estado 
    FROM producto WHERE Modelo LIKE '%".$q."' OR NombreProd LIKE '%".$q."%' OR CodigoProd LIKE '%".$q."' OR Marca LIKE '%".$q."%'";
 }
 $resultado=$mysqli->query($query);
 if ($resultado->num_rows>0) {
    $salida.="
    <table class='table table-striped table-hover'>
    <thead>
        <tr>
           
            <th class='text-center'>Código</th>
            <th class='text-center'>Nombre</th>
            <th class='text-center'>Categoría</th>
            <th class='text-center'>Precio</th>
            <th class='text-center'>Modelo</th>
            <th class='text-center'>Marca</th>
            <th class='text-center'>Stock</th>
            <th class='text-center'>Proveedor</th>
            <th class='text-center'>Estado</th>
          
        </tr>
    </thead>
    <tbody>";
    
   
       
     
        while ($fila = $resultado->fetch_assoc()) {
            $salida.="
            <tr>
            
              
                <td class='text-center'>".$fila['CodigoProd']."</td>
                <td class='text-center'>".$fila['NombreProd']."</td>
                <td class='text-center'>
                ".$fila['CodigoCat']."
                </td>
                <td class='text-center'>".$fila['Precio']."</td>
                <td class='text-center'>".$fila['Modelo']."</td>
                <td class='text-center'>".$fila['Marca']."</td>
                <td class='text-center'>".$fila['Stock']."</td>
                <td class='text-center'>
                ".$fila['NITProveedor']."
                </td>
                <td class='text-center'>".$fila['Estado']."</td>
                <td class='text-center'>
                
                </td>
            </tr>";
      
          

        }
     $salida.="</tbody>
                </table>";
    
    
}else{
$salida.="No existen datos";
}

echo $salida;

$mysqli->close();

?>