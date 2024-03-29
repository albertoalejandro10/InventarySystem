<?php

$item = null;
$valor = null;

$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

$arrayClientes = array();
$arraylistaClientes = array();

foreach ($ventas as $key => $valueVentas) {
    foreach ($clientes as $key => $valueClientes) {
        if ($valueClientes["id"] == $valueVentas["id_cliente"]) {

        #Capturamos los Clientes en un array
            array_push($arrayClientes, $valueClientes["nombre"]);

            #Capturamos las nombres y los valores netos en un mismo array
            $arraylistaClientes = array($valueClientes["nombre"] => $valueVentas["neto"]);

            #Sumamos los netos de cada cliente
            foreach ($arraylistaClientes as $key => $value) {
                $sumaTotalClientes[$key] += $value;
            }
        }
    }
}

#Evitamos repetir nombre
$noRepetirNombres = array_unique($arrayClientes);

?>

<!-- Vendedores -->
<div class="box box-success">
	<div class="box-header with-border">
    	<h3 class="box-title">Clientes - Movimientos</h3>
  	</div>
  	<div class="box-body">
		<div class="chart-responsive">
			<div class="chart" id="bar-chart2" style="height: 240px;"></div>
		</div>
  	</div>
</div>

<script>
	
// BAR CHART
var bar = new Morris.Bar({
  element: 'bar-chart2',
  resize: true,
  data: [
     <?php
    
    foreach ($noRepetirNombres as $value) {
        echo "{y: '".$value."', a: '".$sumaTotalClientes[$value]."'},";
    }

  ?>
  ],
  barColors: ['#3c8dbc'],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Ventas'],
  preUnits: 'VES ',
  hideHover: 'auto',
  labelColor: '#FFF'
});


</script>