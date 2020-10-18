<?php

class ControladorVentas
{
    public static function ctrMostrarVentas($item, $valor)
    {
        $tabla = "ventas";
        $respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrCrearVenta()
    {
        if (isset($_POST["nuevaVenta"])) {
            /* Actualizar las compras del cliente y reducir el stock y aumentar las ventas de los productos */

            $listaProductos = json_decode($_POST["listaProductos"], true);

            $totalProductosComprados = array();

            foreach ($listaProductos as $key => $value) {
                array_push($totalProductosComprados, $value["cantidad"]);
                $tablaProductos = "productos";
                $item = "id";
                $valor = $value["id"];
                $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

                $item1a = "ventas";
                $valor1a = $value["cantidad"] + $traerProducto["ventas"];

                $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

                $item1b = "stock";
                $valor1b = $value["stock"];

                $nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);
            }

            $tablaClientes = "clientes";

            $item = "id";
            $valor = $_POST["seleccionarCliente"];

            $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

            $item1 = "compras";
            $valor1 = array_sum($totalProductosComprados) + $traerCliente["compras"];

            $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1, $valor1, $valor);

            /* GUARDAR LA COMPRA */	

			$tabla = "ventas";

			$datos = array("id_vendedor"=>$_POST["idVendedor"],
						   "id_cliente"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["nuevaVenta"],
						   "productos"=>$_POST["listaProductos"],
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);

			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}
        }
    }
}
