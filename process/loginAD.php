<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

$nombre = consultasSQL::clean_string($_POST['nombre-login']);
$clave = consultasSQL::clean_string(md5($_POST['clave-login']));

if ($nombre != "" && $clave != "") {

        $verAdmin = ejecutarSQL::consultar("SELECT * FROM administrador WHERE Nombre='$nombre' AND Clave='$clave'");
        $AdminC = mysqli_num_rows($verAdmin);
        if ($AdminC > 0) {
            $filaU = mysqli_fetch_array($verAdmin, MYSQLI_ASSOC);
            $_SESSION['nombreAdmin'] = $nombre;
            $_SESSION['claveAdmin'] = $clave;
            $_SESSION['UserType'] = "Admin";
            $_SESSION['adminID'] = $filaU['id'];
            echo '<script> location.href="configAdmin.php"; </script>';
        } else {
            echo 'Error nombre o contraseña invalido';
        }
    
    


} else {
    echo 'Error campo vacío<br>Intente nuevamente';
}
