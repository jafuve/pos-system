<!-- Content Wrapper. Contains page content -->
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
          
          <table class="table table-bordered table-striped tablas dt-responsive">
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
             
              <tr>
                <td>#</td>
                <td>Usuario administrador</td>
                <td>admin</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" alt="Foto" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-sm">Activado</button></td>
                <td>2019-02-01 12:23:23</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btn-sm" style="color:white;"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>

              <tr>
                <td>#</td>
                <td>Usuario administrador</td>
                <td>admin</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" alt="Foto" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-sm">Activado</button></td>
                <td>2019-02-01 12:23:23</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btn-sm" style="color:white;"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>

              <tr>
                <td>#</td>
                <td>Usuario administrador</td>
                <td>admin</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" alt="Foto" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-danger btn-sm">Desactivado</button></td>
                <td>2019-02-01 12:23:23</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btn-sm" style="color:white;"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
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
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>
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

              <input type="file" id="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 200 MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar usuario</button>
        </div>
      </form>
    </div>
  </div>
</div>