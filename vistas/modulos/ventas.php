
<div class="content-wrapper">

<?php
if($_SESSION["perfil"] == "Especial"){
  echo '<script>window.location = "inicio";</script>';
  return;
}

$xml = ControladorVentas::ctrDescargarXML();

if($xml){

  rename($_GET["xml"] . ".xml", "xml/" . $_GET["xml"] . ".xml");

  echo '<a href="ventas"><div class="alert alert-success alert-dismissible abrirXML" archivo="xml/' . $_GET["xml"] . '.xml">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i> Se ha creado el archivo XML correctamente.</h5>
</div></a>';
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar ventas</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar ventas</li>
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
          
        <a href="crear-venta">
        <button class="btn btn-primary">Agregar venta</button>
        </a>

        <div class="form-group float-right">
              <div class="input-group mb-3">
                
                <button  type="button" class="btn btn-default float-right" id="daterange-btn">
                  <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                  </span>
                  <i class="fa fa-caret-down"></i>
                </button>
                
                <div class="input-group-append">
                <button id="btn-clear-range" class="btn btn-outline-danger" type="button"><i class="far fa-window-close" title="Limpiar rango de búsqueda"></i></button>
                </div>
              </div>
        </div>

        
          
        </div>

        <div class="card-body">
          
          <table class="table table-bordered table-striped tablas dt-responsive" width="100%">

            <thead>
              <tr>
                <th style="width:10px;">#</th>
                <th>Código factura</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Forma de pago</th>
                <th>Neto</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
             
            <?php

            if(isset($_GET['fechaInicial'])){
              $fechaInicial = $_GET['fechaInicial'];
              $fechaFinal = $_GET['fechaFinal'];
            }else{
              $fechaInicial = $fechaFinal = null;
            }

            $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

            foreach ($respuesta as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["codigo"].'</td>';

                    $itemCliente = "id";
                    $valorCliente = $value["id_cliente"];

                    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                    echo '<td>'.$respuestaCliente["nombre"].'</td>';

                    $itemUsuario = "id";
                    $valorUsuario = $value["id_vendedor"];

                    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    echo '<td>'.$respuestaUsuario["nombre"].'</td>

                    <td>'.$value["metodo_pago"].'</td>

                    <td> '.number_format($value["neto"],2).'</td>

                    <td> '.number_format($value["total"],2).'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group btn-group-sm">

                        <a class="btn btn-success" href="index.php?ruta=ventas&xml='.$value["codigo"].'">xml</a>
                          
                        <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'"><i class="fa fa-print"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){
                          echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'" ><i class="fas fa-pencil-alt"></i></button>

                        
                        <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                        }

                      echo '</div>  

                    </td>

                  </tr>';
              }

            ?>

             </tbody>

          </table>

          <?php
            $eliminarVenta = new ControladorVentas();
            $eliminarVenta->ctrEliminarVenta();
          ?>


        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->
      <div>&nbsp</div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

