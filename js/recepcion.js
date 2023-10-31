/********************************************************************
		   LISTAR RECEPCION CON SERVERSIDE (MUCHOS DATOS)
********************************************************************/

var tbl_recepcion;
function Listar_Recepcion() {
	tbl_recepcion = $("#tabla_recepcion").DataTable({
		"responsive": true,
		"pageLength": 10,
		"destroy": true,
		"bProcessing": true,
		"dom": 'Blfrtip',
		"buttons": [
			{
				"extend": 'excelHtml5',
				"text": '<i class="fa fa-file-excel"></i>',
				"titleAttr": 'Exportar a Excel'
			},
			/*{
				"extend":    'pdfHtml5',
				"text":      '<i class="fas fa-file-pdf"></i> ',
				"titleAttr": 'Exportar a Pdf',
				"download": 'open',
				'className': 'btn btn-sm btn-success'
			}*/

		],
		"bDeferRender": true,
		"bServerSide": true,
		"sAjaxSource": "../controller/recepcion/serverside/serversideRecepcion.php",
		"columns": [
			//todos los datos de la vista
			{ "defaultContent": "" },
			{ "data": 2 },//cliente
			{ "data": 3 },//concepto
			{ "data": 6 },//motivo
			{ "data": 7 },//monto
			{ "data": 13 },//adelanto
			{ "data": 8 },//fecha
			{
				"data": 9,//estado
				render: function (data, type, row) {
					if (data == "POR ENTREGAR") {
						//return "<center>"+'<span class="badge badge-warning">"+data+"</span>';+"</center>"
						return "<span class='badge badge-warning'>" + data + "</span>"
					} if (data == "POR RECOGER") {
						//return "<center>"+'<span class="badge badge-warning">"+data+"</span>';+"</center>"
						return "<span class='badge badge-success'>" + data + "</span>"
					} else {
						return "<span class='badge badge-info'>" + data + "</span>"
						//return "<center>"+'<span class="badge badge-info">"+data+"</span>';+"</center>"
					}



				}
			},

			{
				"data": 10,//estatus
				render: function (data, type, row) {
					if (data === "ACTIVO") {
						return "<center>" + '<span class="badge badge-success">ACTIVO</span>'; +"</center>"
					} else {
						return "<center>" + '<span class="badge badge-danger">INACTIVO</span>'; +"</center>"
					}
				}
			},
			{
				"data": 9,//editar
				render: function (data, type, row) {
					if (data === "POR ENTREGAR" || data == "POR RECOGER") {
						return "<center>" + "<span class='editar text-primary px-1' style='cursor:pointer;' title='Editar datos' ><i class= 'fa fa-edit'></i></span><span class='imprimir text-danger px-1' style='cursor:pointer;' title='Imprimir Comprobante'><i class= 'fa fa-print'></i></span>" + "</center>"
					} else {
						return "<center>" + "<span class='text-secondary px-1' style='cursor:pointer;' disabled=''><i class= 'fa fa-edit'></i></span><span class=' text-secundary px-1' style='cursor:pointer;' disabled=''><i class= 'fa fa-print'></i></span>" + "</center>"
					}


				}
			},

		],
		"language": idioma_espanol,
		select: true
	});
	//contador en cada tabla
	tbl_recepcion.on('draw.td', function () {
		var PageInfo = $("#tabla_recepcion").DataTable().page.info();
		tbl_recepcion.column(0, { page: 'current' }).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1 + PageInfo.start;
		});

	});
}





