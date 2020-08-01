<?php

class ControladorUsuarios{
    /*Ingreso de usuario*/

    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){


            /*Que solo entren letras entre ese rango regular*/
        
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUsuario']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])){

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST['ingUsuario'];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){
                    
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
                    
            }else{
                echo 
                '<script>

                
                    swal({
                        type: "error",
                        title: "¡El usuario no puede ir vació o llevar caracteres especiales",
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