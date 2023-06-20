<?php

$item = null;
$valor = null;
$orden = "id";

$servicios = ControladorVentas::ctrTotalServicios();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

?>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-purple"><i class="ion ion-clipboard"></i></span>
  <div class="info-box-content">
  <span class="info-box-text"><strong>Servicios</strong></span>
  <span class="info-box-number"><small class="text-purple">Servicios totales:&nbsp;</small><?php echo number_format($servicios[0]); ?></span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
  <div class="info-box-content">
  <span class="info-box-text"><strong>Clientes</strong></span>
  <span class="info-box-number"><small class="text-green">Historial de clientes:&nbsp;</small><?php echo number_format($totalClientes); ?></span>
</div>

</div>

</div>


<div class="clearfix visible-sm-block"></div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-red"><i class="fa fa-th"></i></span>
  <div class="info-box-content">
  <span class="info-box-text"><strong>Categorías</strong></span>
  <span class="info-box-number"><small class="text-red">Categorías guardadas:&nbsp;</small><?php echo number_format($totalCategorias); ?></span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-xs-12">
  <div class="info-box">
    <span class="info-box-icon bg-yellow"><i class="fa fa-product-hunt"></i></span>
  <div class="info-box-content">
  <span class="info-box-text"><strong>Productos</strong></span>
  <span class="info-box-number"><small class="text-yellow">Cantidad total:&nbsp;</small><?php echo number_format($totalProductos); ?></span>
</div>

</div>

</div>