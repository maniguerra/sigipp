<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header ">
          <a href="crear-venta">
              <button class="btn btn-primary">Agregar Venta</button>
          </a>
        </div>
        <div class="card-body">
          
          <table class="table table-striped table-bordered dt-responsive nowrap tablaVentas" id="tablaVentas" style="width:100%"> 
          
            <thead>
              <tr>
                <th style="width:10px">#</th>
                
                <th>Cliente</th>
                <th>Colaborador</th>
                <th>Forma de Pago</th>
                <th>Precio Servicio</th>
                <th>Precio Productos</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>012312</td>
                <td>Agustin</td>
                <td>Diego</td>
                <td>Efectivo</td>
                <td>$100</td>
                <td>$200</td>
                
                <td><?php echo date('d-m-Y h:m');?></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
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


