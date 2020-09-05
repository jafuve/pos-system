<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
             
             <tr>
               <td>#</td>
               <td>1000123</td>
               <td>Juanito Maravilla</td>
               <td>Vladimir Putin</td>
               <td>Efectivo</td> 
               <td>$ 1,000.00</td>
               <td>$ 1,190.00</td>
               <td>2019-01-01 20:00:00</td>
               <td>
                 <div class="btn-group">
                   <button class="btn btn-info btn-sm" style="color:white;"><i class="fas fa-print"></i></button>
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


