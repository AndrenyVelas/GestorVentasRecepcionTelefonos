    <!-- Content Header (Page header) -->

<script src="../js/reporteproducto.js?rev=<?php echo time();?>"></script>
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
													<h6 class="card-title" style="text-align:center"><b>Reporte Entrada y Salidas de productos</b></h6>
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
										                  <table id="tabla_reporte_producto_ensal" class="display compact">
										                      <thead style="background:#343A40; color:white ;width: 100%">
										                      	<!--	<tr>
										                      			<th style="background:white;"></th>
										                      			<th style="background:white;"></th>
										                      			<th style="background:white;"></th>
										                      			<th style="background:green;"></th>
										                      			<th style="background:red;"></th>
										                      			<th style="background:white;"></th>
										                      		</tr>-->
										                          <tr>
										                              <th >Codigo</th>
										                              <th >Producto</th>
										                              <th >Precio U.</th>
										                              <th >Ingresos</th>
										                              <th >Salidas</th>
										                              <th >Stock Actual</th>
										                          </tr>
		                     								 </thead>
															  <tfoot>
																	<tr>
																		<th></th>
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
 });
Listar_Reporte_Producto_EnSal();



</script>