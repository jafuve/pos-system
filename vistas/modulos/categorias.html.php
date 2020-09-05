<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar categorías</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar categorías</li>
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
          
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar categoría</button>
          
        </div>

        <div class="card-body">
          
          <table class="table table-bordered table-striped tablas dt-responsive" width="100%">

            <thead>
              <tr>
                <th style="width:10px;">#</th>
                <th>Categoría</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
             
             <tr>
               <td>#</td>
               <td>EQUIPOS ELECTROMECÁNICOS</td>
               <td>
                 <div class="btn-group">
                   <button class="btn btn-warning btn-sm" style="color:white;"><i class="fas fa-pencil-alt"></i></button>
                   <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                 </div>
               </td>
             </tr>

             <tr>
               <td>#</td>
               <td>EQUIPOS ELECTROMECÁNICOS</td>
               <td>
                 <div class="btn-group">
                   <button class="btn btn-warning btn-sm" style="color:white;"><i class="fas fa-pencil-alt"></i></button>
                   <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                 </div>
               </td>
             </tr>

             <tr>
               <td>#</td>
               <td>EQUIPOS ELECTROMECÁNICOS</td>
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

<!-- MODAL AGREGAR CATEGORIA -->
<div id="modalAgregarUsuario" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h5 class="modal-title" >Agregar Categoría</h5>
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
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevaCatgoria" placeholder="Ingresar categoría" required>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar categoría</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR CATEGORIA -->
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