/********************************************************************
	   ABRIR MODAL EDITAR RECEPCION
********************************************************************/
$('#tabla_recepcion').on('click', '.editar', function () {//class EDITAR tiene que ir en el boton
	var data = tbl_recepcion.row($(this).parents('tr')).data();//tama単o de escritorio
	if (tbl_recepcion.row(this).child.isShown()) {
		var data = tbl_recepcion.row(this).data();//para celular y usas el responsive datatable
	}
	$("#modal_editar_recepcion").modal({ backdrop: 'static', keyboard: false });
	$("#modal_editar_recepcion").modal('show');//abrimos el modal
	//mandamos parametros a los texbox
	//document.getElementById('idrol').value=data[0];
	document.getElementById('idrecepcion').value = data[0];//id del procedure
	document.getElementById('text_equipo_editar').value = data[11];//enviamos el nombre del usu al modal
	document.getElementById('text_caracteristicas_editar').value = data[4];
	document.getElementById('text_concepto_editar').value = data[12];
	document.getElementById('text_monto_editar').value = data[7];
	document.getElementById('text_adelanto_editar').value = data[13];
	document.getElementById('text_debe_editar').value = data[14];
	$("#select_cliente_editar").select2().val(data[1]).trigger('change.select2');//PARA QUE SALGA EN MODAL EDITAR SE COLOCA EN CARGAR SELCT DEJ JS
	$("#select_motivo_editar").select2().val(data[5]).trigger('change.select2');
	$("#select_entrega_editar").select2().val(data[9]).trigger('change.select2');
	$("#select_estado_recepcion_editar").select2().val(data[10]).trigger('change.select2');
	document.getElementById('text_fentrega_editar').value = data[16];
	document.getElementById('text_accesorios_editar').value = data[15];
	$("#select_marca_editar").select2().val(data[17]).trigger('change.select2');
	$("#select_recoger_recepcion_editar").select2().val(data[9]).trigger('change.select2');


	//console.log(data[1]);//para enviar el dato  en console
});






/********************************************************************
	  CARGAR CLIENTES EN COMBO
********************************************************************/
function cargar_SelectCliente() {//enviamos al scrpit mantenimiento examen
	$.ajax({
		url: '../controller/recepcion/controlador_cargar_select_cliente.php',
		type: 'POST'
	}).done(function (resp) {
		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		let llenardata = "<option value=''>Seleccione</option>";
		if (data.length > 0) {
			for (let i = 0; i < data.length; i++) {
				llenardata += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
			}
			document.getElementById('select_cliente').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
			document.getElementById('select_cliente_editar').innerHTML = llenardata;
		} else {
			llenardata += "<option value=''>No se encontraron datos</option>";
			document.getElementById('select_cliente').innerHTML = llenardata;
			document.getElementById('select_cliente_editar').innerHTML = llenardata;

		}
	})
}







/********************************************************************
	   CARGAR MOTIVOS EN COMBO
 ********************************************************************/
function cargar_SelectMotivo() {//enviamos al scrpit mantenimiento examen
	$.ajax({
		url: '../controller/recepcion/controlador_cargar_select_motivo.php',
		type: 'POST'
	}).done(function (resp) {
		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		let llenardata = "<option value=''>Seleccione</option>";
		if (data.length > 0) {
			for (let i = 0; i < data.length; i++) {
				llenardata += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
			}
			document.getElementById('select_motivo').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
			document.getElementById('select_motivo_editar').innerHTML = llenardata;
		} else {
			llenardata += "<option value=''>No se encontraron datos</option>";
			document.getElementById('select_motivo').innerHTML = llenardata;
			document.getElementById('select_motivo_editar').innerHTML = llenardata;

		}
	})
}





/********************************************************************
	  CARGAR MARCAS EN COMBO
********************************************************************/
function cargar_SelectMarca() {//enviamos al scrpit mantenimiento examen
	$.ajax({
		url: '../controller/producto/controlador_cargar_select_marca.php',
		type: 'POST'
	}).done(function (resp) {
		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
		let llenardata = "<option value=''>Seleccione</option>";
		if (data.length > 0) {
			for (let i = 0; i < data.length; i++) {
				llenardata += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
			}
			document.getElementById('select_marca').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
			document.getElementById('select_marca_editar').innerHTML = llenardata;
		} else {
			llenardata += "<option value=''>No se encontraron datos</option>";
			document.getElementById('select_marca').innerHTML = llenardata;
			document.getElementById('select_marca_editar').innerHTML = llenardata;

		}
	})
}








/********************************************************************
	  ABRIR MODAL REGISTRO DE RECEPCIONES
 ********************************************************************/
function AbrirModalRegistroRecepcion() {//se jala en el boton nuevo
	//para que no se nos salga del modal haciendo click a los costados
	$("#modal_registro_recepcion").modal({ backdrop: 'static', keyboard: false });
	$("#modal_registro_recepcion").modal('show');//abrimos el modal
	//document.getElementById('text_producto').value="";
	LimpiarModalRecepcion();//limpiar texbox cada que demos en nuevo
	$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
}







