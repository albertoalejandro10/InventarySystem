<?php

class ControladorVentas
{
    public static function ctrMostrarVentas($item, $valor)
    {
        $tabla = "ventas";
        $respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

        return $respuesta;
    }
}
