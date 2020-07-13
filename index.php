<?php

require_once "controllers/ControladorPlantilla.php";
require_once "controllers/ControladorUsuarios.php";
require_once "controllers/ControladorCategorias.php";
require_once "controllers/ControladorProductos.php";
require_once "controllers/ControladorClientes.php";
require_once "controllers/ControladorVentas.php";


require_once "models/ModeloUsuarios.php";
require_once "models/ModeloCategorias.php";
require_once "models/ModeloProductos.php";
require_once "models/ModeloClientes.php";
require_once "models/ModeloVentas.php";



$plantilla = new ControladorPlantilla();

$plantilla->ctrPlantilla();