/********************************************************************
		ABRIR MODAL REGISTRO DE CLINTES
********************************************************************/
function AbrirModalRegistroCliente() {
	//para que no se nos salga del modal haciendo click a los costados
	$("#modal_registro_cliente").modal({ backdrop: 'static', keyboard: false });
	$("#modal_registro_cliente").modal('show');//abrimos el modal
	//document.getElementById('text_categoria').value="";
	//LimpiarModalCliente();//limpiar texbox cada que demos en nuevo
	$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
}




/********************************************************************
		IMPRIMIR COMPROBANTE
********************************************************************/
$('#tabla_recepcion').on('click', '.imprimir', function () {//class foto tiene que ir en el boton
	var data = tbl_recepcion.row($(this).parents('tr')).data();//tama単o de escritorio
	if (tbl_recepcion.row(this).child.isShown()) {
		var data = tbl_recepcion.row(this).data();//para celular y usas el responsive datatable
	}
	window.open("../MPDF/reporte_recepcion.php?codigo=" + parseInt(data[0]) + "#zoom=100", "Ticket de Recepcion", "scrollbards=NO");

});





 /********************************************************************
 		REGISTRAR CLIENTE
 ********************************************************************/
		 function RegistrarCliente(){
			let nombre = document.getElementById('text_nombre').value;
			let nit = document.getElementById('text_nit').value;
			let cel = document.getElementById('text_celular').value;
			let direccion = document.getElementById('text_direccion').value;
		   let apellidop = document.getElementById('text_ape_p').value;
		   let apellidom = document.getElementById('text_ape_m').value;
		   let correo = document.getElementById('text_correo').value;
		   let tipo_doc = document.getElementById('select_tipo_doc').value;
			if (nombre.length ==0 || nit.length ==0 || cel.length ==0  ) {
				ValidarCamposCliente("text_nombre","text_nit","text_celular", "select_tipo_doc");
				return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
			}
		
		   $.ajax({
				url:'../controller/cliente/controlador_cliente_registar.php',
				type: 'POST',
				data:{
					nombre: nombre,//le enviamos los campos al controlador
					nit: nit,
					cel: cel,			
					direccion: direccion,
				   apellidop: apellidop,
				   apellidom: apellidom,
				   correo:correo,
				   tipo_doc:tipo_doc
				}
			}).done(function(resp){
				if (resp>0) {
					if (resp==1) {//validamos la respuesta del procedure si retorna 1 o 2
						Swal.fire("Mensaje de Confirmacion","Cliente Registrado","success").then((value)=>{
								
								$("#modal_registro_cliente").modal('hide');//abrimos el modal
								cargar_SelectCliente();
								tbl_cliente.ajax.reload();//recargar dataTable
								//TraerNotificaciones();
							});	
					}else{
						Swal.fire("Mensaje de Advertencia","El Cliente ya se encuentra registrado","warning");
					}
										 
					}else{
						Swal.fire("Mensaje de Error","No se puede registrar el Cliente","error");
					}
			})	 
		}
	   





/********************************************************************
 REGISTRAR RECEPCION
********************************************************************/
function RegistrarRecepcion() {
	let equipo = document.getElementById('text_equipo').value;
	let caracteristicas = document.getElementById('text_caracteristicas').value;
	let concepto = document.getElementById('text_concepto').value;
	let monto = document.getElementById('text_monto').value;
	let cliente = document.getElementById('select_cliente').value;
	let motivo = document.getElementById('select_motivo').value;
	let adelanto = document.getElementById('text_adelanto').value;
	let debe = document.getElementById('text_debe').value;

	let accesorios = document.getElementById('text_accesorios').value;
	let fentrega = document.getElementById('text_fentrega').value;
	let marca = document.getElementById('select_marca').value;
	if (cliente.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Seleccione un cliente", "warning");
	}
	if (motivo.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Seleccione un motivo", "warning");
	}
	if (marca.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Seleccione una marca", "warning");
	}

	if (monto.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Ingrese un Monto", "warning");
	}

	if (parseInt(monto) < 1) {
		return Swal.fire("Mensaje de Advertencia", "El Mon debe ser mayor a 0", "warning");
	}

	if (equipo.length == 0 || caracteristicas.length == 0 || concepto.length == 0 || monto.length == 0) {
		ValidarCamposRecepcion("text_equipo", "text_caracteristicas", "text_concepto", "text_monto");
		return Swal.fire("Mensaje de Advertencia", "Tiene campos vacios", "warning");
	}

	$.ajax({
		url: '../controller/recepcion/controlador_recepcion_registar.php',
		type: 'POST',
		data: {
			equipo: equipo,//le enviamos los campos al controlador
			caracteristicas: caracteristicas,
			concepto: concepto,
			monto: monto,
			cliente: cliente,
			motivo: motivo,
			adelanto: adelanto,
			debe: debe,
			accesorios: accesorios,
			fentrega: fentrega,
			marca: marca

		}
	}).done(function(resp){
	if (resp>0) {
				ValidarCamposRecepcion("text_equipo", "text_caracteristicas", "text_concepto", "text_monto");
				LimpiarModalRecepcion();
				Swal.fire("Mensaje de Confirmacion", "Recepcion Registrado", "success").then((value) => {
					$("#modal_registro_recepcion").modal('hide');//abrimos el modal
					tbl_recepcion.ajax.reload();//recargar dataTable
					cargar_Notificaiones_Recepcion();
				});
		
							
		}else{
			Swal.fire("Mensaje de Error","No se puede registrar  la Recepcion","error");
		}
})  
}



