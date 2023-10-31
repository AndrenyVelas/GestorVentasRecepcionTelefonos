   <!-- Content Header (Page header) -->
<script src="../js/servicio.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">


        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
          <div class="col-lg-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title" style="text-align:center;"><b>Registro de Servicios</b></h3>
              </div>
              <div class="card-body">
              <div class="row">

                <div class="col-5   col-xs-12" >
                      <input type="text" id="idcliente" hidden="" >
                      <input type="text" id="text_idrecepcion" hidden="" >
                        <label>Cliente:</label>
                        <input type="text" id="text_cliente" class="form-control form-control-sm" disabled="" maxlength="" placeholder="Cliente">
               </div>
                <div class="col-6 col-xs-12">
                          <label>Concepto:</label>
                         <input type="text" id="text_concepto" class="form-control form-control-sm" disabled="" placeholder="Cocepto de la recepcion">
               </div>
               <div class="  col-1 col-xs-12">
                    <label for="">&nbsp;</label><br>
                   <button class="btn btn-success btn-sm" title="Buscar Recepcion" onclick="AbrirModalVerRecepcion()"><i class="fa fa-search"></i> </button>
              </div>



              <div class="col-3 col-xs-12">
                          <label>Monto:</label>
                        <input type="text" id="text_monto" class="form-control form-control-sm" disabled="" placeholder="Monto">
                </div>
                <div class="col-3  col-xs-12">
                          <label>Adelanto:</label>
                        <input type="text" id="text_adelanto" class="form-control form-control-sm" disabled="" placeholder="Adelanto">
                </div>
                <div class="col-3 col-xs-12">
                          <label>Pendiente:</label>
                       <input type="text" id="text_pendiente" class="form-control form-control-sm" disabled="" placeholder="Pendiente">
                </div>
                 <div class="col-3  col-xs-12">
                          <label>Entrega:</label>
                         <input type="text" id="text_frecepcion" class="form-control form-control-sm" disabled="" placeholder="Fecha">
                </div>


                <div class="col-7 col-xs-12">
                          <label>Comentario:</label>
                        <input type="text" id="text_comentario" class="form-control form-control-sm" placeholder="Comentario del servicio">
               </div>
               <div class="col-5 col-xs-12">
                          <label>Se entrego a:</label>
                       <input type="text" id="text_responsable" class="form-control form-control-sm" onkeypress="return soloLetras(event)" placeholder="Se entrego a">
               </div>


                <div class="col-12" style="text-align: center;">
                  <br>
                  <button class="btn btn-info btn-lg  btn-sm" onclick="RegistrarServicio();"><i class="fa fa-save"></i> Registrar</button>
                </div>


              </div>  
             </div>
            </div>
          </div>
<!-- final del header -->


<!-- Modal ver paciente -->
<div class="modal fade" id="modal_ver_recepcion"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#343A40; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Seleccionar Recepcion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-12">
            <div class="card  card-outline card-tabs">
              
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="tabla_ver_recepcion" class="display compact" style="width: 100%">
                            <thead style="background:#343A40; color:white">
                                <tr>
                                    <th>Cliente</th>
                                    <th style="width: 30%;">Concepto</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                        </table>
                      </div>
                    </div>
                  </div>
            
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->

<!-- Modal ver medico -->
<div class="modal fade" id="modal_ver_medico"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccionar Medico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Lista de Medicos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Nuevo Medico</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="tabla_ver_medico" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nit</th>
                                    <th>Medico</th>
                                    <th>Especialdiad</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                      
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->

<script>
  //para el diseño del combo
  $(document).ready(function() {
    $('.js-example-basic-single').select2();

 });


  function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }


function soloNumeros(e){
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla==8){
          return true;
      }
          
      // Patron de entrada, en este caso solo acepta numeros
      patron =/[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
  }

Listar_Ver_Recepcion();










/*  Listar_Paciente();//llama al js//esta en sirverside
  Listar_Medico();

  $('#select_analisis').on('select2:select', function(e){
    let id = document.getElementById('select_analisis').value;
    cargar_SelectExamen(id);
  })*/

</script>