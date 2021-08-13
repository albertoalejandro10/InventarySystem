<?php

class Conexion
{
    public static function conectar()
    {
        $link = new PDO(
            "mysql:host=localhost; dbname=sistema-inventario",
            "root",
            "admin"
        );

        $link->exec("set names utf8");
        return $link;
    }
}
