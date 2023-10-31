 /********************************************************************
 		LISTAR PRODUCTO CON METODO NORMAL
 ********************************************************************/
var tbl_producto;
 function Listar_Producto(){//enviarlo al scrip en MANTENIMIENTO ROL
	tbl_producto = $("#tabla_producto").DataTable({
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"processing": true,
		"ajax" : {
			"url": "../controller/producto/controlador_producto_listar.php",
			type: 'POST'
		},
		"dom": 'Blfrtip',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "title": 'Reporte Productos',
		       "exportOptions":{
		        	'columns':[0,1,2,3,4,5,6,7]
		        },
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel'
		    },			
		],
		"columns":[
		//todos los datos del procedimiento almacenado
		//{"defaultContent": ""},//cintador 
		{"data": "producto_codigo"},
		{"data": "producto_codigo_general"},
		{"data": "producto_nombre"},
		{"data": "marca_descripcion"},
		{"data": "unidad_medida"},
		{"data": "producto_stock",
			render: function(data,type,row){
				if (data <= 2 ) {
					return "<center>"+'<span class="badge badge-danger">'+data+'</span>';+"</center>"
				}else{
					return "<center>"+'<span class="badge badge-success">'+data+'</span>';+"</center>"
				}
				
			}
		},
		{"data": "producto_pcompra"},
		{"data": "producto_pventa"},
		{"data": "producto_foto",
			render: function(data,type,row){
					return '<img class="img-responsive" style="width:40px;" src="../'+data+'">';
			}
		},
		{"data": "producto_estado",
			render: function(data,type,row){
				if (data==="ACTIVO") {
					return "<center>"+'<span class="badge badge-success">ACTIVO</span>';+"</center>"
				}else{
					return "<center>"+'<span class="badge badge-danger">INACTIVO</span>';+"</center>"
				}
			}
		},
		{"defaultContent": "<center>"+"<span class=' editar text-primary px-1' style='cursor:pointer;' title='Editar datos'><i class= 'fa fa-edit'></i></span><span class=' aumentar text-success px-1' style='cursor:pointer;' title='Aumentar Stock'><i class= 'fa fa-plus'></i></span><span class=' disminuir text-danger px-1' style='cursor:pointer;' title='Salida directa'><i class= 'fa fa-minus'></i></span><span class=' codigoqr text-secondary px-1' style='cursor:pointer;' title='Generar codigo Qr'><i class= 'fa fa-qrcode'></i></span>&nbsp;<span class=' eliminarp text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar'><i class='fa fa-trash'></i></span>&nbsp;<span class='foto text-info px-1' style='cursor:pointer;' title='Cambiar foto'><i class='fa fa-image'></i>"+"</center>"}

		],
		"language":idioma_espanol,
		select:true
	});
	/*contador en cada tabla
	tbl_producto.on('draw.td',function(){
		var PageInfo = $("#tabla_producto").DataTable().page.info();
		tbl_producto.column(0,{page: 'current'}).nodes().each(function(cell,i){
			cell.innerHTML = i + 1 + PageInfo.start;
		});
	});*/
 }	


  
  /**********************************************************************
 		  MODAL eliminar STOCK
 ***********************************************************************/
		   $('#tabla_producto').on('click', '.eliminarp', function() {//class EDITAR tiene que ir en el boton
		
			var data = tbl_producto.row($(this).parents('tr')).data();//tamaño de escritorio
			if (tbl_producto.row(this).child.isShown()) {
				var data = tbl_producto.row(this).data();//para celular y usas el responsive datatable
			}
			//console.log(data);
				$("#modal_disminuir_stock").modal({backdrop:'static', keyboard: false});	
				$("#modal_disminuir_stock").modal('show');//abrimos el modal
				//mandamos parametros a los texbox
				document.getElementById('text_stock_disminuir_dis').value= "";
				 document.getElementById('text_stock_resta').value= "";
				//document.getElementById('idrol').value=data[0];
				document.getElementById('idproducto_dis').value=data.producto_id;//id del procedure
				document.getElementById('text_producto_editar_2_dis').value=data.producto_nombre;//enviamos el nombre del usu al modal
				document.getElementById('text_stock_editar_2_dis').value=data.producto_stock;
				document.getElementById('text_codigo_editar_2_dis').value=data.producto_codigo;
				//console.log(data.producto_id);//para enviar el dato  en console
		
		 });




 /********************************************************************
 		PARA IMPRIMIR CODIGO QR
 ********************************************************************/
 $('#tabla_producto').on('click', '.codigoqr', function() {//class foto tiene que ir en el boton
	var data = tbl_producto.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_producto.row(this).child.isShown()) {
		var data = tbl_producto.row(this).data();//para celular y usas el responsive datatable
	}
	window.open("../MPDF/genera_qr.php?codigo="+parseInt(data.producto_id)+"#zoom=100", "Codigo qr del producto","scrollbards=NO");
		
 });



 /********************************************************************
 		   ABRIR MODAL REGISTRAR  PRODUCTO
 ********************************************************************/ 
 function AbrirModalRegistroProducto(){//se jala en el boton nuevo
 	//para que no se nos salga del modal haciendo click a los costados
 	$("#modal_registro_producto").modal({backdrop:'static', keyboard: false});	
 	$("#modal_registro_producto").modal('show');//abrimos el modal
 	//LimpiarModalProducto();//limpiar texbox cada que demos en nuevo
 	$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
 }




  /**********************************************************************
 		  MODAL AUMENTAR STOCK
 ***********************************************************************/
 $('#tabla_producto').on('click', '.aumentar', function() {//class EDITAR tiene que ir en el boton
	var data = tbl_producto.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_producto.row(this).child.isShown()) {
		var data = tbl_producto.row(this).data();//para celular y usas el responsive datatable
	}
		$("#modal_aumentar_stock").modal({backdrop:'static', keyboard: false});	
		$("#modal_aumentar_stock").modal('show');//abrimos el modal
		//mandamos parametros a los texbox
		document.getElementById('text_stock_aumentar').value= "";
 		document.getElementById('text_stock_suma').value= "";
		//document.getElementById('idrol').value=data[0];
		document.getElementById('idproducto').value=data.producto_id;//id del procedure
		document.getElementById('text_producto_editar_2').value=data.producto_nombre;//enviamos el nombre del usu al modal
		document.getElementById('text_stock_editar_2').value=data.producto_stock;
		document.getElementById('text_codigo_editar_2').value=data.producto_codigo;
		//console.log(data.producto_id);//para enviar el dato  en console

 });

 
  /**********************************************************************
 		  MODAL AUMENTAR STOCK
 ***********************************************************************/
		   $('#tabla_producto').on('click', '.disminuir', function() {//class EDITAR tiene que ir en el boton
			var data = tbl_producto.row($(this).parents('tr')).data();//tamaño de escritorio
			if (tbl_producto.row(this).child.isShown()) {
				var data = tbl_producto.row(this).data();//para celular y usas el responsive datatable
			}
			//console.log(data);
				$("#modal_disminuir_stock").modal({backdrop:'static', keyboard: false});	
				$("#modal_disminuir_stock").modal('show');//abrimos el modal
				//mandamos parametros a los texbox
				document.getElementById('text_stock_disminuir_dis').value= "";
				 document.getElementById('text_stock_resta').value= "";
				//document.getElementById('idrol').value=data[0];
				document.getElementById('idproducto_dis').value=data.producto_id;//id del procedure
				document.getElementById('text_producto_editar_2_dis').value=data.producto_nombre;//enviamos el nombre del usu al modal
				document.getElementById('text_stock_editar_2_dis').value=data.producto_stock;
				document.getElementById('text_codigo_editar_2_dis').value=data.producto_codigo;
				//console.log(data.producto_id);//para enviar el dato  en console
		
		 });


 
  /********************************************************************
        CAMBIAR FOTO DEL PRODUCTO
 ********************************************************************/
		$('#tabla_producto').on('click', '.foto', function() {//class foto tiene que ir en el boton
			var data = tbl_producto.row($(this).parents('tr')).data();//tamaño de escritorio
			if (tbl_producto.row(this).child.isShown()) {
				var data = tbl_producto.row(this).data();//para celular y usas el responsive datatable
			}
				$("#modal_editar_foto").modal({backdrop:'static', keyboard: false});	
				$("#modal_editar_foto").modal('show');//abrimos el modal
				//LimpiarModalUsuario();
				//mandamos parametros a los texbox
				document.getElementById('idproducto_foto').value=data.producto_id;
				document.getElementById('lbl_producto').innerHTML=data.producto_nombre;//enviamos el nombre del producto al modal
				document.getElementById('fotoactual').value=data.producto_foto; 
				document.getElementById('cod_barra').value=data.producto_codigo_general; 
				document.getElementById('img-preview').src ="../"+ data.producto_foto; 
				//console.log(data[7]);//capturaar ruta
		 });



  /**********************************************************************
 		  ABRIR MODAL EDITAR Y TRAER DATOS A LOS CAMPOS
 ***********************************************************************/
 $('#tabla_producto').on('click', '.editar', function() {//class EDITAR tiene que ir en el boton
	var data = tbl_producto.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_producto.row(this).child.isShown()) {
		var data = tbl_producto.row(this).data();//para celular y usas el responsive datatable
	}
		rolA = document.getElementById('text_idrol').value; //CAPTURAMOS EL ROL PARA DAR EL ACCESO
	//console.log(rolA);

		
		$("#modal_editar_producto").modal({backdrop:'static', keyboard: false});	
		$("#modal_editar_producto").modal('show');//abrimos el modal
		//mandamos parametros a los texbox

		if (rolA == 1) {
				document.getElementById('idproducto').value=data.producto_id;//id del procedure
				document.getElementById('text_producto_editar').value=data.producto_nombre;//enviamos el nombre del usu al modal
				document.getElementById('text_stock_editar').value=data.producto_stock;
				document.getElementById('text_codigo_editar').value=data.producto_codigo;
				document.getElementById('text_pcompra_editar').value=data.producto_pcompra;
				document.getElementById('text_pventa_editar').value=data.producto_pventa;
				document.getElementById('text_codigo_g_editar').value=data.producto_codigo_general;
				$("#select_marca_editar").select2().val(data.marca_id).trigger('change.select2');//PARA QUE SALGA EN MODAL EDITAR SE COLOCA EN CARGAR SELCT DEJ JS
				$("#select_categoria_editar").select2().val(data.categoria_id).trigger('change.select2');
				$("#select_estado_producto_editar").select2().val(data.producto_estado).trigger('change.select2');
				$("#select_proveedor_editarr").select2().val(data.cliente_id).trigger('change.select2');
				$("#select_unidadm_editar").select2().val(data.unidad_id).trigger('change.select2');

		}else {
				document.getElementById('idproducto').value=data.producto_id;//id del procedure
				document.getElementById('text_producto_editar').value=data.producto_nombre;//enviamos el nombre del usu al modal
				document.getElementById('text_stock_editar').value=data.producto_stock;
				document.getElementById('text_codigo_editar').value=data.producto_codigo;

				document.getElementById('text_pcompra_editar').disabled = true;  
				document.getElementById('text_pcompra_editar').value=data.producto_pcompra;

				document.getElementById('text_pventa_editar').value=data.producto_pventa;
				document.getElementById('text_pventa_editar').disabled = true;

				document.getElementById('text_codigo_g_editar').value=data.producto_codigo_general;
				$("#select_marca_editar").select2().val(data.marca_id).trigger('change.select2');//PARA QUE SALGA EN MODAL EDITAR SE COLOCA EN CARGAR SELCT DEJ JS
				$("#select_categoria_editar").select2().val(data.categoria_id).trigger('change.select2');
				$("#select_estado_producto_editar").select2().val(data.producto_estado).trigger('change.select2');
				$("#select_proveedor_editarr").select2().val(data.cliente_id).trigger('change.select2');
				$("#select_unidadm_editar").select2().val(data.unidad_id).trigger('change.select2');


		}
		

		//console.log(data.analisis_id);//para enviar el dato  en console
 });



 /********************************************************************
 		  CARGAR CATEGORIAS EN COMBO
 ********************************************************************/ 
  function cargar_SelectCategoria(){//enviamos al scrpit mantenimiento examen
 	$.ajax({
 		url:'../controller/producto/controlador_cargar_select_categoria.php',
 		type: 'POST'
 	}).done(function(resp){
 		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
 		let llenardata = "<option value=''>Seleccione</option>";
 		if (data.length>0) {
 			for (let i = 0; i < data.length; i++) {
 				llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
 			}
 			document.getElementById('select_categoria').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
 			document.getElementById('select_categoria_editar').innerHTML = llenardata;
 		}else{
 			llenardata+="<option value=''>No se encontraron datos</option>";
 			document.getElementById('select_categoria').innerHTML = llenardata;
 			document.getElementById('select_categoria_editar').innerHTML = llenardata;

 		}
 	})
 }


 /********************************************************************
 		  CARGAR MARCAS EN COMBO
 ********************************************************************/
  function cargar_SelectMarca(){//enviamos al scrpit mantenimiento examen
 	$.ajax({
 		url:'../controller/producto/controlador_cargar_select_marca.php',
 		type: 'POST'
 	}).done(function(resp){
 		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
 		let llenardata = "<option value=''>Seleccione</option>";
 		if (data.length>0) {
 			for (let i = 0; i < data.length; i++) {
 				llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
 			}
 			document.getElementById('select_marca').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
 			document.getElementById('select_marca_editar').innerHTML = llenardata;
 		}else{
 			llenardata+="<option value=''>No se encontraron datos</option>";
 			document.getElementById('select_marca').innerHTML = llenardata;
 			document.getElementById('select_marca_editar').innerHTML = llenardata;

 		}
 	})
 }

 /********************************************************************
       CARGAR PROVEEDOR EN COMBO
 ********************************************************************/
 function cargar_Select_Proveedor(){//enviamos al scrpit mantenimiento examen
  $.ajax({
    url:'../controller/cotizacion/controlador_cargar_select_proveedor.php',
    type: 'POST'
  }).done(function(resp){
    let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
    let llenardata = "<option value=''>Seleccione</option>";
    if (data.length>0) {
      for (let i = 0; i < data.length; i++) {
        llenardata+="<option value='"+data[i][0]+"'>"+data[i][2]+"</option>";
      }
      document.getElementById('select_proveedor').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
      document.getElementById('select_proveedor_editarr').innerHTML = llenardata;
    }else{
      llenardata+="<option value=''>No se encontraron datos</option>";
      document.getElementById('select_proveedor').innerHTML = llenardata;
      document.getElementById('select_proveedor_editarr').innerHTML = llenardata;

    }
  })
 }


 /********************************************************************
 		  CARGAR UNIDADES EN COMBO
 ********************************************************************/ 
		   function cargar_Select_Unidad(){//enviamos al scrpit mantenimiento examen
			$.ajax({
				url:'../controller/producto/controlador_cargar_select_unidadm.php',
				type: 'POST'
			}).done(function(resp){
				let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
				let llenardata = "<option value=''>Seleccione</option>";
				if (data.length>0) {
					for (let i = 0; i < data.length; i++) {
						llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
					}
					document.getElementById('select_unidadm').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
					document.getElementById('select_unidadm_editar').innerHTML = llenardata;
				}else{
					llenardata+="<option value=''>No se encontraron datos</option>";
					document.getElementById('select_unidadm').innerHTML = llenardata;
					document.getElementById('select_unidadm_editar').innerHTML = llenardata;
	   
				}
			})
		}
	   

 /********************************************************************
 					  Precio Venta
********************************************************************/
// function PVenta() {
// 	try {
// 		const $miCheckbox = document.querySelector("#flexCheckDefault");
// 		const $casia = document.querySelector("#text_pventa");
// 		let $garanti= parseFloat(document.getElementById('text_pcompra').value);

