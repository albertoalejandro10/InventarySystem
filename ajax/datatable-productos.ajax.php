<?php

class TablaProductos{
    /* Mostrar la tabla de productos */
    public function mostrarTablaProductos(){

        $imagen = "<img src='views/img/productos/101/105.png> width:'40px'";

        echo '{
            "data": [
              [
                "1",
                "'.$imagen.'",
                "101",
                "Aspiradora Industrial",
                "Taladros",
                "30",
                "$ 30",
                "$ 30",
                "2020-08-19 08:00:00",
                "botones",
              ],
              [
                "2",
                "'.$imagen.'",
                "102",
                "Plato flotante para Allanadora",
                "Taladros",
                "45",
                "$ 30",
                "$ 30",
                "2020-08-19 08:00:00",
                "botones",
              ],
            ]
          }';
    }
}

/* Activar tabla de productos */
$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();