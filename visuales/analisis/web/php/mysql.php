<?php

include '../../config.php';

class Mysql{
    private $oConBD = null;

    public function __construct()
    {
        global $usuarioBD, $passBD, $ipBD, $nombreBD;

        $this->usuarioBD = $usuarioBD;
        $this->passBD = $passBD;
        $this->ipBD = $ipBD;
        $this->nombreBD = $nombreBD;
    }

    /**
     * Conexión BD por PDO
     */
    public function conBDPDO()
    {
        try {
            $this->oConBD = new PDO("mysql:host=" . $this->ipBD . ";dbname=" . $this->nombreBD, $this->usuarioBD, $this->passBD);
            return true;
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage() . "\n";
            return false;
        }
    }

/*-------OBTENER DATOS PARA TARJETAS------*/

    public function getVendidos()
    {
        $vendidos = 0;
        try {
            $strQuery = "SELECT SUM(CantidadProductos) as vendidos FROM detalle;";
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($strQuery);
                $pQuery->execute();
                $vendidos = $pQuery->fetchColumn();
            }
        } catch (PDOException $e) {
            echo "MySQL.getVendidos: " . $e->getMessage() . "\n";
            return -1;
        
        }
        return $vendidos;

    }

    public function getAlmacen()
    {
        $almacen = 0;
        try {
            $strQuery = "SELECT SUM(Stock) FROM producto;
            ";
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($strQuery);
                $pQuery->execute();
                $almacen = $pQuery->fetchColumn();
            }
        } catch (PDOException $e) {
            echo "MySQL.getAlmacen: " . $e->getMessage() . "\n";
            return -1;
           
        }
        return $almacen;
    }
    public function getIngresos()
    {
        $ingreso = 0;
        try {
            $strQuery = "SELECT SUM(TotalPagar) FROM venta;
            ";
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($strQuery);
                $pQuery->execute();
                $ingreso = $pQuery->fetchColumn();
            }
        } catch (PDOException $e) {
            echo "MySQL.getIngresos: " . $e->getMessage() . "\n";
            return -1;
           
        }
        return $ingreso;
    }

/*-------OBTENER DATOS PARA GRAFICA Y TABLA------*/
public function getDatosGrafica()
    {
        $jDatos = '';
        $rawdata = array();
        $i = 0;
        try {
            $strQuery = "SELECT sum(TotalPagar) as tPrecio, Fecha FROM venta GROUP BY Fecha ORDER BY `venta`.`Fecha` DESC;
             ";
            
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($strQuery);
                $pQuery->execute();
                $pQuery->setFetchMode(PDO::FETCH_ASSOC);
                while($producto = $pQuery->fetch()) {
                    $oGrafica = new Grafica();
                    $oGrafica->totalPrecio = $producto['tPrecio'];

                    //$oGrafica->totalVendidos = $producto['tVendidos'];

                    $oGrafica->fechaVenta = $producto['Fecha'];
                    
                    $rawdata[$i] = $oGrafica;
                    $i++;
                }
                $jDatos = json_encode( $rawdata);
            }
        } catch (PDOException $e) {
            echo "MySQL.getDatosGrafica: " . $e->getMessage() . "\n";
            return false;
            return -1;
        }
        return $jDatos;
    }

    
    /*-------OBTENER DATOS PARA GRAFICA DONA -----*/
    public function getDatoGraficaDona()
    {
        $jDatos = '';
        $rawdata = array();
        $i = 0;
        try {
            $strQuery = "SELECT p.NombreProd, d.detalle AS CantidadProductos FROM producto p LEFT JOIN( SELECT CodigoProd, SUM(CantidadProductos) detalle FROM detalle GROUP BY CodigoProd ) d ON p.CodigoProd = d.CodigoProd ORDER BY `CantidadProductos` DESC LIMIT 10;
             ";
             
            
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($strQuery);
                $pQuery->execute();
                $pQuery->setFetchMode(PDO::FETCH_ASSOC);
                while($cantidad = $pQuery->fetch()) {
                    $oGrafica = new Grafica();
                    $oGrafica->totalCantidad = $cantidad['CantidadProductos'];

                    //$oGrafica->totalVendidos = $producto['tVendidos'];

                    $oGrafica->nombreProducto = $cantidad['NombreProd'];
                    
                    $rawdata[$i] = $oGrafica;
                    $i++;
                }
                $jDatos = json_encode( $rawdata);
            }
        } catch (PDOException $e) {
            echo "MySQL.getDatosGrafica: " . $e->getMessage() . "\n";
            return false;
            return -1;
        }
        return $jDatos;

}

