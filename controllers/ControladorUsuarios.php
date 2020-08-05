<?php

class ControladorUsuarios{
    /*Ingreso de usuario*/

    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){


            /*Que solo entren letras entre ese rango regular*/
        
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUsuario']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])){

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST['ingUsuario'];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){
                    
                    $_SESSION["iniciarSesion"] = "ok";

                    echo '<script>
                        window.location = "inicio"
                    </script>';

                }else{

                    echo '<br/><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }

            }
        }
    }

    /*Registro de usuario*/
    static public function ctrCrearUsuario(){
        if(isset($_POST["nuevoUsuario"])){

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['nuevoUsuario']) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['nuevoPassword'])) {


                $ruta = "";
                /* Validar imagen */
                if(isset($_FILES["nuevaFoto"]["tmp_name"])){


                    //Con esto traemos las caracteristicas de la imagen; alto y ancho, width y height y otras caracteristicas.
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* Creamos el directorio donde vamos a guardar la foto del usuario */

                    $directorio = "views/img/usuarios/".$_POST["nuevoUsuario"];

                    mkdir($directorio, 0755);

                    /* De acuerdo al tipo de imagen aplicamos las funciones por defecto de php */

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
                        /*Guardamos la imagen en el directorio*/
						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
                    }



                    if($_FILES["nuevaFoto"]["type"] == "image/png"){
                        /*Guardamos la imagen en el directorio*/
						$aleatorio = mt_rand(100,999);

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

                    if($respuesta == "ok"){

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
        }
    }
}