<p class="lead">
</p>
<ul class="breadcrumb" style="margin-bottom: 5px;">
    <li>
        <a href="configAdmin.php?view=provider">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; IVA
        </a>
    </li>
    <li>
        <a href="configAdmin.php?view=ivalist"><i class="fa fa-list-ol" aria-hidden="true"></i> &nbsp; Impuesto al valor agregado</a>
    </li>
</ul>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="container-form-admin">
                <h3 class="text-primary text-center">Actualizar datos del IVA</h3>
                <?php
                    $code=$_GET['code'];
                    $iva=ejecutarSQL::consultar("SELECT * FROM iva WHERE id='$code'");
                    $prov=mysqli_fetch_array($iva, MYSQLI_ASSOC);
                ?>
                <form action="process/updateIVA.php" method="POST" class="FormCatElec" data-form="update">
                    <input type="hidden" name="idiva" value="<?php echo $prov['id']; ?>">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Valor del IVA</label>
                                    <input class="form-control" type="text" value="<?php echo $prov['valor_iva']; ?>" name="valor_iva" maxlength="30" required="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <p class="text-center"><button type="submit" class="btn btn-primary btn-raised">Actualizar IVA</button></p>
                </form>
            </div>
        </div>
    </div>
</div>