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


    public $idProducto;

    public function ajaxEditarProducto(){
  
      $item = "id";
      $valor = $this->idProducto;
  
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

/* Editar producto */
if(isset($_POST["idProducto"])){
  
   $editarProducto = new AjaxProductos();
   $editarProducto -> idProducto = $_POST["idProducto"];
   $editarProducto -> ajaxEditarProducto();
 
}