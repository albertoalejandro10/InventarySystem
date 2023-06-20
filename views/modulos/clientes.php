<?php
if ($_SESSION["perfil"] == "Especial") {
    echo '<script>
      window.location = "inicio";
    </script>';
    return;
}
?>

<div class="content-wrapper">
  <section class="content-header">        
      <h1>
        Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar clientes</li>
      </ol>
  </section>

  <section class="content">
    <div class="box">

        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            <i class="fa fa-plus"></i>&nbsp; Agregar nuevo cliente
          </button>
        </div>
        
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 2%;">ID</th>
                <th style="width: 34%;">Nombre</th>
                <th style="width: 8%;">Documento</th>
                <th style="width: 8%;">Correo</th>
                <th style="width: 8%;">Teléfono</th>
                <th style="width: 8%;">Dirección</th>
                <th class="text-nowrap" style="width: 8%;">Total servicios</th>
                <th class="text-nowrap" style="width: 8%;">Última servicio</th>
                <th class="text-nowrap" style="width: 8%;">Ingreso al sistema</th>
                <th style="width: 8%;">Acciones</th>
              </tr>
            </thead>

            <tbody>
            <?php
              $item = null;
              $valor = null;
              $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

              foreach ($clientes as $key => $value) {
                echo 
                '<tr>
                      <td class="text-center">'.($key+1).'</td>
                      <td>'.$value["nombre"].'</td>
                      <td>'.$value["documento"].'</td>
                      <td>'.$value["email"].'</td>
                      <td>'.$value["telefono"].'</td>
                      <td>'.$value["direccion"].'</td>
                      <td class="text-center">'.$value["compras"].'</td>
                      <td>'.$value["ultima_compra"].'</td>
                      <td>'.$value["fecha"].'</td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarCliente" idCliente="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>';
                          if ($_SESSION["perfil"] == "Administrador") {
                            echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                          }
                        echo '</div>
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

  <!-- Modal agregar cliente -->
  <!-- Modal -->
<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-address-book"></i>&nbsp; Ingresar datos del cliente</h4>
        </div>

        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

          <!-- Entrada para la cliente -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>
              </div>
            </div>

          <!-- Entrada para el documento id -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" min="0" name="nuevoDocumentoId" placeholder="Ingresar documento de identidad" required>
              </div>
            </div>

            <!-- Entrda para email -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar correo" required>
              </div>
            </div>

            <!-- Entrada para telefono -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(9999) 9999999'" data-mask required>
              </div>
            </div>

            <!-- Entrada para la direccion -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección"  required>
              </div>
            </div>
          </div>
        </div>

        <!-- Entrada para enviar formulario y pie del modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i>&nbsp; Salir</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Guardar cliente</button>
        </div>
      </div>
    </form>
    <?php
      $crearCliente = new ControladorClientes();
      $crearCliente->ctrCrearCliente();
    ?>
    </div>
  </div>
</div>


<!-- Modal editar cliente-->
<div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-address-book"></i>&nbsp; Modificar datos del cliente</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>
            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(9999) 9999999'" data-mask required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>
              </div>
            </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i>&nbsp; Salir</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i>&nbsp; Guardar cambios</button>
        </div>
      </form>
      <?php
        $editarCliente = new ControladorClientes();
        $editarCliente->ctrEditarCliente();
      ?>
    </div>
  </div>
</div>

<?php
  $eliminarCliente = new ControladorClientes();
  $eliminarCliente->ctrEliminarCliente();
?>