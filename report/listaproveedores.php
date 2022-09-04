<?php
session_start();
require './fpdf/fpdf.php';
include '../library/cn.php';

$consulta = "SELECT * FROM proveedor";
$resultado = $mysqli->query($consulta);


class PDF extends FPDF
{ function Header()
    {
        // Logo
        $this->Image('../assets/logos/vivamex.png', 50, 8, 33);
        $this->Image('../assets/logos/amarillocolores.png', 210, 8, 33);
        // Arial bold 15
        $this->SetFont('Times', 'B', 20);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(110, 10, utf8_decode('Viva México EC'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(10);

        $this->SetFont('Times', '', 12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(110, 10, utf8_decode('Av. Teodoro Gómez y Juana Atabalipa'), 0, 0, 'C');

        // Salto de línea
        $this->Ln(5);
        $this->SetFont('Times', 'i', 12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(110, 10, utf8_decode('+593 969 750 973'), 0, 0, 'C');

        // Salto de línea
        $this->Ln(15);
        $this->SetFont('Times', 'B', 20);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(110, 1, utf8_decode('Lista de Proveedores'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(10);
        $this->SetFont('Times', 'B', 13);
        
        $this->Cell(30,10,utf8_decode('Cédula/RUC'),1,0,'C',0);
        $this->Cell(50,10,'Nombre',1,0,'C',0);
        $this->Cell(110,10,utf8_decode('Dirección'),1,0,'C',0);
        $this->Cell(35,10,utf8_decode('Teléfono'),1,0,'C',0);
        $this->Cell(50,10,utf8_decode('Página Web'),1,1,'C',0);
       
       
    }


    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->SetFont("Times", "", 10);


while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(30,10,$row['NITProveedor'],1,0,'C',0);
    $pdf->Cell(50,10,utf8_decode($row['NombreProveedor']),1,0,'C',0);
    $pdf->Cell(110,10,utf8_decode($row['Direccion']),1,0,'C',0);
    $pdf->Cell(35,10,$row['Telefono'],1,0,'C',0);
    $pdf->Cell(50,10,$row['PaginaWeb'],1,1,'C',0);
  
   
}




$fechaActual = date('d-m-Y');
$pdf->Output('Reporte Proveedores '.$fechaActual.'.pdf','I');
