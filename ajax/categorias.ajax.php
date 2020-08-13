<?php

require_once "../controllers/ControladorCategorias.php";
require_once "../models/ModeloCategorias.php";

class AjaxCategorias{
    
    /* Validar no repetir categoría */
    public $validarCategoria;

    public function ajaxValidarCategoria(){

        $item = "categoria";
        $valor = $this->validarCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }
}

/* Validar no repetir categoría */
if(isset($_POST["validarCategoria"])){
    
    $valCategoria = new AjaxCategorias();
    $valCategoria->validarCategoria = $_POST["validarCategoria"];
    $valCategoria->ajaxValidarCategoria();

}