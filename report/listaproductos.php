<?php
session_start();
require './fpdf/fpdf.php';
include '../library/cn.php';

$consulta = "SELECT * FROM producto";
// $categ = ejecutarSQL::consultar("SELECT Nombre FROM categoria WHERE CodigoCat='" . $prod['CodigoCat'] . "'");
// $datc = mysqli_fetch_array($categ, MYSQLI_ASSOC);
$resultado = $mysqli->query($consulta);


class PDF extends FPDF
{
    function Header()
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
        $this->Cell(110, 1, utf8_decode('Lista de productos'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(10);
        $this->SetFont('Times', 'B', 15);

        $this->Cell(5, 10, '#', 1, 0, 'C', 0);
        $this->Cell(80, 10, 'Nombre', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Precio', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Tipo', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Marca', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Stock', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Proveedor', 1, 1, 'C', 0);
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


while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(5, 10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(80, 10, utf8_decode($row['NombreProd']), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, '$' . $row['Precio'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['Modelo'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['Marca'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['Stock'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10,$row['NITProveedor'], 1, 1, 'C', 0);
}

$fechaActual = date('d-m-Y');
$pdf->Output('Reporte Productos ' . $fechaActual . '.pdf', 'I');
