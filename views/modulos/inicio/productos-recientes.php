<?php

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

 ?>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title"><strong>Nuevos productos agregados al inventario</strong></h3>
  </div>
  
  <div class="box-body">
    <ul class="products-list product-list-in-box">
    <?php

    for ($i = 0; $i < 8; $i++) {
        echo '<li class="item">
        <div class="product-img">
          <img src="'.$productos[$i]["imagen"].'" alt="Product Image">
        </div>

        <div class="product-info">
          <h5 id="productos-color" class="product-title">
            '.$productos[$i]["descripcion"].'
            <span class="label label-warning pull-right">$'.$productos[$i]["precio_venta"].'</span>
          </h5>
       </div>
      </li>';
    }

    ?>
    </ul>
  </div>
  <div class="box-footer text-center">
    <a href="productos" class="uppercase"><strong>Ver todos los productos</strong></a>
  </div>
</div>
