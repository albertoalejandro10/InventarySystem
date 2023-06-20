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
        Categorías
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
            <i class="fa fa-plus"></i>&nbsp; Agregar nueva categoría
          </button>
        </div>
        
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width: 3%;">ID</th>
                <th style="width: 90%;">Categoría</th>
                <th style="width: 7%;">Acciones</th>
              </tr>
            </thead>

            <tbody>

            <?php
              $item = null;
              $valor = null;
              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              foreach ($categorias as $key => $value) {
                  echo
                '<tr>
                <td class="text-center">'.($key+1).'</td>
                <td>'.$value["categoria"].'</td>
                <td class="text-center">
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';
                  if ($_SESSION["perfil"] == "Administrador") {
                      echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                  }
                  echo '</div>
                </td>';
              }

            ?>
            </tbody>
          </table>
        </div>
    </div>
  </section>
</div>

  <!-- Modal agregar categoría -->
  <!-- Modal -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp; Ingresar nueva categoría</h4>
        </div>

        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

          <!-- Entrada para la categoría -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" id="nuevaCategoria" required>
              </div>
            </div>
          </div>
        </div>

        <!-- Entrada para enviar formulario y pie del modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-sign-out"></i>&nbsp;Salir</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Guardar Categoría</button>
        </div>
      </div>

      <?php
        $crearCategoria = new ControladorCategorias();
        $crearCategoria->ctrCrearCategoria();
      ?>
      </form>
  </div>
</div>

  <!-- Modal editar categoría -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form role="form" method="post">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-pencil"></i>&nbsp; Modificar categoría</h4>
        </div>

        <!-- Cuerpo del modal -->
        <div class="modal-body">
          <div class="box-body">

          <!-- Entrada para la categoría -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
                <input type="hidden" name="idCategoria" id="idCategoria" required>
              </div>
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
      $editarCategoria = new ControladorCategorias();
      $editarCategoria->ctrEditarCategoria();
    ?>
    </form>
  </div>
</div>

<?php  
  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();
?>
