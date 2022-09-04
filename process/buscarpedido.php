<?php
$mysqli = new mysqli("localhost","vivamexi_4DM1Nm","VMm@573R","vivamexi_dbmaster");

$salida="";
$query="SELECT * FROM venta ORDER BY NumPedido";

if (isset($_POST['consulta'])) {
    $q=$mysqli->real_escape_string($_POST['consulta']);
    $query="SELECT NumPedido, Fecha, NIT, TotalPagar, Estado, NumeroDeposito, TipoEnvio 
    FROM venta WHERE NumeroDeposito LIKE '%".$q."%' OR Fecha LIKE '%".$q."%'";
 }
 $resultado=$mysqli->query($query);
 if ($resultado->num_rows>0) {
    $salida.="
    <table class='table table-striped table-hover'>
    <thead>
        <tr>
           
            <th class='text-center'>#</th>
            <th class='text-center'>Fecha</th>
            <th class='text-center'>C.I./RUC</th>
            <th class='text-center'>Valor pagado</th>
            <th class='text-center'>Estado</th>
            <th class='text-center'>Número de depósito</th>
            <th class='text-center'>Tipo de envío</th>
           
          
        </tr>
    </thead>
    <tbody>";
    
   
       
     
        while ($fila = $resultado->fetch_assoc()) {
            $salida.="
            <tr>
            
              
                <td class='text-center'>".$fila['NumPedido']."</td>
                <td class='text-center'>".$fila['Fecha']."</td>
                <td class='text-center'>".$fila['NIT']." </td>
                <td class='text-center'>".$fila['TotalPagar']."</td>
                <td class='text-center'>".$fila['Estado']."</td>
                <td class='text-center'>".$fila['NumeroDeposito']."</td>
                <td class='text-center'>".$fila['TipoEnvio']."</td>
                            
               
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