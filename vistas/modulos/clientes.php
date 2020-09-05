<?php
if($_SESSION["perfil"] == "Especial"){
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
            <h1>Administrar clientes</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar clientes</li>
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
          
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">Agregar cliente</button>
          
        </div>

        <div class="card-body">
          
          <table class="table table-bordered table-striped tablas dt-responsive" width="100%">

            <thead>
              <tr>
                <th style="width:10px;">#</th>
                <th>Nombre</th>
                <th>Documento ID</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha Nacimiento</th>
                <th>Total compras</th>
                <th>Última compra</th>
                <th>Ingreso al sistema</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
             
             <?php

              $item = $valor = null;
              $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
              
              foreach ($clientes as $key => $value) {
            

                echo '<tr>
    
                        <td>'.($key+1).'</td>
    
                        <td>'.$value["nombre"].'</td>
    
                        <td>'.$value["documento"].'</td>
    
                        <td>'.$value["email"].'</td>
    
                        <td>'.$value["telefono"].'</td>
    
                        <td>'.$value["direccion"].'</td>
    
                        <td>'.$value["fecha_nacimiento"].'</td>             
    
                        <td>'.$value["compras"].'</td>
    
                        <td>'.$value["ultima_compra"].'</td>
    
                        <td>'.$value["fecha"].'</td>
    
                        <td>
    
                          <div class="btn-group">
                              
                            <button class="btn btn-sm btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>';
    
                            if($_SESSION["perfil"] == "Administrador"){
                            echo '<button class="btn btn-sm btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';
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

<!-- MODAL AGREGAR CLIENTE -->
<div id="modalAgregarCliente" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h5 class="modal-title" >Agregar Cliente</h5>
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
                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>
              </div>
            </div>

             <!-- INPUT DOC ID -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>
              </div>
            </div>

             <!-- INPUT DOC EMAIL -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
              </div>
            </div>

             <!-- INPUT PHONE -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" min="0" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask = "'mask':'(999) 9999-9999'" data-mask required>
              </div>
            </div>

            <!-- INPUT ADDRESS -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                </div>
                <input type="text" min="0" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección"  required>
              </div>
            </div>

            <!-- INPUT birthdate -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                
                <input type="date"  class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento"  required>
              </div>
            </div>



          </div>

         
          

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar cliente</button>
        </div>
      </form>

      <?php
      $crearCliente = new ControladorClientes();
      $crearCliente->ctrCrearCliente();
      ?>
    </div>
  </div>
</div>

<!-- MODAL EDITAR CLIENTE -->
<div id="modalEditarCliente" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h5 class="modal-title" >Editar Cliente</h5>
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
                <input type="text" class="form-control input-lg" id="editarCliente" name="editarCliente"  required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>
            </div>

             <!-- INPUT DOC ID -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input type="number" min="0" class="form-control input-lg" id="editarDocumentoId" name="editarDocumentoId" required>
              </div>
            </div>

             <!-- INPUT DOC EMAIL -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" required>
              </div>
            </div>

             <!-- INPUT PHONE -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input type="text" min="0" class="form-control input-lg" id="editarTelefono" name="editarTelefono"  data-inputmask = "'mask':'(999) 9999-9999'" data-mask required>
              </div>
            </div>

            <!-- INPUT ADDRESS -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                </div>
                <input type="text" min="0" class="form-control input-lg" id="editarDireccion" name="editarDireccion"  required>
              </div>
            </div>

            <!-- INPUT birthdate -->
          <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                
                <input type="date"  class="form-control input-lg" id="editarFechaNacimiento" name="editarFechaNacimiento"   required>
              </div>
            </div>



          </div>

         
          

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar cambios</button>
        </div>
      </form>

      <?php
      $crearCliente = new ControladorClientes();
      $crearCliente->ctrEditarCliente();
      ?>
    </div>
  </div>
</div>

<?php

$crearCliente = new ControladorClientes();
$crearCliente->ctrEliminarCliente();

?>



