<?php

class ControladorUsuarios
{
    /*Ingreso de usuario*/

    public static function ctrIngresoUsuario()
    {
        if (isset($_POST["ingUsuario"])) {


            /*Que solo entren letras entre ese rango regular*/
        
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUsuario']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])) {
                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST['ingUsuario'];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {
                        
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];

                        /* Registrar fecha para saber el último login */

                        date_default_timezone_set('America/Caracas');

                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s');

                        $fechaActual = $fecha." ". $hora;

                        $item1 = "ultimo_login";
                        $valor1 = $fechaActual;

                        $item2 = "id";
                        $valor2 = $respuesta["id"];

                        $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if($ultimoLogin == "ok"){
                            echo '<script>
                                window.location = "inicio"
                            </script>';
                        }

                    
                    }else{

                        echo '<br> <div class="alert alert-danger">El usuario aún no está activado</div>';

                    }
                } else {
                    echo '<br/><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
            }
        }
    }

    /*Registro de usuario*/
    public static function ctrCrearUsuario()
    {
        if (isset($_POST["nuevoUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['nuevoUsuario']) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['nuevoPassword'])) {
                $ruta = "";
                /* Validar imagen */
                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {


                    //Con esto traemos las caracteristicas de la imagen; alto y ancho, width y height y otras caracteristicas.
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* Creamos el directorio donde vamos a guardar la foto del usuario */

                    $directorio = "views/img/usuarios/".$_POST["nuevoUsuario"];

                    mkdir($directorio, 0755);

                    /* De acuerdo al tipo de imagen aplicamos las funciones por defecto de php */

                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                        /*Guardamos la imagen en el directorio*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }



                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                        /*Guardamos la imagen en el directorio*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";


                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("nombre" => $_POST["nuevoNombre"],
                                   "usuario" => $_POST["nuevoUsuario"],
                                   "password" => $encriptar,
                                   "perfil" => $_POST["nuevoPerfil"],
                                   "foto" => $ruta);
                    
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
    
                        swal({
    
                            type: "success",
                            title: "¡El usuario ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
    
                            if(result.value){
                            
                                window.location = "usuarios";
    
                            }
    
                        });
                    
    
                        </script>';
                }
            } else {
                echo
                '<script>
                    swal({
                        type: "error",
                        title: "¡El usuario o contraseña no pueden ir vació o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                </script>';
            }
        }
    }

    static public function ctrMostrarUsuarios($item, $valor)
    {
        $tabla = "usuarios";

        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }
    
    /* Editar usuario */
    static public function ctrEditarUsuario()
    {
        if (isset($_POST["editarUsuario"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                /* Validar imagen */

                $ruta = $_POST["fotoActual"];

                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

                    //Con esto traemos las caracteristicas de la imagen; alto y ancho, width y height y otras caracteristicas

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* Creamos el directorio donde vamos a guardar la foto del usuario */

                    $directorio = "views/img/usuarios/".$_POST["editarUsuario"];

                    /* Preguntaremos si existe otra imagen  en la BD */
                    if(!empty($_POST["fotoActual"])){

                        unlink($_POST["fotoActual"]);
                    }else{

                        mkdir($directorio, 0755);
                    }


                    /* De acuerdo al tipo de imagen aplicamos las funciones por defecto de php */

                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                        /*Guardamos la imagen en el directorio*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }



                    if ($_FILES["editarFoto"]["type"] == "image/png") {
                        /*Guardamos la imagen en el directorio*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "views/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                if($_POST["editarPassword"] != ""){

                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    }else{

                        echo
                        '<script>
                            swal({
                                type: "error",
                                title: "¡El usuario o contraseña no pueden ir vació o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "usuarios";
                                }
                            });
                        </script>';
                    }

                }else{

                    $encriptar = $_POST["passwordActual"];
                }

                $datos = array("nombre" => $_POST["editarNombre"],
                               "usuario" => $_POST["editarUsuario"],
                               "password" => $encriptar,
                               "perfil" => $_POST["editarPerfil"],
                               "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo 
                    '<script>
    
                        swal({
    
                            type: "success",
                            title: "¡El usuario ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
    
                            if(result.value){
                            
                                window.location = "usuarios";
    
                            }
    
                        });
                    
    
                        </script>';
                } 
            
            }else{
                echo
                '<script>
                    swal({
                        type: "error",
                        title: "¡El nombre no puede ir vació o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result)=>{
                        if(result.value){
                            window.location = "usuarios";
                        }
                    });
                </script>';
            }
        }
    }

    
	/*BORRAR USUARIO*/
	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('views/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}
}