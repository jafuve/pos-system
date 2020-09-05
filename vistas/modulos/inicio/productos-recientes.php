<?php

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Productos recientes</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">

                <ul class="products-list product-list-in-card pl-2 pr-2">

                <?php
                
                for($i = 0; $i < 10; $i++){
                    echo '<li class="item">
                    <div class="product-img">
                      <img src="'.$productos[$i]["imagen"].'" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">'.$productos[$i]["descripcion"].'
                        <span class="badge badge-warning float-right">$'.$productos[$i]["precio_venta"].'</span></a>
                    </div>
                  </li>';
                }

                ?>

                    

                  
                  
                  
                  
                </ul>
              </div>
              
              <div class="card-footer text-center">
                <a href="productos" class="uppercase">Ver todos los productos</a>
              </div>
              
            </div>