// 		if ($miCheckbox.checked) {
// 			$casia.disabled = true;
// 			let costQ = $garanti * 1.1;
// 			let Tot = Math.round(costQ, -1);
// 			document.getElementById('text_pventa').value = (Tot);
// 		  } else {
// 			$casia.disabled = false;
// 			document.getElementById('text_pventa').value = ($garanti);
// 		  }

// 		} catch (e) { }
		
	
// 	}


	// function EditPre() {
	// 	try {
	// 		const $miCheckbox = document.querySelector("#flexCheckDefaul");
	// 		const $casia = document.querySelector("#text_pventa_editar");
	// 		let $garanti= parseFloat(document.getElementById('text_pcompra_editar').value);
	
	// 		if ($miCheckbox.checked) {
	// 			$casia.disabled = true;
	// 			let costQ = $garanti * 1.1;
	// 			let costR = Math.ceil(costQ);
	// 			document.getElementById('text_pventa_editar').value = (costR);
	// 		  } else {
	// 			$casia.disabled = false;
	// 			document.getElementById('text_pventa_editar').value = ($garanti);
	// 		  }
	
	// 		} catch (e) { }
			
		
	// 	}



 /********************************************************************
 					  REGISTRAR PRODUCTO
 ********************************************************************/
 function RegistrarProducto(){
 	let producto = document.getElementById('text_producto').value;
 	let stock = document.getElementById('text_stock').value;	
 	let pcompra = document.getElementById('text_pcompra').value;
 	let pventa = document.getElementById('text_pventa').value;
 	let marca = document.getElementById('select_marca').value;
 	let categoria = document.getElementById('select_categoria').value;
 	let cod_gene = document.getElementById('text_codigo_g').value;
 	let provee = document.getElementById('select_proveedor').value;
	let foto = document.getElementById('text_foto').value;
	let unidadmedida = document.getElementById('select_unidadm').value;

 	if (marca.length == 0 ) {
 		return Swal.fire("Mensaje de Advertencia","Seleccione una marca","warning");
 	}
 	if (categoria.length == 0 ) {
 		return Swal.fire("Mensaje de Advertencia","Seleccione una categoria","warning");
 	}
	 if (unidadmedida.length == 0 ) {
		return Swal.fire("Mensaje de Advertencia","Seleccione ua unidad de medida","warning");
	}

 	if (producto.length ==0 || stock.length ==0 || pcompra.length ==0 || pventa.length ==0 ) {
 		ValidarCamposProducto("text_producto","text_stock","text_pcompra","text_pventa");
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}

	//capturar foto
	let extension = foto.split('.').pop();//capturar despues del punto foto122.jpg
	let nombrefoto="";
	let f = new Date();
	if (foto.length>0) {
		nombrefoto="PROD"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMilliseconds()+"."+extension;
		//nombrefoto =cod_gene+"."+extension;
		//console.log(nombrefoto);
	}
	let formData = new FormData();
	let fotoObject = $("#text_foto")[0].files[0];//objeto de la foto adjuntada
	formData.append('producto',producto);
	formData.append('marca',marca);
	formData.append('categoria',categoria);
	formData.append('stock',stock);
	formData.append('pcompra',pcompra);
	formData.append('pventa',pventa);
	formData.append('cod_gene',cod_gene);
	formData.append('provee',provee);
	formData.append('nombrefoto',nombrefoto);
	formData.append('foto',fotoObject);
	formData.append('unidadmedida',unidadmedida);

	$.ajax({
		url:'../controller/producto/controlador_producto_registar.php',
		type: 'POST',
		data:formData,
		contentType: false,
		processData: false,
		success: function(resp){
			//console.log(resp);
			if (resp>0) {//IF SOLO PARA REGISTRAR
				if (resp ==1) {
					LimpiarModalProducto();
					Swal.fire("Mensaje de Confirmacion","Producto Registrado","success").then((value)=>{					
						$("#modal_registro_producto").modal('hide');//cerramos el modal
						tbl_producto.ajax.reload();//recargar dataTable
						//TraerNotificaciones();
					});	
				}else{
					Swal.fire("Mensaje de Advertencia","El Producto ya se encuentra registrado","warning");
				}

			}else{
				Swal.fire("Mensaje de Error","No se puede registrar el Producto","error");
			}
		}	 	
	});	
	return false;
}



  /********************************************************************
         CAMBIAR FOTO DEL PRODUCTO
 ********************************************************************/
		 function ModificarFotoEmpresa(){
			let id   = document.getElementById('idproducto_foto').value;
			let foto = document.getElementById('text_foto_editar').value; 
			let rutaactual = document.getElementById('fotoactual').value; 
			let cod_gen = document.getElementById('cod_barra').value;//codigo de barra
			
			
			
			if (id.length ==0 || foto.length== 0) {		
				return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
			}
	   
			//capturar foto
			let extension = foto.split('.').pop();//capturar despues del punto foto122.jpg
			let nombrefoto="";
			let f = new Date();
			if (foto.length>0) {
				nombrefoto="PRO-"+f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMilliseconds()+"."+extension;
				//nombrefoto =" "+cod_gen+"."+extension;
				//console.log(nombrefoto);
			}
			let formData = new FormData();
			let fotoObject = $("#text_foto_editar")[0].files[0];//objeto de la foto adjuntada
			formData.append('id',id);
			formData.append('rutaactual',rutaactual);
			formData.append('nombrefoto',nombrefoto);
			formData.append('foto',fotoObject);
			$.ajax({
				url: '../controller/producto/controlador_producto_modificar_foto.php',
				type: 'POST',
				data:formData,
				contentType: false,
				processData: false,
				success: function(resp){
					if (resp>0) {
							Swal.fire("Mensaje de Confirmacion","Foto del producto Actualizado","success").then((value)=>{
								$("#modal_editar_foto").modal('hide');//ocultamos modal despues de registrar
								tbl_producto.ajax.reload();//recargar dataTable
								//TraerNotificaciones();
							});	 			
					}else{
						Swal.fire("Mensaje de Error","No se puede Actualizar la foto","error");
					}
				}	 	
			});	 
		}




 /********************************************************************
 					  VALIDAR CAMPOS PRODUCTO
 ********************************************************************/
 function ValidarCamposProducto(producto,stock,pcompra,pventa){
 	Boolean(document.getElementById(producto).value.length>0) ? $("#"+producto).removeClass("is-invalid").addClass("is-valid") : $("#"+producto).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(stock).value.length>0) ? $("#"+stock).removeClass("is-invalid").addClass("is-valid") : $("#"+stock).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(pcompra).value.length>0) ? $("#"+pcompra).removeClass("is-invalid").addClass("is-valid") : $("#"+pcompra).removeClass("is-valid").addClass("is-invalid");
    Boolean(document.getElementById(pventa).value.length>0) ? $("#"+pventa).removeClass("is-invalid").addClass("is-valid") : $("#"+pventa).removeClass("is-valid").addClass("is-invalid");
 }





 /********************************************************************
 					  LIMPIAR TEXBOX PRODUCTO
 ********************************************************************/
 function LimpiarModalProducto(){
	document.getElementById('text_producto').value="";
	document.getElementById('text_stock').value="";
	document.getElementById('text_pcompra').value="";
	document.getElementById('text_pventa').value="";
	$("#select_marca").select2().val("").trigger('change.select2');
	$("#select_categoria").select2().val("").trigger('change.select2');

 }




 /********************************************************************
 					  SUMAR AUTOMATICAMENTE EN LOS TEXBOX 
 ********************************************************************/
