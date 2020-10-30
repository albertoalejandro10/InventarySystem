<header class="main-header">
    <!-- Ingreso logotipo -->
    <a href="inicio" class="logo">
        <!-- Logo mini -->
        <span class="logo-mini">
            <img src="views/img/plantilla/logoCapillas1.png" class="img-responsive" style="padding:2px" alt="icono pequeno">
        </span>

        <!-- Logo normal -->
        <span class="logo-lg">
            <img src="views/img/plantilla/logo-grande-capilla.png" alt="icono grande" class="img-responsive" style="padding: 10px 0px">
        </span>
    </a>


    <!-- Barra de navegacion -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- boton de navegacion -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- perfil de usuario -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php

                        if ($_SESSION["foto"] != "") {
                            echo '<img src="'.$_SESSION["foto"].'" class="user-image ">';
                        } else {
                            echo '<img src="views/img/usuarios/default/anonymous.png" alt="perfil" class="user-image">';
                        }
                        
                        ?>


                        <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
                    </a>
                    
                    <!-- dropdown-toggle -->
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>