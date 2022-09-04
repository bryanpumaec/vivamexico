<?php

// No mostrar los errores de PHP
error_reporting(0);

?>
<?php
class BDConexion
{
    public $conexion;

    protected $db;

    private $host;

    private $usu;

    private $cla;

    private $base;

    public function __construct()
    {
        $this ->host = "localhost";
        $this ->usu = "vivamexi_4DM1Nm";
        $this ->cla ="VMm@573R";
        $this ->base = "vivamexi_dbmaster";
    }

    public function conectar()
    {
        $this ->conexion = mysqli_connect($this->host, $this->usu, $this->cla, $this->base);
        mysqli_query($this ->conexion, "SET NAMES 'utf8'");
        if($this->conexion==0) die("error al conectarse con mysql".mysqli_error($this->conexion));
        $this->db=mysqli_select_db($this->conexion, $this->base);
        if($this->db==0) die("error al conectarse con la base de datos".mysqli_error($this->conexion));
        return $this->conexion;
        

    }

}

?>