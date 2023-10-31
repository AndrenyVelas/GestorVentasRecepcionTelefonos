 /********************************************************************
 		BUSCAR EQUIPO
 ********************************************************************/

var tbl_buscar_equipo;
 function Buscar_Equipo(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var nit = document.getElementById('text_documento').value;

	tbl_buscar_equipo = $("#tabla_buscar_equipo").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 't',
		"ajax" : {
			"url": "../controller/buscarequipo/controlador_buscar_equipo.php",
			type: 'POST',
			data:{
				nit:nit
			}

		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "cliente_celular"},
		{"data": "cliente_nombres"},
		{"data": "rece_equipo"},
		{"data": "rece_concepto"},
		{"data": "rece_fregistro"},
		{"data": "rece_estado",
			render: function(data,type,row){
				if (data=="POR RECOGER" || data=="POR ENTREGAR") {
					//return "<center>"+'<span class="badge badge-success">POR RECOGER</span>';+"</center>"
					return "<center>"+"<span class='badge badge-warning'>"+data+"</span>";+"</center>"
						
				}else{
					//return "<center>"+'<span class="badge badge-danger">POR ENTREGAR</span>';+"</center>"
					return "<center>"+"<span class='badge badge-info'>"+data+"</span>";+"</center>"
				}
			
				
				
			}
		},
		

		],
		"language":idioma_espanol,
		select:true
	});
 }	


