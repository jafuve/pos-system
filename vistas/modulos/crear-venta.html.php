<style>
body {
  margin: 2rem 0px;
  
  label:not(.input-group-text) {
    margin-top: 1rem;
  }
  
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear venta</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Crear venta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- FORMULARIO -->
        <div class="col-lg-5 col-xs-12">
        
          <div class="card card-success card-outline">
            
            <div class="card-header">
              <!-- <h3 class="card-title">About Me</h3> -->
            </div>
            <form role="form" method="post">
            <div class="card-body">
            
              

                <div class="form-group">
                
                <!-- INPUT VENDEDOR -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" id="nuevVendedor" name="nuevVendedor" value="Usuario Administrador" readonly>
                </div>

                <!-- INPUT NUEVA VENTA -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" id="nuevaVenta" name="nuevaVenta" value="1000123" readonly>
                </div>

          

                <!-- INPUT NUEVA VENTA -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  
                  <select class="custom-select"  name="seleccionarCliente" id="seleccionarCliente" required>
                    <option value="">Seleccionar cliente</option>
                  </select>

                  <div class="input-group-append">
                    
                      <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button>
                    
                  </div>

                </div>

                <!-- INPUT PRODUCTO -->

                <div class="form-group row nuevoProducto">
                  <!-- DESCRIPTION -->
                  <div class="col-6" style="padding-right: 0px;">
                
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-times"></i></button>
                      </div>
                      
                      <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>
                    </div>

                  </div>

                  <!-- QTY -->
                  <div class="col-3" >
                    <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>
                  </div>

                  <!-- PRICE -->
                  <div class="col-3" style="padding-left: 0px;">
                    
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="text" class="form-control input-lg" id="nuevoPrecioProducto" name="nuevoPrecioProducto" value="000" readonly>
                    
                  </div>

                  </div>
                  
                  

                </div>

                <!-- BUTTON ADD PRODUCT -->
                <button type="button" class="btn btn-default d-lg-none d-xl-none">Agregar producto</button>

                <hr>

                <div class="row">
                  <div class="col-8 ml-auto">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr>
                          <td style="width: 50%;">
                            <div class="input-group mb-3">            
                              <input type="text" class="form-control input-lg" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="000">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                              </div>
                            </div>
                          </td>

                          <td style="width: 50%;">
                            <div class="input-group mb-3">      
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                              </div>      
                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" value="000" readonly>
                              
                            </div>
                          </td>
                        </tr>
                      </tbody>

                    </table>

                  </div>
                </div>

                <hr>
                <!-- METODO DE PAGO -->

                <div class="form-group row">
                  <div class="col-6">
                    <div class="input-group mb-3">
                    <!-- <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div> -->
                    
                    <select class="custom-select"  name="nuevoMetodoPago" id="nuevoMetodoPago" required>
                      <option value="">Seleccione método de pago</option>
                      <option value="efectivo">Efectivo</option>
                      <option value="tarjetaCredito">Tarjeta Crédito</option>
                      <option value="tarjetaDebito">Tarjeta Dédito</option>
                    </select>

                    </div>
                  </div>

                  <div class="col-6">
                  <div class="input-group mb-3">            
                    <input type="text" class="form-control input-sm"  id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código Transacción" required>
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                              </div>
                            </div>
                  </div>
                  

                </div>

                

                </div>

              

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Guardar venta</button>
            </div>
            </form>

          </div>

        </div>
        <!-- END COLUMN LG-5 -->

        <!-- TABLA DE PRODUCTOS -->
        <div class="col-lg-7 hidden-md hidden-sm d-none d-sm-block">
        
        <div class="card card-warning card-outline">
          <div class="card-header"></div>

          <div class="card-body">
            <table class="table table-bordered table-striped dt-responsive tablas">

              <thead>
                <tr>
                <th style="width:10px;">#</th>
                <th>Imágen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>1</td>
                  <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
                  <td>00123</td>
                  <td>Lorem ipsum</td>
                  <td>20</td>
                  <td>
                    <div class='btn-group'>

                      <button class='btn btn-primary btn-sm'>Agregar</button>

                      

                      </div>
                  </td>
                </tr>
              </tbody>

            </table>
          </div>
        </div>

        </div>

      </div>

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