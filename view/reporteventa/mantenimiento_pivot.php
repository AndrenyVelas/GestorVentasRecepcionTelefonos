    <!-- Content Header (Page header) -->

    <script src="../js/reporteventa.js?rev=<?php echo time();?>"></script>
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
													<h6 class="card-title" style="text-align:center"><b>Pivot Ventas</b></h6>
															<div class="card-tools">
															<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
															<i class="fas fa-minus"></i>
															</button>

															</div>
														</div>
															 <div class="card-body">
															 	  <div class="row">
										                </div><br>
										              <div class="row">
										                <div class="col-12 table-responsive" >
										                  <table id="tabla_pivot_ventas" class="display compact" style="width:100%">
										                      <thead style="background:#343A40; color:white">
										                          <tr>
										                              <th>Año</th>
										                              <th>Enero </th>
										                              <th>Febrero</th>
                                                                      <th>Marzo</th>
                                                                      <th>Abril</th>
                                                                      <th>Mayo</th>
                                                                      <th>Junio</th>
                                                                      <th>Julio</th>
                                                                      <th>Agosto</th>
                                                                      <th>Setiembre</th>
                                                                      <th>Octubre</th>
                                                                      <th>Noviembre</th>
                                                                      <th>Diciembre</th>
																	  <th>Total</th>
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
													<h6 class="card-title" style="text-align:center"><b>Record por Año de Usuarios</b></h6>
															<div class="card-tools">
															<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
															<i class="fas fa-minus"></i>
															</button>

															</div>
														</div>
															 <div class="card-body">
															 	  <div class="row">

																   <div class="col-6 ">
                        
																	<label form="">Año</label>
																	<select class="form-control form-control-sm js-example-basic-single" id="select_anio_venta_record_u" style="width: 60%"> 
																	
																	</select>
																</div>
                  
														          <div>
																 	 <label for="">&nbsp;</label><br>
														          	  <button class="btn btn-info btn-sm" onclick="Listar_record_Venta_anio();validar();"><i class="fas fa-search"></i></button>
														          </div>

										                </div><br>
										              <div class="row">
										                <div class="col-12 table-responsive" >
										                  <table id="tabla_reporte_record_venta_usuario" class="display compact">
										                      <thead style="background:#343A40; color:white">
										                          <tr>
										                              <th >Año</th>
										                              <th >Usuario</th>
										                              <th >Cant. Ventas </th>
										                              <th >Total</th>
										                          </tr>
		                     								 </thead>
															  <tfoot>
																	<tr>
																		<th></th>
																		<th></th>
																		<th></th>
																		<th></th>
																		
																	</tr>
																</tfoot>
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
													<h6 class="card-title" style="text-align:center"><b>Record de Ventas por  Usuarios</b></h6>
															<div class="card-tools">
															<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
															<i class="fas fa-minus"></i>
															</button>

															</div>
														</div>
															 <div class="card-body">
															 	  <div class="row">

																   <div class="col-5">
																		<label for="">Usuario</label>
																	   <select class="form-control form-control-sm js-example-basic-single" id="select_usuario" style="width: 70%"> </select>
										                           </div>

																	<div class="col-5">
																		<label for="">Año</label>
																	   <select class="form-control form-control-sm js-example-basic-single" id="select_anio_usuario" style="width: 70%"> </select>
																	</div>

																	<div class="col-2">
																				<label for="">&nbsp;</label><br>
																				<button class="btn btn-info btn-sm" onclick="Listar_record_usuario();validar2();"><i class="fas fa-search"></i></button>
																				
																    </div>

										                </div><br>
										              <div class="row">
										                <div class="col-12 table-responsive" >
										                  <table id="tabla_record_usuario_a" class="display compact">
										                      <thead style="background:#343A40; color:white">
										                          <tr>
										                              <th >Año</th>
										                              <th >Mes</th>
																	  <th >Usuario</th>
										                              <th >Cant. Ventas </th>
										                              <th >Total</th>
										                          </tr>
		                     								 </thead>
															  <tfoot>
																	<tr>
																		<th></th>
																		<th></th>
																		<th></th>
																		<th></th>
																		<th></th>
																		
																	</tr>
																</tfoot>
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
	
	cargar_SelectAnio_record_usu();
	cargar_SelectAnio_Venta_usua_detallado();
	cargar_Select_Usuarios();

    Listar_pivot_ventas();

	Listar_record_Venta_anio();
	Listar_record_usuario();

 });

 function validar(){
   		let anio = document.getElementById('select_anio_venta_record_u').value;
		 if (anio.length == 0 ) {
			 return Swal.fire("Mensaje de Advertencia","Seleccione un Año","warning");
		 }
	}

	function validar2(){
   	let usuario = document.getElementById('select_usuario').value;
   	let anio = document.getElementById('select_anio_usuario').value;
   	if (usuario.length == 0 ) {
 		return Swal.fire("Mensaje de Advertencia","Seleccione un Usuario","warning");
 			}
 			if (anio.length == 0 ) {
 		return Swal.fire("Mensaje de Advertencia","Seleccione un Año","warning");
 			}
   }



</script>