
<?php
include "../library/cn.php";


$email=$_POST['clien-email'];
$bytes=random_bytes(5);
$token=bin2hex($bytes);

include "../model/mailrec.php";

if($enviado){
$mysqli->query("INSERT INTO passwords (Email, Token, Codigo) 
VALUES ('$email','$token','$codigo') ")OR DIE ($mysqli->error);
header('Location:../inforec.php');
}


?>