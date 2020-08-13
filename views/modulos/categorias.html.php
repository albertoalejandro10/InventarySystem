  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        
        <h1>
            Administrar categorías
        </h1>
        <ol class="breadcrumb">
        
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar categorías</li>
        
        </ol>    
    </section>

    <section class="content">

      <div class="box">

          <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
              Agregar categoria
            </button>
          </div>
          
          <div class="box-body">
            <table id="tablas" class="table table-bordered table-striped dt-responsive">
              
              <thead>
                <tr>
                  <th id="first-column-th">#</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
              
                <tr>
                  <td>1</td>
                  <td>EQUIPOS ELECTROMECANICOS</td>

                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>

                </tr>


                <tr>
                  <td>1</td>
                  <td>EQUIPOS ELECTROMECANICOS</td>

                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>

                </tr>


                <tr>
                  <td>1</td>
                  <td>EQUIPOS ELECTROMECANICOS</td>

                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>

                </tr>

              </tbody>

            </table>
          </div>
      </div>

    </section>
  </div>

  <!-- Modal agregar usuario -->

  <!-- Modal -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

        <form role="form" method="post">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
          <h4 class="modal-title">Agregar categoría</h4>
        
        </div>

        <!-- Cuerpo del modal -->
        
        <div class="modal-body">
          <div class="box-body">

          <!-- Entrada para la categoría -->
            <div class="form-group">
              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>
              </div>
            </div>
            
          </div>
        </div>

        <!-- Entrada para enviar formulario y pie del modal -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Categoría</button>
        </div>
      </div>

      </form>

  </div>
</div>