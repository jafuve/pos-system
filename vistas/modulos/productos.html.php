<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar productos</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar productos</li>
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
          
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar producto</button>
          
        </div>

        <div class="card-body">
          
          <table class="table table-bordered table-striped tablas dt-responsive">
            <thead>
              <tr>
                <th style="width:10px;">#</th>
                <th>Imágen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio compra</th>
                <th>Precio venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
             
              <tr>
                <td>#</td>
                <td><img src="vistas/img/productos/default/anonymous.png" alt="Foto" class="img-thumbnail" width="40px"></td>
                <td>P001</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, cumque dolore.</td>
                <td>Lorem ipsum</td>
                <td>20</td>
                <td>$ 5.00</td>
                <td>$ 10.00</td>
                <td>2019-01-03 20:09:12</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btn-sm" style="color:white;"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>

              <tr>
                <td>#</td>
                <td><img src="vistas/img/productos/default/anonymous.png" alt="Foto" class="img-thumbnail" width="40px"></td>
                <td>P001</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, cumque dolore.</td>
                <td>Lorem ipsum</td>
                <td>20</td>
                <td>$ 5.00</td>
                <td>$ 10.00</td>
                <td>2019-01-03 20:09:12</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btn-sm" style="color:white;"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>

              <tr>
                <td>#</td>
                <td><img src="vistas/img/productos/default/anonymous.png" alt="Foto" class="img-thumbnail" width="40px"></td>
                <td>P001</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, cumque dolore.</td>
                <td>Lorem ipsum</td>
                <td>20</td>
                <td>$ 5.00</td>
                <td>$ 10.00</td>
                <td>2019-01-03 20:09:12</td>
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

<!-- MODAL AGREGAR PRODUCTO -->
<div id="modalAgregarProducto" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <h5 class="modal-title" >Agregar producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          
          <div class="box-body">
          <!-- ID NAME -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-code"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar código" required>
              </div>
            </div>

            <!-- DESCRIPTION USER -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <input type="text" class="form-control input-lg" name="nuevaDescription" placeholder="Ingresar descripción" required>
              </div>
            </div>

              <!-- INPUT CATEGORY -->
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                <select name="nuevaCategoria" class="form-control input-lg">
                  <option value="">Seleccionar categoría</option>
                  <option value="Taladros">Taladros</option>
                  <option value="Andamios">Andamios</option>
                  <option value="Equipos para construccion">Equipos para construccion</option>
                </select>
              </div>
            </div>

             <!-- STOCK -->
             <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-check"></i></span>
                </div>
                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Cantidad disponible" required>
              </div>
            </div>


            <div class="form-group">

              <div class="row">

                <div class="col-md-6 ">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-arrow-up"></i></span>
                    </div>
                    <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" min="0" placeholder="Precio de compra" required>
                  </div>
                </div>
                
                <div class="col-md-6">

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-arrow-up"></i></span>
                    </div>
                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" min="0" placeholder="Precio de Venta" required>
                  </div>

                  <br>

                  <div class="row">
                    <!-- CHECKBOX PARA PORCENTAJE -->
                    <div class="col-md-6" >

                      
                    
                      <div class="form-group">
                        <div class="icheck-info">
                        <input type="checkbox" id="someCheckboxId" class="porcentaje" checked/>
                        <label for="someCheckboxId">Utilizar porcentaje</label>
                      </div>
                      </div>

                    </div>

                    <!-- INPUT PARA PORCENTAJE -->
                    <div class="col-md-6">

                      <div class="input-group mb-3">
                        <input type="number" class="form-control input-lg" name="nuevoPorcentaje" min="0" value="40">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-percent"></i></span>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
            
              </div>
            
            </div>

               

               

            


            <!-- INPUT PHOTO -->
            <div class="form-group">
              <div class="panel"><b>SUBIR IMÁGEN</b></div>

              <input type="file" id="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-success">Guardar producto</button>
        </div>
      </form>
    </div>
  </div>
</div>