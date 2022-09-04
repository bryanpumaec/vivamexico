<?php
include "../library/cn.php";


$email=$_POST['email'];
$codigo=$_POST['codigo'];
$res=$mysqli->query("SELECT * FROM cliente WHERE Email='$email' AND Codigo='$codigo' ")OR DIE ($mysqli->error);
if(mysqli_num_rows($res)>0){
    $mysqli->query("UPDATE cliente SET Activado='si' WHERE Email='$email'");
    header('Location: ../cuentavf.php');
}else{
    header('Location: ../error.php');
}


?>