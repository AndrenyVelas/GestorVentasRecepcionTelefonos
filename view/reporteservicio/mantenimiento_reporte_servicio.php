    <!-- Content Header (Page header) -->

<script src="../js/reporteservicio.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
          <section class="content">
								<div class="container-fluid">
									<div class="row">
											<div class="col-12">

												<div class="card">
													<div class="card-header">
													<h6 class="card-title" style="text-align:center"><b>Reporte por Mes de Servicios</b></h6>
															<div class="card-tools">
															<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
															<i class="fas fa-minus"></i>
															</button>

															</div>
														</div>
															 <div class="card-body">
															 	  <div class="row">
                  
										                   <div class="input-group input-group-sm mb-3 col-6">
														              <div class="input-group-prepend">
														               <span class="input-group-text">Mes</span>

														              </div>
														               <select class="form-control form-control-sm js-example-basic-single" id="select_mes_servicio" style="width: 60%"> 
														               	<option value="">Seleccione</option>
														                <option value="1">Enero</option><!--iniciar el select 2 en el script -->
														                <option value="2">Febrero</option>
														                <option value="3">Marzo</option>
														                <option value="4">Abril</option>
														                <option value="5">Mayo</option>
														                <option value="6">Junio</option>
														                <option value="7">Julio</option>
														                <option value="8">Agosto</option>
														                <option value="9">Septiembre</option>
														                <option value="10">Octubre</option>
														                <option value="11">Noviembre</option>
														                <option value="12">Diciembre</option>
														               </select>
														          </div> 
														          <div>
														          	  <button class="btn btn-info btn-sm" onclick="Listar_Reporte_Servicio_Mes();validar();"><i class="fas fa-search"></i></button>
														          </div>

										                </div><br>
										              <div class="row">
										                <div class="col-12 table-responsive" >
										                  <table id="tabla_reporte_servicio_mes" class="display compact">
										                      <thead style="background:#343A40; color:white">
										                          <tr>
										                              <th style="width:25%">Cliente</th>
										                              <th style="width:30%">Concepto</th>
										                              <th >Monto</th>
										                              <th >Responsable</th>
										                              <th >Fecha</th>
										                          </tr>
		                     								 </thead>
		                 								  </table>
		               									</div>
		             									</div>  
             							 </div>
												</div>

											</div>
									</div>
								</div>
					</section>



					 <section class="content">
								<div class="container-fluid">
									<div class="row">
											<div class="col-12">

												<div class="card">
													<div class="card-header">
													<h6 class="card-title" style="text-align:center"><b>Reporte por Año de Servicios</b></h6>
															<div class="card-tools">
															<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
															<i class="fas fa-minus"></i>
															</button>

															</div>
														</div>
															 <div class="card-body">
															 	  <div class="row">
                  
										                     <div class="input-group input-group-sm mb-3 col-6 ">
															              <div class="input-group-prepend">
															               <span class="input-group-text">Año</span>
															              </div>
															               <select class="form-control form-control-sm js-example-basic-single" id="select_anio_servicio" style="width: 60%"> </select>
															          </div>
															       	<div>
														          	  <button class="btn btn-info btn-sm" onclick="Listar_Reporte_Servicio_Anio();validar2();"><i class="fas fa-search"></i></button>
														          </div>

															             <!--  <div class="col-4 col-xs-12">
													                    <label form="">Año</label>
													                    <input type="text" id="text_nombre_producto" hidden >
													                    <input type="text" id="text_idproducto" hidden="" >
													                    <select class="form-control form-control-sm  js-example-basic-single" id="select_anio_servicio" style="width:100%">   
													                    </select>
													                  </div>
													                  <div class="col-1">
														                    <label form="">&nbsp;</label><br>
														                    <button class="btn btn-info btn-sm"  onclick="Listar_Reporte_Servicio_Anio();validar2();"><i class="fas fa-search"></i></button>
														                 </div>-->
																			

										                </div><br>
										              <div class="row">
										                <div class="col-12 table-responsive" >
										                  <table id="tabla_reporte_servicio_anio" class="display compact">
										                      <thead style="background:#343A40; color:white">
										                          <tr>
										                              <th >Año</th>
										                              <th >Mes</th>
										                              <th >Cant. Servicios </th>
										                              <th >Monto</th>
										                          </tr>
		                     								 </thead>
		                 								  </table>
		               									</div>
		             									</div>  
             							 </div>
												</div>

											</div>
									</div>
								</div>
					</section>















<script>
  //para el diseño del combo
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
 });
Listar_Reporte_Servicio_Mes();
Listar_Reporte_Servicio_Anio();
cargar_SelectAnioServicio();

function validar(){
   	let mes = document.getElementById('select_mes_servicio').value;
   	if (mes.length == 0 ) {
 				return Swal.fire("Mensaje de Advertencia","Seleccione un Mes","warning");
 			}

   }


 function validar2(){
   
   	let anio = document.getElementById('select_anio_servicio').value;
 			if (anio.length == 0 ) {
 				return Swal.fire("Mensaje de Advertencia","Seleccione un Año","warning");
 			}
   }


</script>