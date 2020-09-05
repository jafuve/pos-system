<?php
if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){
  echo '<script>window.location = "inicio";</script>';
  return;
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar usuarios</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar usuario</button>
          
        </div>

        <div class="card-body">
          
          <table class="table table-bordered table-striped tablas dt-responsive" width="100%">
            <thead>
              <tr>
                <th style="width:10px;">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Último login</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $item = null; $valor = null;
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
              // var_dump($usuarios);
              foreach($usuarios as $key => $value){
                
                echo "
                <tr>
                <td>".($key+1)."</td>
                  <td>{$value['nombre']}</td>
                  <td>{$value['usuario']}</td>";

                  if($value["foto"] != ""){
                    echo "<td><img src='{$value['foto']}' alt='Foto' class='img-thumbnail' width='40px'></td>";
                  }else{
                    echo "<td><img src='vistas/img/usuarios/default/anonymous.png' alt='Foto' class='img-thumbnail' width='40px'></td>";
                  }

                  echo "<td>{$value['perfil']}</td>";

                  if($value['estado'] != 0){
                    echo "<td><button class='btn btn-success btn-sm btnActivar' idUsuario = '{$value["id"]}' estadoUsuario = '0'>Activado</button></td>";
                  }else{
                    echo "<td><button class='btn btn-danger btn-sm btnActivar' idUsuario = '{$value["id"]}'  estadoUsuario = '1'>Desctivado</button></td>";
                  }

                  echo "<td>{$value['ultimo_login']}</td>
                  <td>
                    <div class='btn-group'>

                      <button class='btn btn-warning btn-sm btnEditarUsuario' idUsuario = '{$value["id"]}' style='color:white;' data-toggle='modal' data-target='#modalEditarUsuario'><i class='fas fa-pencil-alt'></i></button>

                      <button class='btn btn-danger btnEliminarusuario btn-sm' idUsuario = '{$value["id"]}' fotoUsuario = '{$value["foto"]}' usuario = '{$value["usuario"]}'><i class='fa fa-times'></i></button>
                      
                    </div>
                  </td>
                </tr>
                ";
                
              }//end foreach

              ?>
             
            
            </tbody>

          </table>

        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- MODAL AGREGAR USUARIO -->
<div id="modalAgregarUsuario" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h5 class="modal-title" >Agregar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          
          <div class="box-body">
          <!-- INPUT NAME -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!-- INPUT USER -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario" placeholder="Ingresar usuario" required>
              </div>
            </div>

            <!-- INPUT PASSWORD -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
              </div>
            </div>

            <!-- INPUT SELECCIONAR PERFIL -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <select name="nuevoPerfil" class="form-control input-lg">
                  <option value="">Seleccionar perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>
                </select>
              </div>
            </div>

            <!-- INPUT PHOTO -->
            <div class="form-group">
              <div class="panel"><b>SUBIR FOTO</b></div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="previsualizar img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar usuario</button>
        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario->ctrCrearUsuario();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR USUARIO -->
<div id="modalEditarUsuario" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h5 class="modal-title" >Editar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          
          <div class="box-body">
          <!-- INPUT NAME -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
              </div>
            </div>

            <!-- INPUT USER -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
              </div>
            </div>

            <!-- INPUT PASSWORD -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control input-lg" id="editarPassword" name="editarPassword">
                <input type="hidden"  class="form-control input-lg" id="passwordActual" name="passwordActual" >
              </div>
            </div>

            <!-- INPUT SELECCIONAR PERFIL -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <select name="editarPerfil" class="form-control input-lg">
                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>
                </select>
              </div>
            </div>

            <!-- INPUT PHOTO -->
            <div class="form-group">
              <div class="panel"><b>SUBIR FOTO</b></div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="previsualizar img-thumbnail" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar cambios</button>
        </div>

        <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario->ctrEditarUsuario();

        ?>

      </form>
    </div>
  </div>
</div>

<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();

?>