<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>bManager System</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

  <!-- ====================
  Plugin de CSS
  ===================== -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables/dataTables.bootstrap4.css">
  <!-- DataTables Responsive-->
  <link rel="stylesheet" href="vistas/plugins/datatables/responsive.bootstrap.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Date Range Picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- ChartJS -->
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>


  <!-- ====================
  Plugin de Javascript
  ===================== -->
  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="vistas/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.js"></script>
  <script src="vistas/plugins/datatables/dataTables.bootstrap4.js"></script>
  <!-- DataTables Responsive-->
  <script src="vistas/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables/responsive.bootstrap.min.js"></script>
  <!-- SweetAlert2-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- InputMask -->
  <script src="vistas/plugins/inputmask/jquery.inputmask.bundle.js"></script>
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <!-- JQUERY NUMBER -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>
  <!-- JQUERY NUMBER -->
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
  

</head>

<!-- ====================
  CUERPO DOCUMENTO
  ===================== -->

<body class="hold-transition sidebar-collapse sidebar-mini login-page">



<?php
if( isset($_SESSION["iniciarSesion"])  && $_SESSION["iniciarSesion"] == "ok"){
  echo '<div class="wrapper">';
  /*===========================
  CABEZOTE
  ===========================*/
  include "modulos/cabezote.php";

  /*===========================
  MENU
  ===========================*/
  include "modulos/menu.php";


  /*===========================
  CONTENIDO
  ===========================*/
if(isset($_GET['ruta'])){
  if($_GET["ruta"] == "inicio" ||
  $_GET["ruta"] == "usuarios" ||
  $_GET["ruta"] == "categorias" ||
  $_GET["ruta"] == "productos" ||
  $_GET["ruta"] == "clientes" ||
  $_GET["ruta"] == "ventas" ||
  $_GET["ruta"] == "crear-venta" ||
  $_GET["ruta"] == "editar-venta" ||
  $_GET["ruta"] == "reportes" ||
  $_GET["ruta"] == "salir"){
    include "modulos/" . $_GET["ruta"] . ".php";
  }else{
    include "modulos/404.php";
  }
}else{
  include "modulos/inicio.php";
}

  
  

  /*===========================
  FOOTER
  ===========================*/
  include "modulos/footer.php";
  echo '</div>';
}else{
  include "modulos/login.php";
}


?>


<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>
</body>
</html>
