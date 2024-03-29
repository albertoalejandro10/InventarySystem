<?php

// Mostrar errores en php error log
ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", "C:/laragon/www/InventarySystem/php_error_log");

require_once __DIR__ . "/controllers/ControladorPlantilla.php";
require_once __DIR__ . "/controllers/ControladorUsuarios.php";
require_once __DIR__ . "/controllers/ControladorCategorias.php";
require_once __DIR__ . "/controllers/ControladorProductos.php";
require_once __DIR__ . "/controllers/ControladorClientes.php";
require_once __DIR__ . "/controllers/ControladorVentas.php";


require_once __DIR__ . "/models/ModeloUsuarios.php";
require_once __DIR__ . "/models/ModeloCategorias.php";
require_once __DIR__ . "/models/ModeloProductos.php";
require_once __DIR__ . "/models/ModeloClientes.php";
require_once __DIR__ . "/models/ModeloVentas.php";


$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
