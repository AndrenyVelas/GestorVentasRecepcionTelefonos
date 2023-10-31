    <!-- Content Header (Page header) -->

<script src="../js/venta.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
          <div class="col-lg-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"><b>Listado de Ventas</b></h3><label for="" id="text_estado" hidden "></label>
                <button class="btn btn-info btn-sm float-right" id="textnuevaventa" onclick="cargar_contenido('contenido_principal','venta/mantenimiento_venta_registrar.php');"><i class="fas fa-plus"></i> Nuevo</button>
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
                      <button class="btn btn-info btn-sm" onclick="Listar_Venta()"><i class="fas fa-search"></i></button>
                      
                  </div>

                </div><br>
              <div class="row">
                <div class="col-12 table-responsive" >
                  <table id="tabla_venta" class="display compact">
                      <thead style="background:#343A40; color:white">
                          <tr>
                              <th style="width:1%">#</th>
                              <th >Cliente </th>
                              <th >Comprobante</th>
                              <th >Serie</th>
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


          
  <!-- Modal EDITAR VENTA -->
      <div class="modal fade" id="modal_editar_venta"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#343A40; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Visualizaci&oacute;n de venta: <label for="" id="ver_venta"> </label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-12">
            <div class="card ">
              
            <div class="card-body">

                <div class="row">
                  <div class="col-7">
                    <label form="">Cliente</label>
                    <input type="text" id="text_idcliente_e" hidden="">
                    <input type="text" id="text_idventa_e"  hidden="">
                    <select class="js-example-basic-single" id="select_cliente2_e" disabled style="width:100%">
                      
                    </select>
                  </div>
                  <div class="  col-1 col-xs-12">
                    <label for="">&nbsp;</label><br>
                   
                  </div>
                  <div class="col-4">
                    <label form="">Impuesto</label>
                    <input type="text" name="" class="form-control form-control-sm" id="text_impuesto_e" disabled>
                  </div>

                  <div class="col-4">
                    <input type="text" id="text_idcompro_e" hidden >
                    <input type="text" id="text_compro_e" hidden >
                    <label form="">Comprobante</label>
                    <select class="js-example-basic-single"  id="select_tipo_com_e"  style="width:100%" disabled>

                    </select>
                  </div>

                  <div class="col-4">
                    <label form="">Serie</label>
                    <input type="text" name="" class="form-control form-control-sm" id="text_serie_e" disabled>
                  </div>
                  <div class="col-4">
                    <label form="">Numero</label>
                    <input type="text" name="" class="form-control form-control-sm" id="text_num_compro_e" disabled>
                  </div>


                  <div class="col-sm-4">
                    <label form="">Forma de pago</label>
                    <input type="text" id="text_idformapagoV" hidden >

                    <select class="js-example-basic-single" id="select_forma_pago_V_e" disabled style="width:100%">
                      
                    </select>
                  </div>

                  <div class="col-sm-8">
                    <label form="">Observacion</label>
                    <input type="text" name="" class="form-control form-control-sm" disabled id="text_comentario_e" >
                  </div>

                  
                  <div class="col-sm-4">
                    <label form="">Estado</label>
                    <input type="text" id="text_idformapagoV" hidden >

                    <select class="js-example-basic-single" id="select_estado" disabled style="width:100%">
                       <option value="REGISTRADA">REGISTRADA</option><!--iniciar el select  en el script -->
                        <option value="PAGADA">PAGADA</option>
                        <option value="ANULADA">ANULADA</option>
                    </select>
                  </div>

                  <div class="col-12" style="text-align: center;"  >
                  <br>
                  <button class="btn btn-info btn-lg  btn-sm" id="btnmodificar" onclick="Estado_Venta();"><i class="fa fa-save"></i> Modificar</button>
                </div>



                  <div class="col-4" hidden="">
                    <label form="">Productos</label>
                    <input type="text" id="text_nombre_producto_e" hidden >
                    <input type="text" id="text_idproducto_e" hidden="" >
                    <select class="js-example-basic-single" id="text_producto_e" style="width:100%" >
                      
                    </select>
                  </div>
                  <div class="col-2" hidden="">
                    <label form="">Stock</label>
                    <input type="text" name="" class="form-control form-control-sm" id="text_stock_e" disabled placeholder="Stock">
                  </div>
                  <div class="col-3" hidden=""> 
                    <label form="">Precio</label>
                    <input type="text" name="" class="form-control form-control-sm" id="text_precio_e" disabled placeholder="Precio" >
                  </div>
                  <div class="col-2" hidden="">
                    <label form="">Cantidad</label>
                    <input type="number" name="" class="form-control form-control-sm" id="text_cantidad_e" onkeypress="return soloNumeros(event)"  placeholder="Cantidad">
                  </div>
                  <div class="col-1" hidden="">
                    <label form="">&nbsp;</label><br>
                    <button class="btn btn-success btn-sm" onclick="Agregar_Producto();"><i class="fas fa-plus"></i></button>
                  </div>

                  <div class="col-12" style="text-align: center;" hidden >
                  <br>
                  <button class="btn btn-info btn-lg  btn-sm" onclick=""><i class="fa fa-save"></i> Modificar</button>
                </div>


                <div class="col-12 table-responsive"><br>
                  <table id="tabla_detalle_pro_editar" class="display compact" style="width: 100%">
                      <thead style="background: #4f5962;color: #ffffff;">
                          <tr><!-- se envian los datos el serverside -->
                              <th>Id</th>
                              <th >Producto</th>
                              <th>Precio</th>                            
                              <th>Cantidad</th>
                              <th>Sub T</th>
                            <!--  <th style="text-align: center;">Accion</th> -->
                          </tr>
                      </thead>
                      <tbody id="tbody_tabla_detalle_pro">
                    
                      </tbody>
                  </table>
                  <div> <br>
         
                      <div class="form-group row">
                        <label for="" class="col-form-label">SubTotal</label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control form-control-sm" id="lbl_subtotal_e" disabled>
                        </div>

                        <label for="" class="col-form-label">Impuesto</label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control form-control-sm" id="lbl_impuesto_e" disabled>
                        </div>

                        <label for="" class="col-form-label">Total</label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control form-control-sm" id="lbl_totalneto_e" disabled>
                        </div>
                    </div>
               


                    
                  </div><br>

                </div>


                </div> 
    
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
    cargar_SelectCliente_Editar();
    cargar_Select_FormaPAgo_v_Editar();
    cargar_SelectComprobante_Editar();
    Traer_estado_caja();
  
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
 Listar_Venta();


  	  

