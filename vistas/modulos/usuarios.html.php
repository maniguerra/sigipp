<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
         <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
        </div>
        <div class="card-body">
          
          <table class="table table-striped table-bordered tablas dt-responsive nowrap" style="width:100%"> 
          
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Último login</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Administrador</td>
                <td>admin</td>
                <td><img src="vistas\dist\img\avatar.png" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td><?php echo date('d-m-Y h:m');?></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>
                </td>
               
              </tr>
              <tr>
                <td>1</td>
                <td>Administrador</td>
                <td>admin</td>
                <td><img src="vistas\dist\img\avatar.png" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td><?php echo date('d-m-Y h:m');?></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                  </div>
                </td>
               
              </tr>
              <tr>
                <td>1</td>
                <td>Administrador</td>
                <td>admin</td>
                <td><img src="vistas\dist\img\avatar.png" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td><?php echo date('d-m-Y h:m');?></td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil-alt"></i></button>
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


<!-- Modal Agregar Usuario -->

<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data" action="">

                <div class="modal-header bg-dark">

                  <h5 class="modal-title">Agregar Usuario</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                  </button>

                </div>

                <div class="modal-body">

                  <div class="card-body">

                    <!-- Entrada para el nombre -->
                    <div class="form-group">

                      <div class="input-group">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>

                        <input class="form-control" type="text" name="nuevoNombre" placeholder="Ingresar nombre" required>

                      </div>
                    
                    </div>

                    <!-- Entrada para el usuario -->
                    <div class="form-group">

                      <div class="input-group">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>

                        <input class="form-control" type="text" name="nuevoUsuario" placeholder="Ingresar usuario" required>
                        
                      </div>
                    
                    </div>

                    <!-- Entrada para la contraseña -->
                    <div class="form-group">

                      <div class="input-group">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>

                        <input class="form-control" type="password" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                        
                      </div>
                    
                    </div>

                    <!-- Entrada para los permisos -->
                    <div class="form-group">

                      <div class="input-group">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"></i></span>
                        </div>

                        <select class="form-control input-lg" name="nuevoPerfil">
                          <option value="">Seleccione un perfil</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Especial">Especial</option>
                          <option value="Vendedor">Vendedor</option>

                        </select>
                        
                      </div>
                    
                    </div>

                    <!-- Entrada para los permisos -->
                    <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" width="20%"><i class="fa fa-camera"></i></span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile01">
                              <label class="custom-file-label" for="inputGroupFile01">Seleccionar foto</label>
                            </div>
                          </div>
                    </div>

                  </div>

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

      </form>
    </div>
  </div>
</div>