/*-------OBTENER DATOS PARA GRAFICA BARRA------*/
public function getDatoGraficaBarra()
    {
        $jDatos = '';
        $rawdata = array();
        $i = 0;
        try {
            $strQuery = "SELECT p.NombreProd, d.detalle AS TotalPrecios FROM producto p LEFT JOIN( SELECT CodigoProd, PrecioProd * SUM(CantidadProductos) detalle FROM detalle GROUP BY CodigoProd ) d ON p.CodigoProd = d.CodigoProd ORDER BY `TotalPrecios` DESC LIMIT 10;";
            
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($strQuery);
                $pQuery->execute();
                $pQuery->setFetchMode(PDO::FETCH_ASSOC);
                while($precio = $pQuery->fetch()) {
                    $oGrafica = new Grafica();
                    $oGrafica->totalPrecio_barra = $precio['TotalPrecios'];

                    //$oGrafica->totalVendidos = $producto['tVendidos'];

                    $oGrafica->nombreProducto_barra = $precio['NombreProd'];
                    
                    $rawdata[$i] = $oGrafica;
                    $i++;
                }
                $jDatos = json_encode( $rawdata);
            }
        } catch (PDOException $e) {
            echo "MySQL.getDatosGrafica: " . $e->getMessage() . "\n";
            return false;
            return -1;
        }
        return $jDatos;
      
    }
/*-------OBTENER DATOS PARA GRAFICA BARRA 2------*/
public function getDatoGraficaBarra2()
    {
        $jDatos = '';
        $rawdata = array();
        $i = 0;
        try {
            $strQuery = "SELECT c.NIT, CONCAT(c.NombreCompleto, ' ', c.Apellido) Nombre, c.Direccion, c.Telefono, c.Email, v.venta AS TotalGasto FROM cliente c LEFT JOIN( SELECT NIT, SUM(TotalPagar) venta FROM venta GROUP BY NIT ) v ON c.NIT = v.NIT ORDER BY `TotalGasto` DESC LIMIT 10;";
            
            if ($this->conBDPDO()) {
                $pQuery = $this->oConBD->prepare($strQuery);
                $pQuery->execute();
                $pQuery->setFetchMode(PDO::FETCH_ASSOC);
                while($precio = $pQuery->fetch()) {
                    $oGrafica = new Grafica();
                    $oGrafica->totalPrecio_barra2 = $precio['TotalGasto'];

                    $oGrafica->direccion = $precio['Direccion'];

                    $oGrafica->telefono = $precio['Telefono'];

                    $oGrafica->email = $precio['Email'];

                    $oGrafica->cedula = $precio['NIT'];


                    $oGrafica->nombreCliente = $precio['Nombre'];
                    
                    $rawdata[$i] = $oGrafica;
                    $i++;
                }
                $jDatos = json_encode( $rawdata);
            }
        } catch (PDOException $e) {
            echo "MySQL.getDatosGrafica: " . $e->getMessage() . "\n";
            return false;
            return -1;
        }
        return $jDatos;
      
    }

    


}



class Grafica{
    //public $totalVendidos = 0;
//Bar
    public $totalPrecio = 0;
    public $fechaVenta = 0; 
//Dona
   public $totalCantidad = 0;
   public $nombreProducto = 0;
//BARRA 2
    public $totalPrecio_barra = 0;
    public $nombreProducto_barra = 0;
//BARRA HORIZONTAL
    public $cedula = 0;
    public $nombreCliente = 0;
    public $direccion = 0;
    public $telefono = 0;
    public $email = 0;
    public $totalPrecio_barra2 = 0;
   
  


}

?>