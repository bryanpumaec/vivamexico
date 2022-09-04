<?php

include './mysql.php';

$oMysql = new MySQL();

$response = "";
$rq = $_POST['rq'];


if ($rq == 1) {
    $response = $oMysql->getVendidos();
} else if ($rq == 2) {
    $response = $oMysql->getAlmacen();
} else if ($rq == 3) {
    $response = $oMysql->getIngresos();
} else if ($rq == 4) {
    $response = $oMysql->getDatosGrafica();
}else if ($rq == 5) {
    $response = $oMysql->getDatoGraficaDona();
}else if ($rq == 6) {
    $response = $oMysql->getDatoGraficaBarra();
}else if ($rq == 7) {
    $response = $oMysql->getDatoGraficaBarra2();
}

echo $response;


?>