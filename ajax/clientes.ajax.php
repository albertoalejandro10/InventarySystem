<?php

require_once "../controllers/ControladorClientes.php";
require_once "../models/ModeloClientes.php";

class AjaxClientes {

	/* EDITAR CLIENTE */
	public $idCliente;
	public function ajaxEditarCliente() {

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);
	}
}

/* EDITAR CLIENTE */	
if(isset($_POST["idCliente"])){
	$cliente = new AjaxClientes();
	$cliente->idCliente = $_POST["idCliente"];
	$cliente->ajaxEditarCliente();
}