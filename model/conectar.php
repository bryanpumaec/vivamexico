<?php
$host = "localhost";
$user = "vivamexi_4DM1Nm";
$password = "VMm@573R";
$dbname = "vivamexi_dbmaster";

try{
    $conexion = new PDO ("mysql:host=".$host.";dbname=".$dbname,$user,$password);
    $conexion->exec("SET CHARACTER SET utf8");
    }
    catch (PDOException $e){
            echo "Error en la conexion" . $e->getMessage();
    }

?>