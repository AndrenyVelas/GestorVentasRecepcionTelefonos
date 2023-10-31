 /********************************************************************
 		LISTAR SERVICIO METODO NORMAL
 ********************************************************************/

var tbl_servicio;
 function Listar_Servicio(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var finicio = document.getElementById('text_finicio').value;
 	var ffin = document.getElementById('text_ffin').value;
	tbl_servicio = $("#tabla_servicio").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 'Blfrtip',
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
			"url": "../controller/servicio/controlador_servicio_listar.php",
			type: 'POST',
			data:{
				finicio:finicio,
				ffin:ffin
			}

		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"defaultContent": ""},//cintador 
		{"data": "cliente_nombres"},
		{"data": "cliente_nit"},
		{"data": "concepto"},
		{"data": "rece_monto"},
		{"data": "servicio_comentario"},
		{"data": "servicio_responsable"},
		{"data": "servicio_fregistro"},
		{"data": "servicio_entrega",
			render: function(data,type,row){
				if (data==="POR ENTREGAR") {
					return "<center>"+'<span class="badge badge-warning">POR ENTREGAR</span>';+"</center>"
				}else{
					return "<center>"+'<span class="badge badge-info">ENTREGADO</span>';+"</center>"
				}
			}
		},
		{"defaultContent": "<center>"+"<span class='CambiarEstado text-danger px-1' style='cursor:pointer;' title='Eliminar Servicio' ><i class= 'fa fa-trash'></i></span><span class='imprimir text-success px-1' style='cursor:pointer;' title='Imprimir Comprobante'><i class= 'fa fa-print'></i></span>"+"</center>"}


		],
		"language":idioma_espanol,
		select:true
	});
	//contador en cada tabla
	tbl_servicio.on('draw.td',function(){
		var PageInfo = $("#tabla_servicio").DataTable().page.info();
		tbl_servicio.column(0,{page: 'current'}).nodes().each(function(cell,i){
			cell.innerHTML = i + 1 + PageInfo.start;
		});
	});
 }	


 /********************************************************************
 		PARA ABRIR MODAL VER LAS RECPCIONES PENDIENTES
 ********************************************************************/
 function AbrirModalVerRecepcion(){
  //para que no se nos salga del modal haciendo click a los costados
  $("#modal_ver_recepcion").modal({backdrop:'static', keyboard: false}); 
  $("#modal_ver_recepcion").modal('show');//abrimos el modal
  Listar_Ver_Recepcion();
  //LimpiarModalUsuario();//limpiar texbox cada que demos en nuevo
 // $('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
 }


 /********************************************************************
 		ENVIAR DATOS AL FORMULARION CON EL CLICK
 ********************************************************************/
$('#tabla_ver_recepcion').on('click', '.enviardatos_rece', function() { //id enviar( en el boton)
 var data = tbl_ver_recepcion.row($(this).parents('tr')).data();//tamaño de escritorio
 if (tbl_ver_recepcion.row(this).child.isShown()) {
  var data = tbl_ver_recepcion.row(this).data();//para celular y usas el responsive datatable
 }
 $("#modal_ver_recepcion").modal('hide');//abrimos el modal*/

 //jalamos los datos al presionar editar (SERVERSIDE)
 document.getElementById('text_idrecepcion').value=data[0];//posisicion de la vista en el serviside
  document.getElementById('text_cliente').value=data[1];
 document.getElementById('text_concepto').value=data[2];
 document.getElementById('text_monto').value=data[3];
 
 document.getElementById('text_frecepcion').value=data[8];
 document.getElementById('text_adelanto').value=data[6];
 document.getElementById('text_pendiente').value=data[7];
 //Listado_Detalle_Analisis(parseInt(data[0]));//ENVIAMOS LO QUE CONTIENE CADA PACIENTE 
 //console.log(data[0]);
});



 /********************************************************************
 		IMPRIMIR COMPROBANTES
 ********************************************************************/
 $('#tabla_servicio').on('click', '.imprimir', function() {//class foto tiene que ir en el boton
	var data = tbl_servicio.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_servicio.row(this).child.isShown()) {
		var data = tbl_servicio.row(this).data();//para celular y usas el responsive datatable
	}
	window.open("../MPDF/reporte_servicio.php?codigo="+parseInt(data.servicio_id)+"#zoom=100", "Ticket de Servicio","scrollbards=NO");
		
 });




 /********************************************************************
 		ABRIR MODAL VER LAS RECPCIONES PENDIENTES
 ********************************************************************/
var tbl_ver_recepcion;
//listar ver recepciones por entregar con sirverside (muchos datos)
 function Listar_Ver_Recepcion(){
 tbl_ver_recepcion = $("#tabla_ver_recepcion").DataTable({
  "responsive" :true,
  "pageLength" : 10,
  "destroy" :true,
  "bProcessing" :true,
  "bDeferRender" :true,
  "bServerSide" :true,
  "sAjaxSource" : "../controller/servicio/serverside/serverside_ver_recepcion.php",
  "columns":[
  //todos los datos de la vistaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

  {"data":1},//cliente
  {"data":2},//concepto
  {"data":3},//monto
  {"data":4},//fecha

  {"data":null,//boton
   render: function(data,type,row){
    return "<button class='btn btn-primary btn-sm enviardatos_rece'><i class= 'fa fa-share'></i></button>"
   }
  },

  ],
  "language":idioma_espanol,
  select:true
 });
 //contador en cada tabla

 } 



 /********************************************************************
 				REGISTRAR SERVICIO
 ********************************************************************/