function calcular(){
	try{
	var a = parseFloat(document.getElementById('text_stock_editar_2').value)|| 0,
		b = parseFloat(document.getElementById('text_stock_aumentar').value)|| 0;
		
		document.getElementById('text_stock_suma').value = a + b;
	} catch(e){}

}

function calcularResta(){
	try{
	var c = parseFloat(document.getElementById('text_stock_editar_2_dis').value)|| 0,
		d = parseFloat(document.getElementById('text_stock_disminuir_dis').value)|| 0;
		
		document.getElementById('text_stock_resta').value = c - d;
	} catch(e){}

}








 /********************************************************************
 					 MODIFICAR PRODUCTO
 ********************************************************************/
 function ModificarProducto(){//enviamos los datos del ajax al controlador y al onclick del boton editar
 	let id = document.getElementById('idproducto').value;
 	let producto = document.getElementById('text_producto_editar').value;
 	let pcompra = (document.getElementById('text_pcompra_editar').value).trim();
 	let pventa = (document.getElementById('text_pventa_editar').value).trim();
 	let marca = document.getElementById('select_marca_editar').value;
 	let categoria = document.getElementById('select_categoria_editar').value;
 	let estado = document.getElementById('select_estado_producto_editar').value;
 	let cod_gene = document.getElementById('text_codigo_g_editar').value;
 	let provee = document.getElementById('select_proveedor_editarr').value;
	let unidadm = document.getElementById('select_unidadm_editar').value;

 	if (marca.length == 0 ) {
 		return Swal.fire("Mensaje de Advertencia","Seleccione una marca","warning");
 	}
 	if (categoria.length == 0 ) {
 		return Swal.fire("Mensaje de Advertencia","Seleccione una categoria","warning");
 	}

 	if (producto.length ==0 || pcompra.length ==0 || pventa.length ==0 ) {
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}

 	$.ajax({
 		url:'../controller/producto/controlador_modificar_producto.php',
 		type: 'POST',
 		data:{
 			id: id,//le enviamos los campos al controlador
 			producto: producto,//le enviamos los campos al controlador
 			marca: marca,
 			categoria: categoria,
 			pcompra: pcompra,
 			pventa: pventa,
 			estado: estado,
 			cod_gene:cod_gene,
 			provee:provee,	
			unidadm:unidadm
 		}
 	}).done(function(resp){
 	 	if (resp>0) {
 			if (resp==1) {//validamos la respuesta del procedure si retorna 1 o 2
 					//ValidarCamposProducto("text_producto","text_stock","text_pcompra","text_pventa");
	 				//LimpiarModalPaciente();
 				Swal.fire("Mensaje de Confirmacion","Producto Actualizado","success").then((value)=>{					
	 					$("#modal_editar_producto").modal('hide');//abrimos el modal
	 					tbl_producto.ajax.reload();//recargar dataTable
	 					//TraerNotificaciones();
	 				});	
 			}else{
 				Swal.fire("Mensaje de Advertencia","El Producto ya se encuentra registrado","warning");

 			}
	 				 			
	 		}else{
	 			Swal.fire("Mensaje de Error","No se puede registrar el Producto","error");
	 		}
 	})
 }





 /********************************************************************
 					AUMENTAR STOCK
 ********************************************************************/
 function SumarStock(){//enviamos los datos del ajax al controlador y al onclick del boton editar
 	let id = document.getElementById('idproducto').value;
 	let cantidad = document.getElementById('text_stock_aumentar').value;
 	let total = document.getElementById('text_stock_suma').value;


 	if (cantidad.length ==0 ) {
 		return Swal.fire("Mensaje de Advertencia","Ingrese cantida Aumentar","warning");
 	}

 	if (parseInt(cantidad )<1) {
 		return Swal.fire("Mensaje de Advertencia","La cantidad debe ser mayor a 0","warning");
 	}

 	if (parseInt(cantidad )<0.1) {
 		return Swal.fire("Mensaje de Advertencia","El precio debe ser mayor a 0","warning");
 	}


 	$.ajax({
 		url:'../controller/producto/controlador_aumentar_stock_producto.php',
 		type: 'POST',
 		data:{
 			id: id,//le enviamos los campos al controlador
 			cantidad: cantidad,//le enviamos los campos al controlador
 			total: total
 	
 		}
 	}).done(function(resp){
 		//alert(resp);
 		if(resp>0){
        Swal.fire("Mensaje de Confirmacion","Stock Aumentado","success").then((result) => {
 				$("#modal_aumentar_stock").modal('hide');//abrimos el modal

	 			tbl_producto.ajax.reload();//recargar dataTable
 			});

 		}else{
 			return Swal.fire("Mensaje de Error","No se pudo completar el registro","error");
 		}
	})
}




