<p class="lead">
</p>
<ul class="breadcrumb" style="margin-bottom: 5px;">
   
    <li>
        <a href="configAdmin.php?view=ivalist"><i class="fa fa-list-ol" aria-hidden="true"></i> &nbsp; IVA</a>
    </li>
</ul>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
            <br><br>
            <div class="panel panel-info">
                <div class="panel-heading text-center"><h4>Impuesto al Valor Agregado</h4></div>
              	<div class="table-responsive">
                  <table class="table table-striped table-hover">
                      	<thead>
                          	<tr>
								<th class="text-center">#</th>
                              	<th class="text-center">VALOR IVA</th>
                      
                            
                          	</tr>
                      	</thead>
                      	<tbody>
                          	<?php
								$mysqli = mysqli_connect(SERVER, USER, PASS, BD);
								mysqli_set_charset($mysqli, "utf8");

								$pagina = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;
								$regpagina = 30;
								$inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

								$proveedores=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM iva LIMIT $inicio, $regpagina");

								$totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
								$totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);

								$numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

								$cr=$inicio+1;
                                while($prov=mysqli_fetch_array($proveedores, MYSQLI_ASSOC)){
                            ?>
							<tr>
								<td class="text-center"><?php echo $cr; ?></td>
							
								<td class="text-center"><?php echo $prov['valor_iva']; ?></td>
								
								<td class="text-center">
	                        		<a href="configAdmin.php?view=ivainfo&code=<?php echo $prov['id']; ?>" class="btn btn-raised btn-xs btn-success">Actualizar</a>
	                        	</td>
	                        	
                            <?php
                            	$cr++;
                                }
                            ?>
                      	</tbody>
                  </table>
              	</div>
               
                    

                   
                </div>
              
            </div>
        </div>
	</div>
</div>