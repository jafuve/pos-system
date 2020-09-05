<?php
if($_SESSION["perfil"] == "Vendedor"){
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
             
           <?php
           $item = $valor = null;
           $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
            
           foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["categoria"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btn-sm btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-pencil-alt"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){
                        echo '<button class="btn btn-danger btn-sm btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                        }

                      echo '</div>  

                    </td>

                  </tr>';
          }

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
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar categoría</button>
        </div>
        <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR CATEGORIA -->
<div id="modalEditarCategoria" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h5 class="modal-title" >Editar Categoría</h5>
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
                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria"  required>
                <input type="hidden"  name="idCategoria" id="idCategoria">
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar cambios</button>
        </div>
        <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?>
      </form>
    </div>
  </div>
</div>

<?php
  $borrarCategoria = new ControladorCategorias();   
  $borrarCategoria -> ctrBorrarCategoria();
  ?>

