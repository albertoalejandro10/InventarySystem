<?php

require_once "../controllers/ControladorCategorias.php";
require_once "../models/ModeloCategorias.php";

class AjaxCategorias {
    /* Validar no repetir categoría */
    public $validarCategoria;
    public function ajaxValidarCategoria() {
        $item = "categoria";
        $valor = $this->validarCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }
    
    /* Editar Categoria */
    public $idCategoria;
    
    public function ajaxEditarCategoria() {
        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }

}

/* Validar no repetir categoría */
if(isset($_POST["validarCategoria"])) {
    $valCategoria = new AjaxCategorias();
    $valCategoria->validarCategoria = $_POST["validarCategoria"];
    $valCategoria->ajaxValidarCategoria();
}

/* Editar Categoria */
if(isset($_POST["idCategoria"])){
    $categoria = new AjaxCategorias();
    $categoria->idCategoria = $_POST["idCategoria"];
    $categoria->ajaxEditarCategoria();
}