<?php

if ($_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Especial") {
    echo '<script>
      window.location = "inicio";
    </script>';
    return;
}

?>

<div class="content-wrapper">
  <section class="content-header">        
      <h1>
          Usuarios
      </h1>
      <ol class="breadcrumb">
          <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Administrar usuarios</li>
      </ol>    
  </section>

  <section class="content">
    <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            <i class="fa fa-user-plus"></i> &nbsp; Añadir nuevo usuario
          </button>
        </div>
        
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 3%;">ID</th>
                <th style="width: 52%">Nombre</th>
                <th style="width: 6%">Usuario</th>
                <th style="width: 6%">Foto</th>
                <th style="width: 10%">Perfil</th>
                <th style="width: 5%">Estado</th>
                <th style="width: 10%">Último login</th>
                <th style="width: 6%">Acciones</th>
              </tr>
            </thead>

            <tbody>
            <?php
              $item = null;
              $valor = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

              foreach ($usuarios as $key => $value) {
                  echo
                '<tr>
                  <td class="text-center">'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if ($value["foto"] != "") {
                      echo '<td class="text-center"><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                  } else {
                      echo '<td class="text-center"><img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                  }
                  
                  echo '<td>'.$value["perfil"].'</td>';

                  if ($value["estado"] != 0) {
                      echo '<td class="text-center"><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0"><i class="fa fa-unlock"></i>&nbsp;Activado</button></td>';
                  } else {
                      echo '<td class="text-center"><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1"><i class="fa fa-lock"></i>&nbsp; Desactivado</button></td>';
                  }

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-trash"></i></button>
                    </div>
                  </td>
                </tr>';
              }

            ?>
            </tbody>
          </table>
        </div>
    </div>
  </section>
</div>

  <!-- MODAL AGREGAR USUARIO -->
  <!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-address-book"></i>&nbsp; Ingresar datos del usuario</h4>
        </div>

        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

          <!-- Entrada para el nombre -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!-- Entrada para el usuario -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
              </div>
            </div>

            <!-- Entrada para la contraseña -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
              </div>
            </div>

            <!-- Entrada para seleccionar su perfil -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil">
                    <option value="">Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
              </div>
            </div>

            <!-- Entrada para subir foto -->
            <div class="form-group">
              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto">
              <p class="help-block">Peso máximo de la foto 2 MB</p>
              <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>

          </div>
        </div>
        <!-- Entrada para enviar formulario y pie del modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i>&nbsp; Salir</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Guardar usuario</button>
        </div>
      </div>
      <?php
        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();
      ?>
      </form>
  </div>
</div>

<!-- MODAL EDITAR USUARIO -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class="fa fa-address-book"></i>&nbsp; Modificar datos del usuario</h4>
          </div>

         <!-- Cuerpo del modal -->
          <div class="modal-body">
            <div class="box-body">

            <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                </div>
              </div>

              <!-- Entrada para el usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                </div>
              </div>

              <!-- Entrada para la contraseña -->
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
                    <input type="hidden" id="passwordActual" name="passwordActual">
                </div>
              </div>

              <!-- Entrada para seleccionar su perfil -->
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control input-lg" name="editarPerfil">
                      <option value="" id="editarPerfil"></option>
                      <option value="Administrador">Administrador</option>
                      <option value="Especial">Especial</option>
                      <option value="Vendedor">Vendedor</option>
                    </select>
                </div>
              </div>

              <!-- Entrada para subir foto -->
              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="editarFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="views/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>

          </div>
        </div>

        <!-- Entrada para enviar formulario y pie del modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i>&nbsp; Salir</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i>&nbsp; Guardar cambios</button>
        </div>
      </div>

      <?php
        $editarUsuario = new ControladorUsuarios();
        $editarUsuario -> ctrEditarUsuario();
      ?>
      </form>

  </div>
</div>

<?php
  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
?> 