    <!-- Content Header (Page header) -->

    <script src="../js/usuario.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    

    
    <div class="col-lg-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"><b>Datos del Usuario</b></h3>
               
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-12 table-responsive" >
                  <table id="tabla_datos_usuario" class="display compact" style="width:100%">
                      <thead style="background:#343A40; color:white">
                          <tr>
                              <th>Usuario</th>
                              <th>Nombre</th>
                              <th>Rol</th>                 
                              <th >Estado</th>
                              <th>Foto</th>
                            <!--  <th style="text-align: center;">Accion</th> -->
                             
                          </tr>
                      </thead>

                  </table>
                  
                </div>
              </div>  
              </div>
            </div>
          </div>
                           





<script>
  //para el diseño del combo
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
    Listar_Datos_perfil_usuario();
 });



</script>