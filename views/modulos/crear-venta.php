<div class="content-wrapper">
  <section class="content-header">        
      <h1>
          Crear venta
      </h1>

      <ol class="breadcrumb">
      
          <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

          <li class="active">Crear venta</li>
      
      </ol>    
  </section>

  <section class="content">
    <div class="row">
      <!-- El formulario -->
      <div class="col-lg-5 col-xs-12">

      <div class="box box-success">

        <div class="box-header with-border">

          <div class="box-body">

            <form role="form" action="" method="post">

              <div class="box">
                <!-- Entrada del vendedor  -->

                <div class="form-group">
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>

                  </div>
                </div>

                <!-- Entrada del  codigo-->
                <div class="form-group">
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="text" class="form-control" id="nuevoVenta" name="nuevoVenta" value="10002343" readonly>

                  </div>
                </div>

                <!-- Entrada del cliente -->
                <div class="form-group">
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select name="seleccionarCliente" id="seleccionarCliente" class="form-control">
                      <option value="">Seleccionar cliente</option>
                    </select>
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>

                  </div>
                </div>

                <!-- Entrada para agregar producto -->
                <div class="form-group row nuevoProducto">

                  <!-- Descripción del producto -->
                  <div class="col-xs-6" style="padding-right: 0px">
                    <div class="input-group">
                      <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>
                      <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>
                    </div>
                  </div>

                  <!-- Cantidad del producto -->
                  <div class="col-xs-3">
                    <input type="text" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>
                  </div>

                  <!-- Precio del producto -->
                  <div class="col-xs-3" style="padding-left: 0px">
                    <div class="input-group">
                      <input type="text" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="000000" readonly required>
                      <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                    </div>
                  </div>
                </div>

                <!-- Boton para agregar producto -->
                <button type="button" class="btn btn-default hidden-lg">Agregar Producto</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
            <!-- La tabla de productos -->

            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
              <div class="box box-warning">

              </div>
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
  </div>