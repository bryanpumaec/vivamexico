<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carrito de compras</title>
    <?php include './inc/link.php'; ?>
</head>

<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>
    <section id="container-pedido">
        <div class="container">
            <?php

            ?>
            <div class="page-header">
                <h1 class="text-center tittles-pages-logo">CARRITO DE COMPRAS <small class="tittles-pages-logo"></small></h1>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-xs-12">
                    <?php

                    require_once "library/configServer.php";
                    require_once "library/consulSQL.php";
                    if (!empty($_SESSION['carro'])) {
                        $suma = 0;
                        $sumaA = 0;
                        echo '<table class="table table-bordered table-hover"><thead><tr class="bg-warning"><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Acciones</th></tr></thead>';
                        foreach ($_SESSION['carro'] as $codeProd) {
                           
                            $impuesto = ejecutarSQL::consultar("SELECT valor_iva FROM iva WHERE id='1'");
                            $iv = mysqli_fetch_array($impuesto, MYSQLI_ASSOC);
                            $consulta = ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='" . $codeProd['producto'] . "'");
                            while ($fila = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
                                $pref = number_format(($fila['Precio'] - ($fila['Precio'] * ($fila['Descuento'] / 100))), 2, '.', '');

                                echo "<tbody>
                                            <tr>
                                                <td>" . $fila['NombreProd'] . "</td>
                                                <td> " . $pref . "</td>
                                                <td> " . $codeProd['cantidad'] . "</td>
                                                <td> " .  number_format($pref * $codeProd['cantidad'],2) . "</td>
                                             
                                                <td>
                                                
                                                    <form action='process/quitarproducto.php' method='POST' class='FormCatElec' data-form=''>
                                                        <input type='hidden' value='" . $codeProd['producto'] . "' name='codigo'>
                                                        <button class='btn btn-danger btn-raised btn-xs'>Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            
                                        </tbody>";
                                $totalprod = $totalprod + ($codeProd['cantidad'] * $pref)+$envio;
                                $subtotal = $totalprod / (1+$iv['valor_iva']/100);
                                $iva = $totalprod - $subtotal;
                                if($totalprod<300){
                                    $envio = 8;
                                }else{
                                    $envio = 0;
                                }
                                $total = $totalprod + $envio;

                            }
                            mysqli_free_result($consulta);
                        }
                        echo
                        '   <tr class="bg-danger">
                            <td colspan="3" align="right" >Subtotal</td>
                            <td><strong>$' . number_format($subtotal, 2) . '</strong></td>
                            </tr> 
                            
                            <tr class="bg-danger">
                            <td colspan="3" align="right">
                            Iva -> '.$iv["valor_iva"].'%
                            </td>
                            <td><strong>$' . number_format($iva, 2) . '</strong></td>
                            </tr>

                            <tr class="bg-warning">
                            <td colspan="3" align="right">Total productos</td>
                            <td><strong>$' . number_format($totalprod, 2) . '</strong></td>
                            </tr>

                            <tr class="bg-success">
                            <td colspan="3" align="right" >Costo de envío (Envío gratis a partir de $300)</td>
                            <td><strong>$' . number_format($envio, 2) . '</strong></td>
                            </tr> 

                            <tr class="bg-primary">
                            <td colspan="3" align="right">Total compra</td>
                            <td><strong name="totalcompra">$' . number_format($total, 2) . '</strong></td>
                            </tr>
                            </table>
                            <div class="ResForm"></div>';
                        echo '
                            <h4 hidden class="text-center tittles-pages-logo">Envío gratis a partir de $300 en el Total de compras</h4>
                            <p class="text-center">
                            <a href="product.php" class="btn btn-primary btn-raised btn-lg">Seguir comprando</a>
                            <a href="process/vaciarcarrito.php" class="btn btn-success btn-raised btn-lg">Vaciar el carrito</a>
                            <a href="pedido.php?total='.$total.'" class="btn btn-danger btn-raised btn-lg">Comprar</a>
                            </p>
                            ';
                    } else {
                        echo '<p class="text-center text-danger lead">El carrito de compras esta vacío</p><br>
                            <a href="product.php" class="btn btn-primary btn-lg btn-raised">Ir a Productos</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>

</html>