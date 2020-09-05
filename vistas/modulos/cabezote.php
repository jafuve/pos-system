<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

            <?php

              if($_SESSION["foto"] != ""){
                echo '<img src="' . $_SESSION["foto"] . '" class="user-image" alt="User Image">';
              }else{
                echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image" alt="User Image">';
              }

            ?>

              <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-body">
                    <div class="pull-right">
                        <a href="salir" class="btn btn-default btn-flat">Salir</a>
                    </div>
                </li>


              <!-- User image
              <li class="user-header">
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li> -->
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              <!-- </li> -->
              <!-- Menu Footer-->
              <!-- <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li> -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  