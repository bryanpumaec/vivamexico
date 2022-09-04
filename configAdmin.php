<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    include './process/securityPanel.php';
?>
  <script>
    function iprint(ptarget) {
      ptarget.focus();
      ptarget.print();
    }
  </script>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Admin</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-configAdmin">
    <?php include './inc/navbar.php'; ?>
    <section id="prove-product-cat-config">
        <div class="container">
          <div class="page-header">
            <h1>Panel de administración <small class="tittles-pages-logo"></small></h1>
          </div>
          <!--====  Nav Tabs  ====-->
          <ul class="nav nav-tabs nav-justified" style="margin-bottom: 15px;">
            <li>
              <a href="configAdmin.php?view=product">
                <i class="fa fa-cubes" aria-hidden="true"></i> &nbsp; Productos
              </a>
            </li>
            <li>
              <a href="configAdmin.php?view=category">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i> &nbsp; Categorías
              </a>
            </li>
            <li>
              <a href="configAdmin.php?view=ivalist">
                <i class="fa fa-table" aria-hidden="true"></i> &nbsp; IVA
              </a>
            </li>
            <li>
              <a href="configAdmin.php?view=provider">
                <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; Proveedores
              </a>
            </li>
          
            <li>
              <a href="configAdmin.php?view=admin">
                <i class="fa fa-users" aria-hidden="true"></i> &nbsp; Admin
              </a>
            </li>
            <li>
              <a href="configAdmin.php?view=order">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp; Pedidos
              </a>
            </li>
            <li>
              <a href="configAdmin.php?view=bank">
                <i class="fa fa-university" aria-hidden="true"></i> &nbsp; Banco
              </a>
            </li>
            <li>
              <a href="configAdmin.php?view=account">
                <i class="fa fa-address-card" aria-hidden="true"></i> &nbsp; Cuenta
              </a>
            </li>
            <li>
              <a href="visuales/analisis/web/index.php">
                <i class="fa fa-dashboard" aria-hidden="true"></i> &nbsp; Análisis
              </a>
            </li>
          
          </ul>
          <?php
            $content=$_GET['view'];
            $WhiteList=["powerbi","analisis","iva","ivalist","ivainfo","product","productlist","productinfo","productsearch","provider","providerlist","providerinfo","category","categorylist","categoryinfo","admin","adminlist","order","ordersearch","bank","account"];
            if(isset($content)){
              if(in_array($content, $WhiteList) && is_file("./admin/".$content."-view.php")){
                include "./admin/".$content."-view.php";
              }else{
                echo '<h2 class="text-center">Lo sentimos, la opción que ha seleccionado no se encuentra disponible</h2>';
              }
            }else{
              echo '<br>
              <br>
              <br>
              <br>
              
              <h2 class="text-center">Para empezar, por favor escoja una opción del menú de administración</h2>';
            }
          ?>
        </div>
       
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>