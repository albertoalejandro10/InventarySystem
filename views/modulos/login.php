<div id="back"></div>

<div class="login-box">
  <div class="login-logo">
      <img src="views/img/plantilla/logo-blanco-capilla.png" alt="fondo" class="img-responsive">
  </div>

  <div class="login-box-body">
    <p class="login-box-msg title-login"><strong>Ingresar al sistema de inventario</strong></p>

    <form method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="container-fluid">
       <div class="row w-100 align-items-center">
          <div class="text-center">
            <button type="submit" class="btn btn-outline-success" id="btn-login">Ingresar</button>
          </div>
        </div>
      </div>
    </form>
    <?php
      $login = new ControladorUsuarios();
      $login->ctrIngresoUsuario();
    ?>
  </div>
</div>