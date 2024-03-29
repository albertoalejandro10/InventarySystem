<?php
if ($_SESSION["perfil"] == "Vendedor") {
    echo '<script>
      window.location = "inicio";
    </script>';
    return;
}
?>

<div class="content-wrapper">
  <section class="content-header">        
      <h1>
        Productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar productos</li>
      </ol>    
  </section>

  <section class="content">
    <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            <i class="fa fa-plus"></i>&nbsp; Agregar nuevo producto
          </button>
        </div>
        
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
            <thead>
              <tr>
                <th style="width: 3%; text-align: center;">ID</th>
                <th style="width: 6%;">Imagen</th>
                <th style="width: 6%;">Código</th>
                <th style="width: 27%;">Descripción</th>
                <th style="width: 10%;">Categoría</th>
                <th style="width: 6%; text-align: center;">Stock</th>
                <th style="width: 10%; text-align: right;">Precio de compra</th>
                <th style="width: 10%; text-align: right;">Precio de venta</th>
                <th style="width: 10%; text-align: right;">Fecha de agregado</th>
                <th style="width: 6%; text-align: center;">Acciones</th>
              </tr>
            </thead>
          </table>

          <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
        </div>
    </div>

  </section>
</div>

  <!-- Modal agregar producto -->
  <!-- Modal -->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp; Ingresar datos del producto</h4>
        </div>

        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

            <!-- Entrada para seleccionar su categoria -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <select class="form-control input-lg" id="nuevaCategoriaProducto" name="nuevaCategoria">
                    <option value="">Seleccionar categoría</option>

                    <?php
                      $item = null;
                      $valor = null;
                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                      foreach ($categorias as $key => $value) {
                        echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                      }
                    ?>
                  </select>
              </div>
            </div>

          <!-- Entrada para el codigo -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar codígo" required>
              </div>
            </div>

            <!-- Entrada para la descripcion -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
              </div>
            </div>

            <!-- Entrada para el Stock -->
            <div class="form-group">
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>
              </div>
            </div>

            <!-- Entrada para el precio compra -->
            <div class="form-group row">
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de compra" required>
                </div>
              </div>

            <!-- Entrada para el precio venta -->
                <div class="col-xs-12 col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de venta" required>
                  </div>
            <!-- Check box para porcentaje -->
                  </br>
                    <div class="col-xs-6">
                      <div class="form-group">

                        <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                          Utilizar porcentaje
                        </label>
                      </div>
                    </div>
            
            <!-- Entrada para porcentaje -->
                  <div class="col-xs-6" style="padding:0">
                    <div class="input-group">
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Entrada para subir foto -->
            <div class="form-group">
              <div class="panel">SUBIR IMAGEN</div>
              <input type="file" class="nuevaImagen" name="nuevaImagen">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="views/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>
            
          </div>
        </div>

        <!-- Entrada para enviar formulario y pie del modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i>&nbsp;Salir</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Guardar producto</button>
        </div>

      </form>
      </div>

      <?php
        $crearProducto = new ControladorProductos();
        $crearProducto->ctrCrearProducto();
      ?>
  </div>
</div>

<!--modal editar producto-->
<div id="modalEditarProducto" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--cabeza del modal-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar producto</h4>
        </div>

        <!--cuerpo del modal-->
        <div class="modal-body">
          <div class="box-body">

            <!-- entrada para seleccionar categoría -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg"  name="editarCategoria" readonly required>
                  <option id="editarCategoria"></option>
                </select>
              </div>
            </div>

            <!-- entrada para el código -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
              </div>
            </div>

            <!-- entrada para la descripción -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>
              </div>
            </div>

             <!-- entrada para stock -->
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>
              </div>
            </div>

             <!-- entrada para precio compra -->
             <div class="form-group row">
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>
                  </div>
                </div>

                <!-- entrada para precio venta -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>
                  </div>
                  <br>

                  <!-- checkbox para porcentaje -->
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>
                    </div>
                  </div>

                  <!-- entrada para porcentaje -->
                  <div class="col-xs-6" style="padding:0">
                    <div class="input-group">
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
            </div>

            <!-- entrada para subir foto -->
            <div class="form-group">
              <div class="panel">SUBIR IMAGEN</div>
              <input type="file" class="nuevaImagen" name="editarImagen">
              <p class="help-block">Peso máximo de la imagen 2MB</p>
              <img src="views/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="imagenActual" id="imagenActual">
            </div>
          </div>
        </div>

        <!--pie del modal-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>

        <?php
          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();
        ?>
    </div>
  </div>
</div>

<?php
$eliminarProducto = new ControladorProductos();
$eliminarProducto->ctrEliminarProducto();
?>      