/********************************************************************
 					DISMINUIR STOCK
 ********************************************************************/
		function DisminuirStock(){//enviamos los datos del ajax al controlador y al onclick del boton editar
		let id = document.getElementById('idproducto_dis').value;
		let cantidad = document.getElementById('text_stock_disminuir_dis').value;
		let total = document.getElementById('text_stock_resta').value;

		let stockactual = document.getElementById('text_stock_editar_2_dis').value;
	
	
		if (cantidad.length ==0 ) {
			return Swal.fire("Mensaje de Advertencia","Ingrese cantida Aumentar","warning");
		}
	
		if (parseInt(cantidad )<1) {
			return Swal.fire("Mensaje de Advertencia","La cantidad debe ser mayor a 0","warning");
		}
	
		if (parseInt(cantidad )<0.1) {
			return Swal.fire("Mensaje de Advertencia","El precio debe ser mayor a 0","warning");
		}

		if (parseInt(cantidad ) > parseInt(stockactual )) {
			return Swal.fire("Mensaje de Advertencia","Cantidad tiene que ser menor que el stock actual: "  + stockactual,"warning");
		}
	
	
		$.ajax({
			url:'../controller/producto/controlador_disminuir_stock_producto.php',
			type: 'POST',
			data:{
				id: id,//le enviamos los campos al controlador
				cantidad: cantidad,//le enviamos los campos al controlador
				total: total
		
			}
		}).done(function(resp){
			//alert(resp);
			if(resp>0){
			Swal.fire("Mensaje de Confirmacion","Salida Registrada","success").then((result) => {
					$("#modal_disminuir_stock").modal('hide');//abrimos el modal
	
					tbl_producto.ajax.reload();//recargar dataTable
				});
	
			}else{
				return Swal.fire("Mensaje de Error","No se pudo completar el registro","error");
			}
		})
	}





