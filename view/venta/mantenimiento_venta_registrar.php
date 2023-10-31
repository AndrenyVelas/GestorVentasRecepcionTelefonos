   <!-- Content Header (Page header) -->
   <script src="../js/venta.js?rev=<?php echo time(); ?>"></script>
   <div class="content-header">
       <div class="container-fluid">
           <div class="row mb-2">


           </div><!-- /.row -->
       </div><!-- /.container-fluid -->
   </div>

   <div class="col-lg-12">
       <div class="card ">
           <div class="card-header">
               <h3 class="card-title" style="text-align:center;"><b>Registro de Ventas</b></h3>
           </div>
           <div class="card-body">

               <div class="row">
                   <div class="col-7">
                       <label form="">Cliente</label>
                       <input type="text" id="text_idcliente" hidden>
                       <input type="text" id="text_idventa" hidden="">
                       <select class="js-example-basic-single" id="select_cliente2" style="width:100%">

                       </select>
                   </div>
                   <div class="  col-1 col-xs-12">
                       <label for="">&nbsp;</label><br>
                       <button class="btn btn-success btn-sm " onclick="AbrirModalRegistroCliente();"><i
                               class="fas fa-plus"></i></button>
                   </div>
                   <div class="col-4">
                       <label form="">Impuesto</label>
                       <input type="text" name="" class="form-control form-control-sm" id="text_impuesto" disabled>
                   </div>

                   <div class="col-4">
                       <input type="text" id="text_idcompro" hidden>
                       <input type="text" id="text_compro" hidden>
                       <label form="">Comprobante</label>
                       <select class="js-example-basic-single" id="select_tipo_com" style="width:100%">

                       </select>
                   </div>

                   <div class="col-4">
                       <label form="">Serie</label>
                       <input type="text" name="" class="form-control form-control-sm" id="text_serie" disabled>
                   </div>
                   <div class="col-4">
                       <label form="">Numero</label>
                       <input type="text" name="" class="form-control form-control-sm" id="text_num_compro" disabled>
                   </div>


                   <div class="col-sm-4">
                       <label form="">Forma de pago</label>
                       <input type="text" id="text_idformapagoV" hidden>

                       <select class="js-example-basic-single" id="select_forma_pago_V" style="width:100%">

                       </select>
                   </div>

                   <div class="col-sm-8">
                       <label form="">Observacion</label>
                       <input type="text" name="" class="form-control form-control-sm" id="text_comentario">
                   </div>


                   <div class="col-4">
                       <label form="">Productos</label>
                       <input type="text" id="text_nombre_producto" hidden>
                       <input type="text" id="text_idproducto" hidden="">
                       <select class="js-example-basic-single" id="text_producto" style="width:100%">

                       </select>
                   </div>
                   <div class="col-2">
                       <label form="">Stock</label>
                       <input type="text" name="" class="form-control form-control-sm" id="text_stock" disabled
                           placeholder="Stock">
                   </div>
                   <div class="col-3">
                       <label form="">Precio</label>
                       <input type="text" name="" class="form-control form-control-sm" id="text_precio" disabled
                           placeholder="Precio">
                   </div>
                   <div class="col-2">
                       <label form="">Cantidad</label>
                       <input type="number" name="" class="form-control form-control-sm" id="text_cantidad"
                           onkeypress="return soloNumeros(event)" placeholder="Cantidad">
                   </div>
                   <div class="col-1">
                       <label form="">&nbsp;</label><br>
                       <button class="btn btn-success btn-sm" onclick="Agregar_Producto();"><i
                               class="fas fa-plus"></i></button>
                   </div>

                   <div class="col-12" style="text-align: center;">
                       <br>
                       <button class="btn btn-info btn-lg  btn-sm" onclick="Registrar_Venta();"><i
                               class="fa fa-save"></i> Registrar</button>
                   </div>


                   <div class="col-12 table-responsive"><br>
                       <table id="tabla_detalle_pro" class="display" style="width: 100%">
                           <thead style="background: #4f5962;color: #ffffff;">
                               <tr>
                                   <!-- se envian los datos el serverside -->
                                   <th>Id</th>
                                   <th>Producto</th>
                                   <th>Precio</th>
                                   <th>Cantidad</th>
                                   <th>Sub Total</th>
                                   <th style="text-align: center;">Accion</th>
                               </tr>
                           </thead>
                           <tbody id="tbody_tabla_detalle_pro">

                           </tbody>
                       </table>
                       <div>
                           <div class="col-12" style="text-align:right;">
                               <h5 for="" id="lbl_subtotal"></h5>
                           </div>
                           <div class="col-12" style="text-align:right;">
                               <h5 for="" id="lbl_impuesto"></h5>
                           </div>
                           <div class="col-12" style="text-align:right;">
                               <h5 for="" id="lbl_totalneto"></h5>
                           </div>

                       </div><br>

                   </div>


               </div>
           </div>
       </div>
   </div>

 
      <!-- Modal registrar -->
      <div class="modal fade" id="modal_registro_cliente" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12   col-xs-12">

                            <label>Tipo Doc.:</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_tipo_doc"
                                style="width: 100%">
                                <option selected="true">Seleccione Tipo Docmento..</option>
                                <option value="NIT">NIT</option>
                                <!--iniciar el select 2 en el script -->
                                <option value="R.U.C">R.U.C</option>
                            </select>
                        </div>

                        <div class="col-10 col-xs-10">
                            <label for="">Nro Doc.: </label>
                            <input type="text" id="text_nit" class="form-control form-control-sm"
                                placeholder="Documento">
                        </div>
                        <div class="col-2 col-xs-2">
                            <div class="form-group mb-2">
                                <label for="">&nbsp;</label> <br>
                                <button type="button" class="btn btn-sm btn-success" id="buscarNit"><i
                                        class="fas fa-search"></i></button>
                                <button type="button" class="btn btn-sm btn-danger" id="buscarRuc"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>


                        <!-- <div class="col-2 col-xs-2">
                            <label for="">&nbsp;</label> <br>
                            <button type="button" class="btn btn-sm btn-success" id="buscar"><i
                                    class="fas fa-search"></i></button>
                        </div> -->


                        <div class="col-12 col-xs-12">
                            <label for="">Nombres: </label>
                            <input type="text" id="text_nombre" class="form-control form-control-sm"
                                onkeypress="return soloLetras(event)" placeholder="Nombre completo">
                        </div>
                        <div class="col-12 col-xs-12" hidden>
                            <label for="">Apellido P.: </label>
                            <input type="text" id="text_ape_p" class="form-control form-control-sm"
                                onkeypress="return soloLetras(event)" placeholder="Apellido Paterno">
                        </div>
                        <div class="col-12 col-xs-12" hidden>
                            <label for="">Apellido M.: </label>
                            <input type="text" id="text_ape_m" class="form-control form-control-sm"
                                onkeypress="return soloLetras(event)" placeholder="Apellido Materno">
                        </div>

                        <div class="col-12 col-xs-12">
                            <label for="">Direccion: </label>
                            <input type="text" id="text_direccion" class="form-control form-control-sm"
                                placeholder="Direccion">
                        </div>

                        <div class="col-12 col-xs-12">
                            <label for="">Celular: </label>
                            <input type="text" id="text_celular" class="form-control form-control-sm"
                                placeholder="Celular">
                        </div>

                        <div class="col-12 col-xs-12">
                            <label for="">correo: </label>
                            <input type="text" id="text_correo" class="form-control form-control-sm"
                                placeholder="Correo">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-sm btn-primary"
                        onclick="RegistrarCliente();">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->








   <script>
