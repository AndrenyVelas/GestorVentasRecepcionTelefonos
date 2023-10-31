    <!-- Content Header (Page header) -->

<script src="../js/cotizacion.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
          <div class="col-lg-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"><b>Listado de Cotizaciones</b></h3>
                <button class="btn btn-info btn-sm float-right" onclick="cargar_contenido('contenido_principal','cotizacion/mantenimiento_cotizacion_registrar.php')"><i class="fas fa-plus"></i> Nuevo</button>
              </div>
              <div class="card-body">
                <div class="row">
                  
                   <div class="col-5">
                      <label for="">Fecha Inicio</label>
                      <input type="date" name="" id="text_finicio" class="form-control  form-control-sm">
                  </div>
                  <div class="col-5">
                      <label for="">Fecha Fin</label>
                      <input type="date" name="" id="text_ffin" class="form-control  form-control-sm">
                  </div>
                    <div class="col-2">
                       <label for="">&nbsp;</label><br>
                      <button class="btn btn-info btn-sm" onclick="Listar_Cotizacion()"><i class="fas fa-search"></i></button>
                      
                  </div>

                </div><br>
              <div class="row">
                <div class="col-12 table-responsive" >
                  <table id="tabla_cotizacion" class="display compact">
                      <thead style="background:#343A40; color:white">
                          <tr>
                              <th style="width:1%">#</th>
                              <th >Cliente </th>
                              <th >Comprobante</th>
                              <th >Monto</th>
                              <th >Fecha</th>
                              <th >Usuario</th>
                              <th style="text-align: center;">Estado</th>
                              <th style="text-align: center;">Accion</th>
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
 });
 

  var     f = new Date();
  var anio = f.getFullYear();
  var mes  = f.getMonth()+1;
  var d    = f.getDate();


  if (d<10) {
    d='0'+d;
  }
  if (mes<10) {
    mes='0'+mes;
  }



  document.getElementById('text_finicio').value=anio+"-"+mes+"-"+d;
  document.getElementById('text_ffin').value=anio+"-"+mes+"-"+d;
 Listar_Cotizacion();

</script>