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
            <h1>Reportes de ventas</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Tablero</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <section class="content">

      
      <div class="card">
        <div class="card-header">

        <div class="input-group">
                
                <button  type="button" class="btn btn-default float-right" id="daterange-btn2">
                  <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                  </span>
                  <i class="fa fa-caret-down"></i>
                </button>
                
                <div class="input-group-append">
                <button id="btn-clear-range2" class="btn btn-outline-danger" type="button"><i class="far fa-window-close" title="Limpiar rango de búsqueda"></i></button>
                </div>
          </div>
          

          <div class="card-tools">

          <?php

          if(isset($_GET["fechaInicial"])){

            echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

          }else{

            echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

          }         

          ?>

            <button class="btn btn-success" style="margin-top:5px;">Descargar reporte en Excel</button>
            </a>
          </div>
        </div>
        <div class="card-body">

          <div class="row">

            <div class="col-12">

              <?php
              include "reportes/grafico-ventas.php";
              ?>


            </div>

            <div class="col-md-6">

            <?php
              include "reportes/productos-mas-vendidos.php";
              ?>

            </div>

            <div class="col-md-6">

            <?php
              include "reportes/vendedores.php";
            
              include "reportes/compradores.php";
              ?>

            </div>



          </div>
          
        </div>
        
        
      </div>
      

    </section>
    
  </div>
  