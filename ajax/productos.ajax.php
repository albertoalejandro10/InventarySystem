<?php

require_once "../controllers/ControladorProductos.php";
require_once "../models/ModeloProductos.php";

require_once "../controllers/ControladorCategorias.php";
require_once "../models/ModeloCategorias.php";

class AjaxProductos
{

  /*
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  */
    public $idCategoria;

    public function ajaxCrearCodigoProducto()
    {
        $item = "id_categoria";
        $valor = $this->idCategoria;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }


    /*
    EDITAR PRODUCTO
    */

    public $idProducto;
    public $traerProductos;
    public $nombreProducto;

    public function ajaxEditarProducto()
    {
        if ($this->traerProductos == "ok") {
            $item = null;
            $valor = null;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);
        } elseif ($this->nombreProducto != "") {
            $item = "descripcion";
            $valor = $this->nombreProducto;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);
        } else {
            $item = "id";
            $valor = $this->idProducto;

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

            echo json_encode($respuesta);
        }
    }
}


/*
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
*/

if (isset($_POST["idCategoria"])) {
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto -> ajaxCrearCodigoProducto();
}
/*
EDITAR PRODUCTO
*/

if (isset($_POST["idProducto"])) {
    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();
}

/*
TRAER PRODUCTO
*/

if (isset($_POST["traerProductos"])) {
    $traerProductos = new AjaxProductos();
    $traerProductos -> traerProductos = $_POST["traerProductos"];
    $traerProductos -> ajaxEditarProducto();
}

/*
TRAER PRODUCTO
*/

if (isset($_POST["nombreProducto"])) {
    $traerProductos = new AjaxProductos();
    $traerProductos -> nombreProducto = $_POST["nombreProducto"];
    $traerProductos -> ajaxEditarProducto();
}