function RegistrarServicio(){
 	let idrecepcion = document.getElementById('text_idrecepcion').value;
 	let monto = document.getElementById('text_monto').value;
 	let concepto = document.getElementById('text_concepto').value;
 	let responsable = document.getElementById('text_responsable').value;
 	let comentario = document.getElementById('text_comentario').value;
 	//let entrega = document.getElementById('text_entrega').value;
 	let cliente = document.getElementById('text_cliente').value;



 	if (comentario.length ==0 || responsable.length ==0 || monto.length ==0 || cliente.length ==0) {
 		ValidarCamposServicio("text_comentario","text_responsable","text_monto","text_cliente");
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}
 
	$.ajax({
 		url:'../controller/servicio/controlador_servicio_registar.php',
 		type: 'POST',
 		data:{
 			idrecepcion:idrecepcion,
 			monto:monto,
			concepto:concepto,
			responsable:responsable,
			comentario:comentario

 		}
 	}).done(function(resp){
 		//alert(resp);
 		if(resp>0){
        Swal.fire("Mensaje de Confirmacion","Servicio Registrados","success").then((result) => {
        			//$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
        			cargar_Notificaiones_Recepcion();
 				if (result.value) {
 					$("#contenido_principal").load("servicio/mantenimiento_servicio.php");
 				}
 			});

 		}else{
 			return Swal.fire("Mensaje de Error","No se pudo completar el registro","error");
 		}
	})
}



 /********************************************************************
 				VALIDAR CAMPOS 
 ********************************************************************/
function ValidarCamposServicio(comentario,responsable,monto,cliente){
 	Boolean(document.getElementById(comentario).value.length>0) ? $("#"+comentario).removeClass("is-invalid").addClass("is-valid") : $("#"+comentario).removeClass("is-valid").addClass("is-invalid");
    Boolean(document.getElementById(responsable).value.length>0) ? $("#"+responsable).removeClass("is-invalid").addClass("is-valid") : $("#"+responsable).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(monto).value.length>0) ? $("#"+monto).removeClass("is-invalid").addClass("is-valid") : $("#"+monto).removeClass("is-valid").addClass("is-invalid");
 	Boolean(document.getElementById(cliente).value.length>0) ? $("#"+cliente).removeClass("is-invalid").addClass("is-valid") : $("#"+cliente).removeClass("is-valid").addClass("is-invalid");
 }



 /********************************************************************
 				LIMPIAR TEXBOX
 ********************************************************************/
function LimpiartxtServicio(){
	document.getElementById('text_idrecepcion').value="";
	document.getElementById('text_monto').value="";
	document.getElementById('text_concepto').value="";
	document.getElementById('text_responsable').value="";
	document.getElementById('text_comentario').value="";
	document.getElementById('text_adelanto').value="";
	document.getElementById('text_pendiente').value="";

 }




 /********************************************************************
 			ELIMINAR SERVICIO (MENSAJE)
 ********************************************************************/
 $('#tabla_servicio').on('click', '.CambiarEstado', function() {//campo activar tiene que ir en el boton
	var data = tbl_servicio.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_servicio.row(this).child.isShown()) {
		var data = tbl_servicio.row(this).data();//para celular y usas el responsive datatable
	}
	Swal.fire({
	  title: 'Desea Eliminar el Servicio?',
	  text: "Retornara el estado de la Recepcion",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, confirmar'
	}).then((result) => {
	  if (result.isConfirmed) {
	   Eliminar_Servicio(data.servicio_id,"ELIMINADO");//data[0] (id)
	   //console.log(data.rol_id);
	  }
	})
 });



 /********************************************************************
 					ELIMINAR EL SERVICIO 
 ********************************************************************/
 function Eliminar_Servicio(id){
	$.ajax({
 		url:'../controller/servicio/controlador_eliminar_servicio.php',
 		type: 'POST',
 		data:{
 			    id: id//le enviamos los campos al controlador
 	

 		}
 	}).done(function(resp){
 		if (resp>0) {
	 				Swal.fire("Mensaje de Confirmacion","Servicio Eliminado","success").then((value)=>{
	 					tbl_servicio.ajax.reload();//recargar dataTable
	 					cargar_Notificaiones_Recepcion();
	 				});	 			
	 		}else{
	 			Swal.fire("Mensaje de Error","No se puede Eliminar el Servicio","error");
	 		}
 	})
 }


/**********************************************************************
        LISTAR ESTADO DE LA CAJA Y VALIDAR PARA HACER UN SERVICIO
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
				$('#textnuevoservicio').prop('hidden', false);//boton nueva venta
			}else {
				//QUITAMOS EL BOTON SI LA CAJA NO ESTA APERTURADA
				Swal.fire("Mensaje de Error","Tienes que Aperturar una caja","error");
				$('#textnuevoservicio').prop('hidden', true);// quitamos el boton modificar 
			}

		

        }
    })
}






