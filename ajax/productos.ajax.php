<?php

require_once "../controllers/ControladorProductos.php";
require_once "../models/ModeloProductos.php";

class AjaxProductos{

    public $idCategoria;

    public function ajaxCrearCodigoProducto(){
  
      $item = "id_categoria";
      $valor = $this->idCategoria;
  
      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);
  
      echo json_encode($respuesta);
  
    }
}

/*GENERAR CÓDIGO A PARTIR DE ID CATEGORIA*/ 

if(isset($_POST["idCategoria"])){

    $codigoProducto = new AjaxProductos();
    $codigoProducto->idCategoria = $_POST["idCategoria"];
    $codigoProducto->ajaxCrearCodigoProducto();
  
  }
