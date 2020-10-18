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
          
          <form role="form" action="" method="post" class="formularioVenta">

            <div class="box-body">


              <div class="box">
                <!-- Entrada del vendedor  -->

                <div class="form-group">
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION['nombre'] ?>" readonly>
                    
                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION['id'] ?>">
                  </div>
                </div>

                <!-- Entrada del  codigo-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if (!$ventas) {
                        echo  '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                    } else {
                        foreach ($ventas as $key => $value) {
                            #code
                        }

                        $codigo = $value["codigo"] + 1;

                        echo  '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                    }
                  ?>


                  </div>
                </div>

                <!-- Entrada del cliente -->
                <div class="form-group">
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select name="seleccionarCliente" id="seleccionarCliente" class="form-control">
                      <option value="">Seleccionar cliente</option>

                      <?php
                        
                        $item = null;
                        $valor = null;

                        $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                        foreach ($categorias as $key=> $value) {
                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        }

                      ?>
                    </select>
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>

                  </div>
                </div>

                <!-- Entrada para agregar producto -->
                <div class="form-group row nuevoProducto">

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- Boton para agregar producto -->
                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar Producto</button>
                <hr />

                <div class="row">
                  <!-- Entrada impuesto y total -->
                  <div class="col-xs-8 pull-right">
                      <table class="table">
                        
                      <thead>

                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 50%">
                            
                            <div class="input-group">

                              
                              <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                              
                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                        
                            </div>

                          </td>

                           <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>
                        
                      </table>
                    </div>
                  </div>

                  <hr />

                  <!-- Metodo de pago -->
                  <div class="form-group row">

                      <div class="col-xs-6" style="padding-right:0px">
                        
                        <div class="input-group">
                    
                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                          
                          <option value="">Seleccione método de pago</option>
                          <option value="Efectivo">Efectivo</option>
                          <option value="TC">Tarjeta Crédito</option>
                          <option value="TD">Tarjeta Débito</option>  

                        </select>
                        
                      </div>

                    </div>

                    <div class="cajasMetodoPago"></div>

                        <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                  </div>

                </div>

                <br />

            </div>              

          </div>

            <div class="box-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
              <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

            </div>
          </form>

          <?php

            $guardarVenta = new ControladorVentas();
            $guardarVenta->ctrCrearVenta();

          ?>

          
        </div>
      </div>
      <!-- La tabla de productos -->

    <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
      <div class="box box-warning">
        <div class="box-header with-border"></div>
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablaVentas">

                <thead>

                 <tr>
                  <th id="first-column-th">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>

              </thead>


            </table>
        </div>
      </div>
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