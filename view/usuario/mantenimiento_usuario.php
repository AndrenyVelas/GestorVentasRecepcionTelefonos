
    <!-- Content Header (Page header) -->

<script src="../js/usuario.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
          <div class="col-lg-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title"><b>Listado de Usuarios</b></h3>
                <button class="btn btn-info btn-sm float-right" onclick="AbrirModalRegistroUsuario();"><i class="fas fa-plus"></i> Nuevo</button>
              </div>
              <div class="card-body">
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="tabla_usuario_simple" class="display compact">
                      <thead style="background:#343A40; color:white">
                          <tr>
                              <th>#</th>
                              <th>Usuario</th>
                              <th>Nombre</th>
                              <th>Rol</th>
                              <th>Foto</th>
                              <th  style="text-align: center;">Estado</th>
                              <th style="text-align: center;">Accion</th>
                          </tr>
                      </thead>

                  </table>
                  
                </div>
              </div>  
              </div>
            </div>
          </div>


  <!-- Modal registrar -->
<div class="modal fade" id="modal_registro_usuario"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#343A40; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Registro Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">


           <div class="col-12 col-xs-12">
                    <label form="">Usuario: </label>
                   <input type="text" id="text_usuario" class="form-control form-control-sm"  onkeypress="return soloLetras(event)" placeholder="Usuario">
            </div>
            <div class="col-12 col-xs-12">
                    <label form="">Clave: </label>
                   <input type="password" id="text_clave"  class="form-control form-control-sm" placeholder="Clave">
            </div>
            <div class="col-12 col-xs-12">
                    <label form="">Nombre Completo: </label>
                  <input type="text" id="text_correo"   class="form-control form-control-sm" onkeypress="return soloLetras(event)" placeholder="Nombre Completo">
            </div>
              <div class="col-12">
                    <label form="">Rol:</label>
                     <select class="form-control form-control-sm js-example-basic-single" id="select_rol" style="width: 100%"> </select>
              </div> 

            <div class="col-12">
               <label for="">Foto</label></br>
               <input type="file" id="text_foto" > 
            </div>

            <!--
            <div class="form-group input-group-sm mb-3">
              <br>   <label for="">Opciones:</label>
                 <ul style="list-style: none;" id="permisos">
                  
                </ul>
            </div> -->



        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="RegistrarUsuario();">Registrar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->

  <!-- Modal Editar -->
<div class="modal fade" id="modal_editar_usuario"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#343A40; color:white">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
               <span class="input-group-text">Usuario</span>
              </div>
               <input type="text" id="text_idusuario_editar" hidden="">
               <input type="text" id="text_usuario_editar" class="form-control form-control-sm" onkeypress="return soloLetras(event)" placeholder="Usuario">
          </div>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
               <span class="input-group-text">Nombre</span>
              </div>
               <input type="text" id="text_correo_editar"   class="form-control form-control-sm" onkeypress="return soloLetras(event)" placeholder="Nombre Completo">
          </div>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
               <span class="input-group-text">Rol</span>
              </div>
               <select class="form-control form-control-sm js-example-basic-single" id="select_rol_editar" style="width: 90%"> </select>
          </div>       
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ModificarUsuario();">Modificar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->

  <!-- Modal Editar FOTO -->
<div class="modal fade" id="modal_editar_foto"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar foto del Usuario <label for="" id="lbl_usuario"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

           <div class="col-12">
            <input type="text" id="idusuario_foto" hidden="" >
            <input type="text" id="fotoactual" hidden="" >
            <input type="file" id="text_foto_editar" >
          </div>
     
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ModificarFotoUsuario();">Modificar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->

  <!-- Modal Editar CLAVE -->
<div class="modal fade" id="modal_editar_clave"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Clave del Usuario <label for="" id="lbl_usuario_clave"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">          
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
               <span class="input-group-text">Clave Nueva</span>
              </div>
               <input type="text" id="idusuario_clave" hidden="" >
               <input type="password" id="text_clave_editar"  class="form-control form-control-sm" placeholder="Clave">
          </div>
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
               <span class="input-group-text">Repetir Clave</span>
              </div>
               <input type="password" id="text_clave_repetir"  class="form-control form-control-sm" placeholder="Clave">
          </div>
     
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ModificarClaveUsuario();">Modificar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin Modal -->

