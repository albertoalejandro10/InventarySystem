  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        
        <h1>
            Administrar clientes
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
              Agregar cliente
            </button>
          </div>
          
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablas">
              
              <thead>
                <tr>
                  <th id="first-column-th">#</th>
                  <th>Nombre</th>
                  <th>Documento ID</th>
                  <th>Correo</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Fecha de nacimiento</th>
                  <th>Total compras</th>
                  <th>Última compras</th>
                  <th>Ingreso al sistema</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>

              <?php

                $item = null;
                $valor = null;

                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                foreach ($clientes as $key => $value) {
                  

                  echo '<tr>

                          <td>'.($key+1).'</td>

                          <td>'.$value["nombre"].'</td>

                          <td>'.$value["documento"].'</td>

                          <td>'.$value["email"].'</td>

                          <td>'.$value["telefono"].'</td>

                          <td>'.$value["direccion"].'</td>

                          <td>'.$value["fecha_nacimiento"].'</td>             

                          <td>'.$value["compras"].'</td>

                          <td>0000-00-00 00:00:00</td>

                          <td>'.$value["fecha"].'</td>

                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>

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

  <!-- Modal agregar usuario -->

  <!-- Modal -->
<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

        <form role="form" method="post">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
          <h4 class="modal-title">Agregar cliente</h4>
        
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

          <!-- Entrda para el documento id -->
            <div class="form-group">
              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" min="0"  name="nuevoDocumentoId" placeholder="Ingresar documento de identidad" required>
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

            <!-- Entrada para la fecha de nacimiento -->
            <div class="form-group">
              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha de nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div>


          </div>
        </div>

        <!-- Entrada para enviar formulario y pie del modal -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>
      </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente->ctrCrearCliente();

      ?>

  </div>
</div>