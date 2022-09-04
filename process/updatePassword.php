<?php

include "../library/cn.php";

$email=$_POST['email'];
$p1=$_POST['clien-pass'];
$p2=$_POST['clien-pass2'];

if($p1==$p2){
    $p1=md5($p1);
    $mysqli->query("UPDATE cliente SET Clave='$p1' WHERE Email='$email'")OR DIE($mysqli->error);
    header('Location:https://vivamexico.ec/passwordvf.php');
}else{
    header('Location:https://vivamexico.ec/error.php');

}


?>