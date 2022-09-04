<?php
session_start();
require './fpdf/fpdf.php';
include '../library/cn.php';

$consulta = "SELECT * FROM venta";
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
        $this->Cell(110, 1, utf8_decode('Lista de Pedidos'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(10);
        $this->SetFont('Times', 'B', 15);
        
        $this->Cell(10,10,'#',1,0,'C',0);
        $this->Cell(70,10,'Fecha',1,0,'C',0);
        $this->Cell(40,10,'CI Cliente',1,0,'C',0);
        $this->Cell(40,10,'Total',1,0,'C',0);
        $this->Cell(40,10,'Estado',1,0,'C',0);
        $this->Cell(30,10,utf8_decode('# Depósito'),1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Tipo de envío'),1,1,'C',0);
       
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
$pdf->SetFont("Times", "", 12);


while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(10,10,$row['NumPedido'],1,0,'C',0);
    $pdf->Cell(70,10,utf8_decode($row['Fecha']),1,0,'C',0);
    $pdf->Cell(40,10,$row['NIT'],1,0,'C',0);
    $pdf->Cell(40,10,$row['TotalPagar'],1,0,'C',0);
    $pdf->Cell(40,10,$row['Estado'],1,0,'C',0);
    $pdf->Cell(30,10,$row['NumeroDeposito'],1,0,'C',0);
    $pdf->Cell(40,10,$row['TipoEnvio'],1,1,'C',0);
   
}


$fechaActual = date('d-m-Y');
$pdf->Output('Reporte Pedidos '.$fechaActual.'.pdf','I');

