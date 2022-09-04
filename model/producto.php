<?php
require_once("conexion.php");

class producto
{
    protected $CodigoProd;
    protected $NombreProd;
    protected $CodigoCat;
    protected $Precio;
    protected $Modelo;
    protected $Marca;
    protected $Stock;
    protected $NITProveedor;
    protected $Estado;


 
  
    

public function __construct()
{
$this-> CodigoProd="";
$this-> NombreProd="";
$this-> CodigoCat="";
$this-> Precio="";
$this-> Modelo="";
$this-> Marca="";
$this-> Stock="";
$this-> NITProveedor="";
$this-> Estado="";


}

public function consultar($nom_producto)
{
 $conex = new BDConexion();
 $conex=$conex->conectar();
 if($nom_producto == "")
 {

    $sentecia = sprintf("SELECT * FROM producto");
    }
    else{
    $sentecia = sprintf("SELECT * FROM producto where NombreProd like '%s'","%".$nom_producto."%");
    }
    $result = mysqli_query($conex, $sentecia);
 return $result;
    
}
}