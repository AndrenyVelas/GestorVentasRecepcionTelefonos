 /**********************************************************************
 				  LISTAR ROL CON METODO NORMAL
 ***********************************************************************/

var tbl_rol;
 function Listar_Roles(){//enviarlo al scrip en MANTENIMIENTO ROL
	tbl_rol = $("#tabla_rol").DataTable({
		"responsive":true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"processing": true,
		"ajax" : {
			"url": "../controller/rol/controlador_rol_listar.php",
			type: 'POST'
		},
		"columns":[
		//todos los datos del procedimiento almacenado
		{"defaultContent": ""},//cintador 
		{"data": "rol_nombre"},
		{"data": "rol_fregistro"},
		{"data": "rol_estado",
			render: function(data,type,row){
				if (data==="ACTIVO") {
					return "<center>"+'<span class="badge badge-success">ACTIVO</span>'+"</center>";
				}else{
					return "<center>"+'<span class="badge badge-danger">INACTIVO</span>'+"</center>";
				}
			}
		},
		{"defaultContent": "<center>"+"<span class=' editar text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar'><i class= 'fa fa-edit'></i></span> "+"</center>"}


		],
		"language":idioma_espanol,
		select:true
	});
	//contador en cada tabla
	tbl_rol.on('draw.td',function(){
		var PageInfo = $("#tabla_rol").DataTable().page.info();
		tbl_rol.column(0,{page: 'current'}).nodes().each(function(cell,i){
			cell.innerHTML = i + 1 + PageInfo.start;
		});
	});
 }	





 /**********************************************************************
 				  ABRIR MODAL EDITAR ROL
 ***********************************************************************/
 $('#tabla_rol').on('click', '.editar', function() {//class foto tiene que ir en el boton
	var data = tbl_rol.row($(this).parents('tr')).data();//tamaño de escritorio
	if (tbl_rol.row(this).child.isShown()) {
		var data = tbl_rol.row(this).data();//para celular y usas el responsive datatable
	}
		$("#modal_editar_rol").modal({backdrop:'static', keyboard: false});	
		$("#modal_editar_rol").modal('show');//abrimos el modal
		//LimpiarModalUsuario();
		//mandamos parametros a los texbox
		//document.getElementById('idrol').value=data[0];
		document.getElementById('idrol').value=data.rol_id;//id del procedure
		document.getElementById('text_rol_editar').value=data.rol_nombre;//enviamos el nombre del usu al modal
		//console.log(data.rol_id);//para enviar el dato  en console
		$("#select_estado").select2().val(data.rol_estado).trigger('change.select2');
 });




 /**********************************************************************
 				  ABRIR MODAL REGISTRAR ROL
 ***********************************************************************/
 function AbrirModalRegistroRol(){
 	//para que no se nos salga del modal haciendo click a los costados
 	$("#modal_registro_rol").modal({backdrop:'static', keyboard: false});	
 	$("#modal_registro_rol").modal('show');//abrimos el modal
 	document.getElementById('text_rol').value="";
 	//LimpiarModalUsuario();//limpiar texbox cada que demos en nuevo
 	$('.form-control').removeClass("is-invalid").removeClass("is-valid");//remover las clases
 }





 /**********************************************************************
 				  REGISTRAR ROL
 ***********************************************************************/
 function RegistrarRol(){
 	let rol = document.getElementById('text_rol').value;
 	//let estado = document.getElementById('select_estado').value;
 	if (rol.length ==0 ) {
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}
 
	$.ajax({
 		url:'../controller/rol/controlador_rol_registar.php',
 		type: 'POST',
 		data:{
 			rol: rol,//le enviamos los campos al controlador
 			//estado: estado

 		}
 	}).done(function(resp){
 		if (resp>0) {
 			if (resp==1) {//validamos la respuesta del procedure si retorna 1 o 2
 				Swal.fire("Mensaje de Confirmacion","Rol Registrado","success").then((value)=>{
	 					document.getElementById('text_rol').value="";
	 					$("#modal_registro_rol").modal('hide');//abrimos el modal

	 					tbl_rol.ajax.reload();//recargar dataTable
	 				});	
 			}else{
 				Swal.fire("Mensaje de Advertencia","El rol ya se encuentra registrado","warning");
 			}
	 				 			
	 		}else{
	 			Swal.fire("Mensaje de Error","No se puede registrar el rol","error");
	 		}
 	})	 
 }
	
 	
    
 

 /**********************************************************************
 				  MODIFICAR ROL
 ***********************************************************************/
 function ModificarRol(){
 	let id = document.getElementById('idrol').value;
 	let rol = document.getElementById('text_rol_editar').value;
 	let estado = document.getElementById('select_estado').value;
 	if (rol.length ==0 || estado.length == 0 ) {
 		return Swal.fire("Mensaje de Advertencia","Tiene campos vacios","warning");
 	}
 
	$.ajax({
 		url:'../controller/rol/controlador_rol_modificar.php',
 		type: 'POST',
 		data:{
 			id: id,
 			rol: rol,//le enviamos los campos al controlador
 			estado: estado

 		}
 	}).done(function(resp){	
		if (resp>0) {
 			if (resp==1) {//validamos la respuesta del procedure si retorna 1 o 2 ()
 				Swal.fire("Mensaje de Confirmacion","Rol Actualizado","success").then((value)=>{
	 					$("#modal_editar_rol").modal('hide');//abrimos el modal
	 					tbl_rol.ajax.reload();//recargar dataTable
	 				});	
 			}else{
 				Swal.fire("Mensaje de Advertencia","El rol ya se encuentra registrado","warning");
 			}
	 				 			
	 		}else{
	 			Swal.fire("Mensaje de Error","No se puede registrar el rol","error");
	 		}
 		
 	})	 
 }
	''