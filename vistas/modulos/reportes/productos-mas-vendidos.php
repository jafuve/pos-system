<?php

$item = null;
$valor = null;
$orden = "ventas";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$colores = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");

$totalVentas = ControladorProductos::ctrMostrarSumaVentas();

$labels = $data = $colors = "";
for($i = 0; $i <10; $i++){
    $labels .= "'" . $productos[$i]["descripcion"] . "',";
    $data .= ceil($productos[$i]["ventas"]*100/$totalVentas["total"]) . ",";
    $colors .= "'" . $colores[$i] . "',";
}

?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Productos más vendidos</h3>
    </div>
              <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-5">
                    <ul class="chart-legend clearfix">


                    <?php
                        for($i = 0; $i < 10; $i++){
                            echo '<li><i class="far fa-circle text-' . $colores[$i] .  '"></i> ' . $productos[$i]["descripcion"] . ' </li>';
                            // echo ' <li><i class="fa fa-circle text-'.$colores[$i].'"></i> '.$productos[$i]["descripcion"].'</li>';
                        }
                    ?>

                      
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
    </div>
              <!-- /.card-body -->
    <div class="card-footer bg-white p-0">
        <ul class="nav nav-pills flex-column">

        <?php

          	for($i = 0; $i <5; $i++){
			
          		echo '<li class="nav-item">
                  <a href="#" class="nav-link">
                    ' . $productos[$i]["descripcion"] . '
                    <span class="float-right text-' . $colores[$i] . '">
                      <i class="fas fa-arrow-down text-sm"></i>
                      '.ceil($productos[$i]["ventas"]*100/$totalVentas["total"]).'%
                      </span>
                  </a>
          </li>';

			}

			?>
            
            

                </ul>
    </div>
              <!-- /.footer -->
</div>

<script>
var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          <?php echo $labels; ?>
      ],
      datasets: [
        {
          data: [ <?php echo $data; ?> ],
          backgroundColor : [<?php echo $colors; ?>],
        }
      ]
    }
    
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })
</script>