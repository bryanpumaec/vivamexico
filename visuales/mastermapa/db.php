<?php
$servername="localhost";
$username="vivamexi_4DM1Nm";
$password="VMm@573R";
$dbname="vivamexi_dbmaster";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
}else{
	
}

?>