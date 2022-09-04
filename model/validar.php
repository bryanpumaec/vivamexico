<?php
require_once("conectar.php");

if(!empty($_POST['usuario']) && !empty($_POST['password'])){
    $usuario=$_POST['usuario'];
    $password=(md5($_POST['password']));

    #buscar usuario en la bd

    $searchUser="SELECT * FROM cliente WHERE Nombre=:usuario AND Clave=:pass";
    $stmt1= $conexion->prepare($searchUser);
    $stmt1->bindParam(":usuario",$usuario);
    $stmt1->bindParam(":pass",$password);
    $stmt1->execute();

    #usuario existe o no

    $conteo=$stmt1->rowCount();
    if($conteo > 0){
      $datos = $stmt1->fetch();
      session_start();
      $_SESSION['user']=$datos;
      $_SESSION['acceso']= true;
      header("location: ../index.php");
    }
    else print("Error en la consulta");

}else print("Campos requeridos");

?>