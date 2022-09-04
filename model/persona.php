<?php
require_once("conexion.php");

class persona
{
    protected $NumPedido;
    
    protected $Fecha;

    protected $NIT;

    protected $TotalPagar;

    protected $Estado;

    protected $NumeroDeposito;

    protected $TipoEnvio;

    protected $usu_persona;

    protected $Adjunto;

    

public function __construct()
{
$this-> NumPedido="";
$this-> Fecha="";
$this-> NIT="";
$this-> TotalPagar="";
$this-> Estado="";
$this-> NumeroDeposito="";
$this-> TipoEnvio="";
$this-> usu_persona="";
$this-> Adjunto="";

}

public function consultar($num_deposito)
{
 $conex = new BDConexion();
 $conex=$conex->conectar();
 if($num_deposito == "")
 {

    $sentecia = sprintf("SELECT * FROM venta");
    }
    else{
    $sentecia = sprintf("SELECT * FROM venta where NumeroDeposito like '%s'","%".$num_deposito."%");
    }
    $result = mysqli_query($conex, $sentecia);
 return $result;
    
}

public function consultarDato($cod_persona)
{
 $conex = new BDConexion();
 $conex=$conex->conectar();
 $sentecia = sprintf("SELECT * FROM persona where cod_persona='%s'",$cod_persona);
 $result = mysqli_query($conex, $sentecia);
 $row= mysqli_fetch_assoc($result);
 return $row;
    
}

public function guardar($cedula , $nombre, $apellido, $direccion, $telefono, $correo, $usuario, $clave, $estado){
    $conex=new BDConexion();
    $conex=$conex->conectar();
    $sentencia=sprintf("INSERT INTO persona (ci_persona, nom_persona, 
    ape_persona, dir_persona, tel_persona, correo_persona, usu_persona, cla_persona, estado_persona) values('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
    $cedula , $nombre, $apellido, $direccion, $telefono, $correo, $usuario, $clave, $estado);
    $result=mysqli_query($conex, $sentencia);
    return $result;
 }


//  public function actualizar($cedula , $nombre, $apellido, $direccion, $telefono, $correo, $usuario, $clave, $estado,$cod_persona){
//     $conex=new BDConexion();
//     $conex=$conex->conectar();
//     $sentencia=sprintf("UPDATE persona SET ci_persona='%s', nom_persona='%s', 
//     ape_persona='%s', dir_persona='%s', tel_persona='%s', correo_persona='%s', usu_persona='%s', cla_persona='%s', estado_persona='%s' WHERE cod_persona='%s'",
//     $cedula , $nombre, $apellido, $direccion, $telefono, $correo, $usuario, $clave, $estado, $cod_persona);
//     $result=mysqli_query($conex, $sentencia);
//     return $result;
//  }

 
 public function actualizar($cedula,$nombre,$apellido,$direccion,$telefono,$correo,$usuario,$clave,$estado,$cod_persona)
{
$conex=new BDconexion();
$conex=$conex->conectar();
$sentencia=sprintf("UPDATE persona SET ci_persona='%s',nom_persona='%s',ape_persona='%s',dir_persona='%s',
tel_persona='%s',correo_persona='%s',usu_persona='%s',cla_persona='%s',estado_persona='%s' WHERE cod_persona='%s'",
$cedula,$nombre,$apellido,$direccion,$telefono,$correo,$usuario,$clave,$estado,$cod_persona);
$result =mysqli_query($conex,$sentencia);
return $result;
}


 public function eliminar($cod_persona){
    $conex=new BDConexion();
    $conex=$conex->conectar();
    $sentencia=sprintf("DELETE FROM persona WHERE cod_persona='%s'", $cod_persona);
    $result=mysqli_query($conex, $sentencia);
    return $result;
 }



}









?>