//para el diseño del combo
$(document).ready(function() {
    $('.js-example-basic-single').select2();
     //OCULTAR LO BOTONES DE BUSQUEDAD
     $("#buscarNit").attr('hidden', true);
    $("#buscarRuc").attr('hidden', true);

    //PARA HABILITAR LO BOTONES DE BUSQUEDAD
    $("#select_tipo_doc").change(function() {
        buscarNitRuc();
    });

    //Listar_Ver_Cliente();
    cargar_SelectCliente();
    //Listar_Ver_Producto();
    cargar_SelectComprobante();
    cargar_Select_Productos2();
    cargar_Select_FormaPAgo_v();

    $('#select_tipo_com').on('select2:select', function(e) {
        //let idcpr = document.getElementById('select_tipo_com').value;
        var idcpr = $('#select_tipo_com').val();
        // alert(cli);
        document.getElementById('text_idcompro').value = idcpr;
        document.getElementById('text_serie').value = arreglo_serie_com[idcpr];
        document.getElementById('text_num_compro').value = "0000" + arreglo_numero_com[idcpr];
        document.getElementById('text_compro').value = arreglo_com[idcpr];
    })



});


function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


/********************************************************************************************************************************************
 ****************************************************** FORMULARIO VENTA ACTUALIZADO ************************************
 ********************************************************************************************************************************************/