/********************************************************************
		   VALIDAR CAMPOS RECEPCION
********************************************************************/
function ValidarCamposRecepcion(equipo, caracteristicas, concepto, monto) {
	Boolean(document.getElementById(equipo).value.length > 0) ? $("#" + equipo).removeClass("is-invalid").addClass("is-valid") : $("#" + equipo).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(caracteristicas).value.length > 0) ? $("#" + caracteristicas).removeClass("is-invalid").addClass("is-valid") : $("#" + caracteristicas).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(concepto).value.length > 0) ? $("#" + concepto).removeClass("is-invalid").addClass("is-valid") : $("#" + concepto).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(monto).value.length > 0) ? $("#" + monto).removeClass("is-invalid").addClass("is-valid") : $("#" + monto).removeClass("is-valid").addClass("is-invalid");
}






/********************************************************************
				   LIMPIAR TEXBOX RECEPCION
********************************************************************/
function LimpiarModalRecepcion() {
	document.getElementById('text_equipo').value = "";
	document.getElementById('text_caracteristicas').value = "";
	document.getElementById('text_accesorios').value = "";
	document.getElementById('text_concepto').value = "";
	document.getElementById('text_monto').value = "";
	document.getElementById('text_adelanto').value = "0";
	document.getElementById('text_debe').value = "0";
	$("#select_cliente").select2().val("").trigger('change.select2');
	$("#select_motivo").select2().val("").trigger('change.select2');
}




/********************************************************************
			VALIDAR CAMPOS CLIENTE
 ********************************************************************/
function ValidarCamposCliente(nombre, nit, celular) {
	Boolean(document.getElementById(nombre).value.length > 0) ? $("#" + nombre).removeClass("is-invalid").addClass("is-valid") : $("#" + nombre).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(nit).value.length > 0) ? $("#" + nit).removeClass("is-invalid").addClass("is-valid") : $("#" + nit).removeClass("is-valid").addClass("is-invalid");
	Boolean(document.getElementById(celular).value.length > 0) ? $("#" + celular).removeClass("is-invalid").addClass("is-valid") : $("#" + celular).removeClass("is-valid").addClass("is-invalid");
}





/********************************************************************
				   LIMPIAR TEXBOX CLIENTE
********************************************************************/
function LimpiarModalCliente() {
	document.getElementById('text_nombre').value = "";
	document.getElementById('text_nit').value = "";
	document.getElementById('text_celular').value = "";
	document.getElementById('text_direccion').value = "";
}




/********************************************************************
						  SUMAR AUTOMATICAMENTE EN LOS TEXBOX 
 ********************************************************************/
function calcular() {
	try {
		var a = parseFloat(document.getElementById('text_monto').value) || 0;
		var b = parseFloat(document.getElementById('text_adelanto').value) || 0;
		if (b.length > a.length) {
			return Swal.fire("Mensaje de Advertencia", "Ingrese cantidad menor que la del monto", "warning");
		} else {
			document.getElementById('text_debe').value = a - b;
		}

	} catch (e) { }

}


function calcularAlEditar() {
	try {
		var a = parseFloat(document.getElementById('text_monto_editar').value) || 0;
		var b = parseFloat(document.getElementById('text_adelanto_editar').value) || 0;
		if (b.length == 0) {
			document.getElementById("text_debe_editar").value = "0";
		}
		document.getElementById('text_debe_editar').value = a - b;

	} catch (e) { }

}




