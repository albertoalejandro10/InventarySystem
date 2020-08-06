<?php

require_once "../controllers/ControladorUsuarios.php";
require_once "../models/ModeloUsuarios.php";


class AjaxUsuarios{

    /*Editar usuario*/

    public $idUsuario;
    public function ajaxEditarUsuario(){

        $item = "id";
        $valor = $this->idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }

}


/* Editar usuario */
if(isset($_POST["idUsuario"])){
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}




?>