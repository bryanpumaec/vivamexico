<p class="lead">
</p>
<ul class="breadcrumb" style="margin-bottom: 5px;">
    <li>
        <a href="infoCurrier.php">
            <i class="fa fa-car" aria-hidden="true"></i> &nbsp; VivaMexCurrier
        </a>
    </li>
    <li>
        <a href="configAdmin.php?view=ordersearch"><i class="fa fa-search" aria-hidden="true"></i> &nbsp; Buscar</a>
    </li>
    <li>
        <a href="./report/listapedidos.php" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> &nbsp; Generar Reporte</a>
    </li>
</ul>
<div class="container">
  <div class="row">
        <div class="col-xs-12">
            <br><br>
            <div class="panel panel-info">
                <div class="panel-heading text-center"><h4>Pedidos de la tienda</h4></div>
            
                <div class="form-group label-floating">
                    <label class="control-label" for="caja_busqueda1">Buscar producto</label>
                    <input class="form-control" type="text" name="caja_busqueda1" id="caja_busqueda1">
                </div>

                <div id="datos1">

                </div>

                <?php if($numeropaginas>=1): ?>
                <div class="text-center">
                  <ul class="pagination">
                    <?php if($pagina == 1): ?>
                        <li class="disabled">
                            <a>
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="configAdmin.php?view=order&pag=<?php echo $pagina-1; ?>">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>


                    <?php
                        for($i=1; $i <= $numeropaginas; $i++ ){
                            if($pagina == $i){
                                echo '<li class="active"><a href="configAdmin.php?view=order&pag='.$i.'">'.$i.'</a></li>';
                            }else{
                                echo '<li><a href="configAdmin.php?view=order&pag='.$i.'">'.$i.'</a></li>';
                            }
                        }
                    ?>
                    

                    <?php if($pagina == $numeropaginas): ?>
                        <li class="disabled">
                            <a>
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="configAdmin.php?view=order&pag=<?php echo $pagina+1; ?>">
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-order" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content" style="padding: 15px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h5 class="modal-title text-center text-primary" id="myModalLabel">Actualizar estado del pedido</h5>
        </div>
        <form action="./process/updatePedido.php" method="POST" class="FormCatElec" data-form="update">
            <div id="OrderSelect"></div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-raised btn-sm">Actualizar</button>
              <button type="button" class="btn btn-danger btn-raised btn-sm" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
      </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        $('.btn-up-order').on('click', function(e){
            e.preventDefault();
            var code=$(this).attr('data-code');
            $.ajax({
                url:'./process/checkOrder.php',
                type: 'POST',
                data: 'code='+code,
                success:function(data){
                    $('#OrderSelect').html(data);
                    $('#modal-order').modal({
                        show: true,
                        backdrop: "static"
                    });  
                }
            });
            return false;

        });
    });
</script>