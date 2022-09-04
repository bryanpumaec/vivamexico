<?php
include "../library/cn.php";

$email=$_POST['email'];
$token=$_POST['token'];
$codigo=$_POST['codigo'];

$res=$mysqli->query("SELECT * FROM passwords WHERE Email='$email' AND Token='$token' AND Codigo='$codigo'") OR DIE ($mysqli->error);
$correcto=false;
if(mysqli_num_rows($res)>0){
   $fila = mysqli_fetch_row($res);
   $fecha=$fila[4];
   $fecha_actual=date("Y-m-d h:m:s");
   $seconds=strtotime($fecha_actual)-strtotime($fecha);
   $minutos=$seconds/60;
   /*if($minutos>10){
    echo "Token vencido";
   }else{
    echo "Todo correcto";
   }*/

$correcto=true;
header('Location:https://vivamexico.ec/restablecer.php?email='.$email.'&token='.$token.'');

}else{
    header('Location:https://vivamexico.ec/infoToken.php');

}

?>