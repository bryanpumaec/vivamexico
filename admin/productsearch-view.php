<p class="lead">
</p>
<ul class="breadcrumb" style="margin-bottom: 5px;">
    <li>
        <a href="configAdmin.php?view=product">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Nuevo producto
        </a>
    </li>
    <li>
        <a href="configAdmin.php?view=productlist"><i class="fa fa-list-ol" aria-hidden="true"></i> &nbsp; Lista de productos</a>
    </li>
    <li>
        <a href="./report/listaproductos.php" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> &nbsp; Generar Reporte</a>
    </li>
</ul>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <br><br>
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h4>Busqueda de productos</h4>
                </div>

                <div class="form-group label-floating">
                    <label class="control-label" for="caja_busqueda">Buscar producto</label>
                    <input class="form-control" type="text" name="caja_busqueda" id="caja_busqueda">
                </div>

                <div id="datos">

                </div>


                <?php if ($numeropaginas >= 1) : ?>
                    <div class="text-center">
                        <ul class="pagination">
                            <?php if ($pagina == 1) : ?>
                                <li class="disabled">
                                    <a>
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="configAdmin.php?view=productlist&pag=<?php echo $pagina - 1; ?>">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>


                            <?php
                            for ($i = 1; $i <= $numeropaginas; $i++) {
                                if ($pagina == $i) {
                                    echo '<li class="active"><a href="configAdmin.php?view=productlist&pag=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo '<li><a href="configAdmin.php?view=productlist&pag=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                            ?>


                            <?php if ($pagina == $numeropaginas) : ?>
                                <li class="disabled">
                                    <a>
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="configAdmin.php?view=productlist&pag=<?php echo $pagina + 1; ?>">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
