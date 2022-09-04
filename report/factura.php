<?php
session_start();
require './fpdf/fpdf.php';
include '../library/configServer.php';
include '../library/consulSQL.php';
$id = $_GET['id'];
$sVenta = ejecutarSQL::consultar("SELECT * FROM venta WHERE NumPedido='$id'");
$dVenta = mysqli_fetch_array($sVenta, MYSQLI_ASSOC);
$sCliente = ejecutarSQL::consultar("SELECT * FROM cliente WHERE NIT='" . $dVenta['NIT'] . "'");
$dCliente = mysqli_fetch_array($sCliente, MYSQLI_ASSOC);
class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('../assets/logos/vivamex.png', 35, 8, 60);
        // Arial bold 15
        $this->SetFont('Times', 'B', 20);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(90, 10, utf8_decode('Viva México EC'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(10);

        $this->SetFont('Times', '', 12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(107, 10, utf8_decode('Av. Teodoro Gómez y Juana Atabalipa'), 0, 0, 'C');

        // Salto de línea
        $this->Ln(10);
        $this->SetFont('Times', 'i', 12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(72, 10, utf8_decode('+593 969 750 973'), 0, 0, 'C');

        // Salto de línea
        $this->Ln(10);
        $this->SetFont('Times', 'B', 12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(75, 10, utf8_decode('Carlosama Mayra'), 0, 0, 'C');
        $this->Ln(20);
        $this->SetFont('Times', 'B', 25);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(35, 10, utf8_decode('Comprobante de venta'), 0, 0, 'C');

        // Salto de línea
        $this->Ln(10);
        
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
ob_end_clean();

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Times", "", 20);

$pdf->SetFillColor(0, 255, 255);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(0, 10, utf8_decode('N°: '.$dVenta['NumeroDeposito']), 1, 1, 'C');
$pdf->Ln(12);
$pdf->SetFillColor(0, 255, 255);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(35, 5, utf8_decode('DATOS DEL CLIENTE'), 0);
$pdf->Ln(12);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(35, 5, utf8_decode('Fecha del pedido: '), 0);
$pdf->SetFont("Times", "", 12);
$pdf->Cell(50, 5, utf8_decode($dVenta['Fecha']), 0);
$pdf->Ln(12);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(37, 5, utf8_decode('Nombre del cliente: '), 0);
$pdf->SetFont("Times", "", 12);
$pdf->Cell(100, 5, utf8_decode($dCliente['NombreCompleto'] . " " . $dCliente['Apellido']), 0);
$pdf->Ln(12);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(20, 5, utf8_decode('C.I./RUC: '), 0);
$pdf->SetFont("Times", "", 12);
$pdf->Cell(20, 5, utf8_decode($dCliente['NIT']), 0);
$pdf->Ln(12);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(20, 5, utf8_decode('Direccion: '), 0);
$pdf->SetFont("Times", "", 12);
$pdf->Cell(70, 5, utf8_decode($dCliente['Direccion']), 0);
$pdf->Ln(12);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(19, 5, utf8_decode('Telefono: '), 0);
$pdf->SetFont("Times", "", 12);
$pdf->Cell(70, 5, utf8_decode($dCliente['Telefono']), 0);
$pdf->SetFont("Times", "b", 12);
$pdf->Ln(10);
$pdf->Cell(14, 5, utf8_decode('Email: '), 0);
$pdf->SetFont("Times", "", 12);
$pdf->Cell(40, 5, utf8_decode($dCliente['Email']), 0);
$pdf->Ln(10);
$pdf->SetFont("Times", "b", 12);
$pdf->Cell(100, 10, utf8_decode('Producto'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_decode('Precio'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_decode('Cantidad'), 1, 0, 'C');
$pdf->Cell(35, 10, utf8_decode('Total'), 1, 0, 'C');

$pdf->Ln(10);
$pdf->SetFont("Times", "", 12);
$suma = 0;
$impuesto = ejecutarSQL::consultar("SELECT valor_iva FROM iva WHERE id='1'");
$iv = mysqli_fetch_array($impuesto, MYSQLI_ASSOC);
$sDet = ejecutarSQL::consultar("SELECT * FROM detalle WHERE NumPedido='" . $id . "'");
while ($fila1 = mysqli_fetch_array($sDet, MYSQLI_ASSOC)) {
    $consulta = ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='" . $fila1['CodigoProd'] . "'");
    $fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
    $pdf->Cell(100, 10, utf8_decode($fila['NombreProd']), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode('$' . $fila1['PrecioProd']), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode($fila1['CantidadProductos']), 1, 0, 'C');
    $pdf->Cell(35, 10, utf8_decode('$' . $fila1['PrecioProd'] * $fila1['CantidadProductos']), 1, 0, 'C');

    $pdf->Ln(10);
    $suma += $fila1['PrecioProd'] * $fila1['CantidadProductos'];
    $total = $suma ;
    $subtotal = $total / (1 + $dVenta['ValorIVA'] / 100);
    $iva = $total - $subtotal;
    mysqli_free_result($consulta);
    
}
$pdf->Ln(10);
$pdf->SetFont('Times', 'B', 20);
$pdf->Cell(120);
$pdf->Cell(45, 10, utf8_decode('Subtotal: '), 0, 0, '');
$pdf->SetFont('Times', '', 20);
$pdf->Cell(45, 10, utf8_decode('$'.number_format($subtotal,2)), 0, 0, '');
$pdf->Ln(10);
$pdf->SetFont('Times', 'B', 20);
$pdf->Cell(120);
$pdf->Cell(45, 10, utf8_decode('IVA '.$dVenta['ValorIVA'].'%:'), 0, 0, '');
$pdf->SetFont('Times', '', 20);
$pdf->Cell(45, 10, utf8_decode('$'.number_format($iva,2)), 0, 0, '');
$pdf->Ln(10);
$pdf->SetFont('Times', 'B', 20);
$pdf->Cell(120);
$pdf->Cell(45, 10, utf8_decode('Total:'), 0, 0, '');
$pdf->SetFont('Times', '', 20);
$pdf->Cell(45, 10, utf8_decode('$'.number_format($total,2)), 0, 0, '');
$pdf->Ln(10);

$pdf->Output('Factura #' .$dVenta['NumeroDeposito'].'.pdf', 'I',);
mysqli_free_result($sVenta);
mysqli_free_result($sCliente);
mysqli_free_result($sDet);
