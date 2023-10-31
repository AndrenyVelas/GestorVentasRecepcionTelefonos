 /********************************************************************
 		REPORTE SERVICIOS  POR MES
 ********************************************************************/

var tbl_servicio_mes;
 function Listar_Reporte_Servicio_Mes(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var mes = document.getElementById('select_mes_servicio').value;

	tbl_servicio_mes = $("#tabla_reporte_servicio_mes").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 'Blrtip',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
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
		"ajax" : {
			"url": "../controller/reporteservicio/controlador_reporte_servicio_mes.php",
			type: 'POST',
			data:{
				mes:mes
			}

		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "cliente_nombres"},
		{"data": "concepto"},
		{"data": "servicio_monto"},
		{"data": "servicio_responsable"},
		{"data": "servicio_fregistro"},
		

		],
		"language":idioma_espanol,
		select:true
	});
 }	







 /********************************************************************
 		LISTAR SERVICIOS  POR AÑO
 ********************************************************************/

var tbl_servicio_anio
 function Listar_Reporte_Servicio_Anio(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var anio = document.getElementById('select_anio_servicio').value;

	tbl_servicio_anio = $("#tabla_reporte_servicio_anio").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 'Bt',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
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
		"ajax" : {
			"url": "../controller/reporteservicio/controlador_reporte_servicio_anio.php",
			type: 'POST',
			data:{
				anio:anio
			}

		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "ano"},
		{"data": "mesnombre"},
		{"data": "cant_servicio"},
		{"data": "monto_servicio"},

		],
		"language":idioma_espanol,
		select:true
	});
 }	






 /********************************************************************
 		CARGAR AÑOS QUE SE ENCUENTRAN EN LA BASE - SERVICIO
 ********************************************************************/
 function cargar_SelectAnioServicio(){//enviamos al scrpit mantenimiento examen
 	$.ajax({
 		url:'../controller/reporteservicio/controlador_cargar_anio_servicio.php',
 		type: 'POST'
 	}).done(function(resp){

 		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
 		let llenardata = "<option value=''>Seleccione</option>";
 		if (data.length>0) {
 			for (let i = 0; i < data.length; i++) {
 				llenardata+="<option >"+data[i][0]+"</option>";
 			}
 			document.getElementById('select_anio_servicio').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
 		}else{
 			llenardata+="<option value=''>No se encontraron datos</option>";
 			document.getElementById('select_anio_servicio').innerHTML = llenardata;


 		}
 	})
 }