/********************************************************************
       CARGAR CLIENTES EN COMBO EDITAR
********************************************************************/
function cargar_SelectCliente_Editar(){//enviamos al scrpit mantenimiento examen
		$.ajax({
		  url:'../controller/recepcion/controlador_cargar_select_cliente.php',
		  type: 'POST'
		}).done(function(resp){
		  let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		  let llenardata = "<option value=''>Seleccione</option>";
		  if (data.length>0) {
			for (let i = 0; i < data.length; i++) {
			  llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
			//document.getElementById('select_cliente2').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
			document.getElementById('select_cliente2_e').innerHTML = llenardata;
		  }else{
			llenardata+="<option value=''>No se encontraron datos</option>";
			//document.getElementById('select_cliente2').innerHTML = llenardata;
			document.getElementById('select_cliente2_e').innerHTML = llenardata;
	  
		  }
		})
	   }


     

/********************************************************************
       CARGAR FORMA DE PAGO EN COMBO EDITAR
********************************************************************/
function cargar_Select_FormaPAgo_v_Editar(){//enviamos al scrpit mantenimiento examen
		$.ajax({
		  url:'../controller/cotizacion/controlador_cargar_select_forma_pago.php',
		  type: 'POST'
		}).done(function(resp){
		  let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		  let llenardata = "<option value=''>Seleccione</option>";
		  if (data.length>0) {
			for (let i = 0; i < data.length; i++) {
			  llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
			document.getElementById('select_forma_pago_V_e').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
		  }else{
			llenardata+="<option value=''>No se encontraron datos</option>";
			document.getElementById('select_forma_pago_V_e').innerHTML = llenardata;
	  
		  }
		})
	   }
	  


/********************************************************************
    COMPROBANTE EN COMBO EDITAR
 ********************************************************************/

 function cargar_SelectComprobante_Editar(){//enviamos al scrpit mantenimiento examen
  $.ajax({
    url:'../controller/venta/controlador_cargar_select_comprobante.php',
    type: 'POST'
  }).done(function(resp){
    let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
    let llenardata = "<option value=''>Seleccione</option>";
    if (data.length>0) {
      for (let i = 0; i < data.length; i++) {
        llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
      }
      document.getElementById('select_tipo_com_e').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar

    }else{
      llenardata+="<option value=''>No se encontraron datos</option>";
      document.getElementById('select_tipo_com_e').innerHTML = llenardata;

    }
  })
 }






</script>