<script>
//para el diseño del combo
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
    //llamamos al js 
  Listar_usuario_serverside();
  cargar_SelectRol();
  //cargar_SelectPermisos();
 });


 /********************************************************************
       CARGAR PERMISOS EN COMBO
 *******************************************************************
 function cargar_SelectPermisos(){//enviamos al scrpit mantenimiento examen
  $.ajax({
     url:'../controller/usuario/controlador_permisos.php',
    type: 'POST'
  }).done(function(resp){
      //  alert(resp);
    let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
    let llenardata = "";
    if (data.length>0) {
      for (let i = 0; i < data.length; i++) {//"<li><input type='"checkbox"'' name="permisos" value='"+data[i][0]+"'>"+data[i][1]+"</li>"
        llenardata+="<li><input type='checkbox' name='permisos[]' value='"+data[i][0]+"'>"+data[i][1]+"</li>";

        //llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
      }
      document.getElementById('permisos').innerHTML = llenardata;//primero para registrar luego en modificar colocamos el select editar
    }else{
      llenardata+="<li><input type='checkbox' name='permisos' value=''>No hay datos</li>";
      //llenardata+="<option value=''>No se encontraron datos</option>";
      document.getElementById('permisos').innerHTML = llenardata;

    }
  })
 }*/



/*
 function cargar_Notificaiones_Recepcion(){
  $.ajax({
    url:'../controller/usuario/controlador_permisos.php',
    type: 'POST'
  }).done(function(resp){
    let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
    //document.getElementById('lbl_contador').innerHTML=data.length;//cuantas recepciones tengo pendientes
    let llenardata = "";
    if (data.length>0) {
      for (let i = 0; i < data.length; i++) {
        llenardata += '<a href="#" class="dropdown-item">'+
           '<div class="media">'+
            '<div class="media-body">'+
              '<h4 class="dropdown-item-title">'+
              '<b>Cliente: </b>'+data[i][0]+''+
              '<span class="float-right text-sm text-warning"><i class="fas fa-folder-minus"></i></i></span>'+
              '</h4>'+
            '<p class="text-sm">Estado: '+data[i][1]+' | '+data[i][3]+'</p>'+
          
            '<p class="text-sm text-muted"><i class="fas fa-calendar-alt"></i> Fecha: '+data[i][2]+' </p>'+
           ' </div>'+
          '</div>'+

          '</a>'+
          '<div class="dropdown-divider"></div>';
      }
      document.getElementById('div_cuerpo').innerHTML = llenardata;
    
    }else{
      llenardata+="<option value=''>No se encontraron datos</option>";
      document.getElementById('select_rol').innerHTML = llenardata;
      document.getElementById('select_rol_editar').innerHTML = llenardata;

    }
  })
 }
*/
  

//validar que solo seleccione foto (editar foto)
 document.getElementById("text_foto_editar").addEventListener("change", () => {
        var fileName = document.getElementById("text_foto_editar").value; 
        var idxDot = fileName.lastIndexOf(".") + 1; 
        var extFile = fileName.substr(idxDot, fileName.length).
        toLowerCase(); 
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 
        //TO DO 
        }else{ 
        Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SE ACEPTAN IMAGENES - USTED SUBIO UN ARCHIVO CON EXTESION "+extFile,"warning");
        document.getElementById("text_foto_editar").value="";
        } 
 }); 

//validar que solo seleccione foto (Registrar foto)
 document.getElementById("text_foto").addEventListener("change", () => {
        var fileName = document.getElementById("text_foto").value; 
        var idxDot = fileName.lastIndexOf(".") + 1; 
        var extFile = fileName.substr(idxDot, fileName.length).
        toLowerCase(); 
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 
        //TO DO 
        }else{ 
        Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SE ACEPTAN IMAGENES - USTED SUBIO UN ARCHIVO CON EXTESION "+extFile,"warning");
        document.getElementById("text_foto").value="";
        } 
 }); 


</script>
       