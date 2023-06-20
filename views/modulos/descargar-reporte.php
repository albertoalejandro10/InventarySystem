<?php
require_once "../../controllers/ControladorVentas.php";
require_once "../../models/ModeloVentas.php";
require_once "../../controllers/ControladorClientes.php";
require_once "../../models/ModeloClientes.php";
require_once "../../controllers/ControladorUsuarios.php";
require_once "../../models/ModeloUsuarios.php";

$reporte = new ControladorVentas();
$reporte->ctrDescargarReporte();