/********************************************************************
							MODIFICAR RECEPCION
 ********************************************************************/
function ModificarRecepcion() {//enviamos los datos del ajax al controlador y al onclick del boton editar
	let id = document.getElementById('idrecepcion').value;
	let equipo = document.getElementById('text_equipo_editar').value;
	let caracteristicas = document.getElementById('text_caracteristicas_editar').value;
	let concepto = document.getElementById('text_concepto_editar').value;
	let monto = document.getElementById('text_monto_editar').value;
	let cliente = document.getElementById('select_cliente_editar').value;
	let motivo = document.getElementById('select_motivo_editar').value;
	let estado = document.getElementById('select_estado_recepcion_editar').value;
	let adelanto = document.getElementById('text_adelanto_editar').value;
	let debe = document.getElementById('text_debe_editar').value;

	let accesorios = document.getElementById('text_accesorios_editar').value;
	let fentrega = document.getElementById('text_fentrega_editar').value;
	let marca = document.getElementById('select_marca_editar').value;
	let recoger = document.getElementById('select_recoger_recepcion_editar').value;

	if (cliente.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Seleccione un cliente", "warning");
	}
	if (motivo.length == 0) {
		return Swal.fire("Mensaje de Advertencia", "Seleccione un motivo", "warning");
	}

	if (equipo.length == 0 || caracteristicas.length == 0 || concepto.length == 0 || monto.length == 0) {
		ValidarCamposRecepcion("text_equipo_editar", "text_caracteristicas_editar", "text_concepto_editar", "text_monto_editar");
		return Swal.fire("Mensaje de Advertencia", "Tiene campos vacios", "warning");
	}

	$.ajax({
		url: '../controller/recepcion/controlador_modificar_recepcion.php',
		type: 'POST',
		data: {
			id: id,//le enviamos los campos al controlador
			cliente: cliente,
			equipo: equipo,//le enviamos los campos al controlador
			caracteristicas: caracteristicas,
			motivo: motivo,
			concepto: concepto,
			monto: monto,
			estado: estado,
			adelanto: adelanto,
			debe: debe,
			accesorios: accesorios,
			fentrega: fentrega,
			marca: marca,
			recoger: recoger
		}
	}).done(function (resp) {
		if (resp > 0) {
			if (resp == 1) {//validamos la respuesta del procedure si retorna 1 o 2
				//ValidarCamposProducto("text_producto","text_stock","text_pcompra","text_pventa");
				//LimpiarModalPaciente();
				Swal.fire("Mensaje de Confirmacion", "Recepcion Actualizado", "success").then((value) => {
					$("#modal_editar_recepcion").modal('hide');//abrimos el modal
					tbl_recepcion.ajax.reload();//recargar dataTable
					cargar_Notificaiones_Recepcion();
				});
			} else {
				Swal.fire("Mensaje de Advertencia", "La Recepcion ya se encuentra registrado", "warning");

			}

		} else {
			Swal.fire("Mensaje de Error", "No se puede registrar la Recepcion", "error");
		}
	})
}



/**********************************************************************
        LISTAR ESTADO DE LA CAJA Y VALIDAR PARA HACER UNA RECEPCION
***********************************************************************/

function Traer_estado_caja() {

    $.ajax({
        url: '../controller/caja/controlador_traer_datos_ventas.php',
        type: 'POST'

    }).done(function (resp) {
        //console.log(resp);
        let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA

        if (data.length > 0) {
			//enviamos el estado de la caja al label
           document.getElementById('text_estado').innerHTML = data[0][5];


			if (data[0][5] == 'VIGENTE') {
				//HABILITAMOS EL BOTON SI LA CAJA YA ESTA APERTURADA
				//Swal.fire("Mensaje de Confirmacion","Caja Aperturada","success");
				$('#textnuevarecepcion').prop('hidden', false);//boton nueva venta
			}else {
				//QUITAMOS EL BOTON SI LA CAJA NO ESTA APERTURADA
				Swal.fire("Mensaje de Error","Tienes que Aperturar una caja","error");
				$('#textnuevarecepcion').prop('hidden', true);// quitamos el boton modificar 
			}

		

        }
    })
}