/********************************************************************
   COMPROBANTE EN COMBO
********************************************************************/
var arreglo_com = new Array();
var arreglo_serie_com = new Array();
var arreglo_numero_com = new Array();
//cargar todos los Marca en combo
function cargar_SelectComprobante() { //enviamos al scrpit mantenimiento examen
    $.ajax({
        url: '../controller/venta/controlador_cargar_select_comprobante.php',
        type: 'POST'
    }).done(function(resp) {
        let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA
        let llenardata = "<option >Seleccione...</option>";
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                llenardata += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
                arreglo_com[data[i][0]] = data[i][1];
                arreglo_serie_com[data[i][0]] = data[i][2]; //PARA JALAR LA SERIE DEL PROCEDURE
                arreglo_numero_com[data[i][0]] = data[i][3]; //PARA JALAR LA CORRELATIVO DEL PROCEDURE
            }
            document.getElementById('select_tipo_com').innerHTML =
                llenardata; //primero para registrar luego en modificar colocamos el select editar
            document.getElementById("select_tipo_com").selectedIndex = "0";
        } else {
            llenardata += "<option value=''>No se encontraron datos</option>";
            document.getElementById('select_tipo_com').innerHTML = llenardata;

        }
    })
}

//ENVIAMOS DATOS DEL js function cargar_SelectComprobante()




//HABILITAR CAMPO IMPUESTO SEGUN SELECCIONE FACTURA - cargar_SelectComprobante()
$('#select_tipo_com').on('select2:select', function(e) {
    let tipocom = document.getElementById('select_tipo_com').value;
    if (tipocom == 2) {
        document.getElementById('text_impuesto').disabled = false;
        document.getElementById('text_impuesto').value = "0.18";
    } else {
        document.getElementById('text_impuesto').disabled = true;
        document.getElementById('text_impuesto').value = "";
    }
})






/********************************************************************
   PRODUCTOS EN COMBO
********************************************************************/
var arreglo_PRO = new Array();
var arreglo_stock = new Array();
var arreglo_precio = new Array();
//var arreglo_nombre = new Array();

function cargar_Select_Productos2() { //enviamos al scrpit mantenimiento examen
    $.ajax({
        url: '../controller/venta/controlador_cargar_selectcombo_productos_venta.php',
        type: 'POST'
    }).done(function(resp) {
        //alert(arreglo_stock);
        let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA
        let llenardata = "<option value=''>Seleccione</option>";
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                llenardata += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
                arreglo_PRO[data[i][0]] = data[i][1];
                arreglo_stock[data[i][0]] = data[i][2]; //PARA JALAR LA STOCK DEL PROCEDURE
                arreglo_precio[data[i][0]] = data[i][3]; //PARA JALAR LA PRECIO DEL PROCEDURE
            }
            document.getElementById('text_producto').innerHTML =
                llenardata; //primero para registrar luego en modificar colocamos el select editar

        } else {
            llenardata += "<option value=''>No se encontraron datos</option>";
            document.getElementById('text_producto').innerHTML = llenardata;

        }
    })
}


//ENVIAMOS DATOS DE PRODUCTOS A CAJAS DE TEXTO DEL PRODUCTO
$('#text_producto').on('select2:select', function(e) {
    let idP = document.getElementById('text_producto').value;
    // alert(id);
    document.getElementById('text_idproducto').value = idP; //ID
    document.getElementById('text_stock').value = arreglo_stock[idP]; //STOCK
    document.getElementById('text_precio').value = arreglo_precio[idP]; ///PRECIO
    document.getElementById('text_nombre_producto').value = arreglo_PRO[idP]; //NOMBRE PRODUCTO

})
   </script>