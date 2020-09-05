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
            <form role="form" method="post" class="formularioVenta">
            <div class="card-body">
              <?php
                $item = "id"; 
                $valor = $_GET['idVenta'];
                $venta = ControladorVentas::ctrMostrarVentas($item, $valor);
                
                $itemUsuario = "id";
                $valorUsuario = $venta["id_vendedor"];

                $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                $itemCliente = "id";
                $valorCliente = $venta["id_cliente"];

                $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                $porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];
              ?>
              

                <div class="form-group">
                
                <!-- INPUT VENDEDOR -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $vendedor['nombre']; ?>" readonly>

                  <input type="hidden" class="form-control input-lg" id="idVendedor" name="idVendedor" value="<?php echo $vendedor['id']; ?>" readonly>
                </div>

                <!-- INPUT NUEVA VENTA -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control input-lg" id="editarVenta" name="editarVenta" value="<?php echo $venta['codigo']; ?>" readonly>
                  
                </div>

          

                <!-- INPUT NUEVA VENTA -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  
                  <select class="custom-select"  name="seleccionarCliente" id="seleccionarCliente" required>
                    <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre']; ?></option>
                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>
                  </select>
                  

                  <div class="input-group-append">
                    
                      <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button>
                    
                  </div>

                </div>

                <!-- INPUT PRODUCTO -->

                <div class="form-group row nuevoProducto">
                 
                <?php

                $listaProducto = json_decode($venta["productos"], true);

                foreach ($listaProducto as $key => $value) {

                  $item = "id";
                  $valor = $value["id"];
                  $orden = "id";

                  $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                  $stockAntiguo = $respuesta["stock"] + $value["cantidad"];

                  echo '
                  <div class="row"> 
                    
                  <div class="col-6" style="padding-right: 0px;"> 

                      <div class="input-group mb-3"> 
                        <div class="input-group-prepend"> 
                          <button type="button" class="btn btn-danger quitarProducto" idProducto="'.$value["id"].'"><i class="fa fa-times"></i></button> 
                        </div> 

                        <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" readonly required>
                      </div> 

                    </div>

                    <div class="col-3" > 
                      <input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" required> 
                    </div> 

                    <div class="col-3 ingresoPrecio" style="padding-left: 0px;">

                      <div class="input-group mb-3"> 
                        <div class="input-group-prepend"> 
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span> 
                        </div> 
                        <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["precio_venta"].'" name="nuevoPrecioProducto" value="'.$value["total"].'" readonly required>

                      </div> 
                    </div>
                  </div>
                  ';
                }


                ?>
                  

                </div>

                <!--  -->
                <input type="hidden" id="listaProductos" name = "listaProductos">

                <!-- BUTTON ADD PRODUCT -->
                <button type="button" class="btn btn-default d-lg-none d-xl-none btnAgregarProducto">Agregar producto</button>

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
                              <input type="text" class="form-control input-lg" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="<?php echo $porcentajeImpuesto; ?>">
                              <input type="hidden" id="nuevoPrecioImpuesto" name="nuevoPrecioImpuesto" value="<?php echo $venta['impuesto']; ?>" required>
                              <input type="hidden" id="nuevoPrecioNeto" name="nuevoPrecioNeto" value="<?php echo $venta['neto']; ?>" required>
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
                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="<?php echo $venta['neto']; ?>" value="<?php echo $venta['total']; ?>" readonly>

                              <input type="hidden" id="totalVenta" name="totalVenta" value="<?php echo $venta['total']; ?>">
                              
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
                      <option value="Efectivo">Efectivo</option>
                      <option value="TC">Tarjeta Crédito</option>
                      <option value="TD">Tarjeta Dédito</option>
                    </select>

                    </div>
                  </div>

                  <div class="cajasMetodoPago col"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                  <!-- <div class="col-6">
                  <div class="input-group mb-3">            
                    <input type="text" class="form-control input-sm"  id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código Transacción" required>
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                              </div>
                            </div>
                  </div> -->
                  

                </div>

                

                </div>

              

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Guardar cambios</button>
            </div>
            </form>

            <?php
            $editarVenta = new ControladorVentas();
            $editarVenta->ctrEditarVenta();
            ?>

          </div>

        </div>
        <!-- END COLUMN LG-5 -->

        <!-- TABLA DE PRODUCTOS -->
        <div class="col-lg-7 d-none d-lg-block d-xl-block">
        
        <div class="card card-warning card-outline">
          <div class="card-header"></div>

          <div class="card-body">
            <table class="table table-bordered table-striped dt-responsive tablaVentas">

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
      <form role="form" method="post" >
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