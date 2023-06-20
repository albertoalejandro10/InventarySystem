<?php

error_reporting(0);

if (isset($_GET["fechaInicial"])) {
    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];
} else {
    $fechaInicial = null;
    $fechaFinal = null;
}

$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {
    // Capturamos sólo el año y el mes
    $fecha = substr($value["fecha"], 0, 7);

    // Introducir las fechas en arrayFechas
    array_push($arrayFechas, $fecha);

    // Capturamos las ventas
    $arrayVentas = array($fecha => $value["total"]);

    // Sumamos los pagos que ocurrieron el mismo mes
    foreach ($arrayVentas as $key => $value) {
        $sumaPagosMes[$key] += $value;
    }
}

$noRepetirFechas = array_unique($arrayFechas);

?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Gráfico Servicios-Gastos</h3>
    </div>
    <div class="box-body chart-responsive">
        <div class="chart" id="line-chart-ventas" style="height: 260px;"></div>
    </div>
</div>

<script>
// LINE CHART
    var line = new Morris.Line({
    element: 'line-chart-ventas',
    resize: true,
    data: [
        <?php

        if ($noRepetirFechas != null) {
            foreach ($noRepetirFechas as $key) {
                echo "{ y: '".$key."', Gastos: ".$sumaPagosMes[$key]." },";
            }
            echo "{y: '".$key."', Gastos: ".$sumaPagosMes[$key]." }";
        } else {
            echo "{ y: '0', Gastos: '0' }";
        }

        ?>
    ],
    xkey             : 'y',
    ykeys            : ['Gastos'],
    labels           : ['Servicios - Gastos'],
    lineColors       : ['#3c8dbc'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#000000',
    gridStrokeWidth  : 0.4,
    pointSize        : 3,
    preUnits         : 'VES ',
    gridTextSize     : 10,
    gridTextWeight   : 'bold',
    });
</script>