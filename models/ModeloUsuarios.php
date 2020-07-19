<?php 

require_once "Conexion.php";

class ModeloUsuarios{
    /*Mostrar usuarios*/
    public static function mdlMostrarUsuarios($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();
    }
}