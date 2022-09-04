<?php
require_once("conexion.php");

class categoria
{
    protected $CodigoCat;
    
    protected $Nombre;

    protected $Descripcion;

 
  
    

public function __construct()
{
$this-> CodigoCat="";
$this-> Nombre="";
$this-> Descripcion="";

}

public function consultar($nom_categoria)
{
 $conex = new BDConexion();
 $conex=$conex->conectar();
 if($nom_categoria == "")
 {

    $sentecia = sprintf("SELECT * FROM categoria");
    }
    else{
    $sentecia = sprintf("SELECT * FROM categoria where Nombre like '%s'","%".$nom_categoria."%");
    }
    $result = mysqli_query($conex, $sentecia);
 return $result;
    
}
}