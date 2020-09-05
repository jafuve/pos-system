<?php

error_reporting(0);

if(isset($_GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

}else{

$fechaInicial = null;
$fechaFinal = null;

}

$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {
    
	#Capturamos sólo el año y el mes
	$fecha = substr($value["fecha"],0,7);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos las ventas
    $arrayVentas = array($fecha => $value["total"]);
    
    

	#Sumamos los pagos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {
		// $labels .= "'" . $value . "',";
        $sumaPagosMes[$key] += $value;
        
    }
    
    

}

$noRepetirFechas = array_unique($arrayFechas);

// JAFUVE VARIATION
$labels = $totals = "";

if($noRepetirFechas != null){
    foreach ($noRepetirFechas as $key) {
        $labels .= "'" . $key . "',";
        $totals .= "'" . $sumaPagosMes[$key] . "',";
    }
}


?>

<!--=====================================
GRÁFICO DE VENTAS
======================================-->
<div class="card bg-gradient-info">

              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Gráfico de ventas
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                <canvas class="chart" id="line-chart-ventas" style="height: 250px;"></canvas>
              </div>

              <!-- /.card-body -->
              <!-- <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  
                </div>
                
              </div> -->
              
            </div>

<!-- <div class="box box-solid bg-teal-gradient">
	
	<div class="box-header">
		
 		<i class="fa fa-th"></i>

  		<h3 class="box-title">Gráfico de Ventas</h3>

	</div>

	<div class="box-body border-radius-none nuevoGraficoVentas">

		<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>

  </div>

</div> -->

<script>

// CHART.JS

// Sales graph chart
var salesGraphChartCanvas = $('#line-chart-ventas').get(0).getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels  : [
        <?php echo $labels; ?>
        
    ],
    datasets: [
      {
        label               : 'Ventas Q',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#efefef',
        pointRadius         : 3,
        pointHoverRadius    : 7,
        pointColor          : '#efefef',
        pointBackgroundColor: '#efefef',
        data                : [
            <?php echo $totals; ?>
        ]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#efefef',
        },
        gridLines : {
          display : false,
          color: '#efefef',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 5000,
          fontColor: '#efefef',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesGraphChart = new Chart(salesGraphChartCanvas, { 
      type: 'line', 
      data: salesGraphChartData, 
      options: salesGraphChartOptions
    })
    
//   MORRIS
//  var line = new Morris.Line({
//     element          : 'line-chart-ventas',
//     resize           : true,
//     data             : [

//     <?php

//     if($noRepetirFechas != null){

// 	    foreach($noRepetirFechas as $key){

// 	    	echo "{ y: '".$key."', ventas: ".$sumaPagosMes[$key]." },";


// 	    }

// 	    echo "{y: '".$key."', ventas: ".$sumaPagosMes[$key]." }";

//     }else{

//        echo "{ y: '0', ventas: '0' }";

//     }

//     ?>

//     ],
//     xkey             : 'y',
//     ykeys            : ['ventas'],
//     labels           : ['ventas'],
//     lineColors       : ['#efefef'],
//     lineWidth        : 2,
//     hideHover        : 'auto',
//     gridTextColor    : '#fff',
//     gridStrokeWidth  : 0.4,
//     pointSize        : 4,
//     pointStrokeColors: ['#efefef'],
//     gridLineColor    : '#efefef',
//     gridTextFamily   : 'Open Sans',
//     preUnits         : '$',
//     gridTextSize     : 10
//   });

</script>