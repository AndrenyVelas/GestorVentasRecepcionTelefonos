    <!-- Content Header (Page header) -->

    <script src="../js/cliente.js?rev=<?php echo time(); ?>"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="col-lg-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Listado de Clientes</b></h3>
                <button class="btn btn-info btn-sm float-right" onclick="AbrirModalRegistroCliente();"><i
                        class="fas fa-plus"></i> Nuevo</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table id="tabla_cliente" class="display compact">
                            <thead style="background:#343A40; color:white">
                                <tr>
                                    <th>#</th>
                                    <th style="width:25%">Nombres</th>
                                    <th>Direccion</th>
                                    <th>Documento</th>
                                    <th>Celular</th>
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

                        <div class="col-12 col-xs-12">
                            <label for="">Nro Doc.: </label>
                            <input type="text" id="text_nit" class="form-control form-control-sm"
                                placeholder="Documento">
                        </div>
                        <!-- <div class="col-2 col-xs-2">
                            <div class="form-group mb-2">
                                <label for="">&nbsp;</label> <br>
                                <button type="button" class="btn btn-sm btn-success" id="buscarNit"><i
                                        class="fas fa-search"></i></button>
                                <button type="button" class="btn btn-sm btn-danger" id="buscarRuc"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div> -->


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

    <!-- Modal Editar  -->
    <div class="modal fade" id="modal_editar_cliente" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;">Actualizar Clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12   col-xs-12">

                            <label>Tipo Doc.:</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_tipo_doc_editar" style="width: 100%">
                                <option selected="true">Seleccione Tipo Docmento..</option>
                                <option value="NIT">NIT</option>
                                <!--iniciar el select 2 en el script -->
                                <!-- <option value="R.U.C">R.U.C</option> -->
                            </select>
                        </div>
                        <div class="col-12 col-xs-12">
                            <label for="">Documento: </label>
                            <input type="text" id="text_nit_editar" class="form-control form-control-sm"
                                placeholder="Documento">
                        </div>

                        <div class="col-12 col-xs-12">
                            <label for="">Nombre: </label>
                            <input type="text" id="idcliente" hidden>
                            <input type="text" id="text_nombre_editar" class="form-control form-control-sm"
                                placeholder="Nombre completo">
                        </div>
                        <div class="col-12 col-xs-12" hidden>
                            <label for="">Apellido P.: </label>
                            <input type="text" id="text_ape_p_editar" class="form-control form-control-sm"
                                onkeypress="return soloLetras(event)" placeholder="Apellido Paterno">
                        </div>
                        <div class="col-12 col-xs-12" hidden>
                            <label for="">Apellido M.: </label>
                            <input type="text" id="text_ape_m_editar" class="form-control form-control-sm"
                                onkeypress="return soloLetras(event)" placeholder="Apellido Materno">
                        </div>

                        <div class="col-12 col-xs-12">
                            <label for="">Direccion: </label>
                            <input type="text" id="text_direccion_editar" class="form-control form-control-sm"
                                placeholder="Direccion">
                        </div>

                        <div class="col-12 col-xs-12">
                            <label for="">Celular: </label>
                            <input type="text" id="text_celular_editar" class="form-control form-control-sm"
                                placeholder="Celular">
                        </div>

                        <div class="col-12 col-xs-12">
                            <label for="">correo: </label>
                            <input type="text" id="text_correo_editar" class="form-control form-control-sm"
                                placeholder="Correo">
                        </div>



                        <div class="col-12   col-xs-12">
                            <input type="text" id="idrecepcion" hidden="">
                            <label>Estado:</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_estado_cliente_editar" style="width: 100%">
                                <option value="ACTIVO">ACTIVO</option>
                                <!--iniciar el select 2 en el script -->
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="ModificarCliente();">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->

    <script>
//para el diseño del combo
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    Listar_Cliente();

    //OCULTAR LO BOTONES DE BUSQUEDAD
    $("#buscarNit").attr('hidden', true);
    $("#buscarRuc").attr('hidden', true);

    //PARA HABILITAR LO BOTONES DE BUSQUEDAD
    $("#select_tipo_doc").change(function() {
        buscarNitRuc();
    });
});


/*===================================================================*/
//HABILITAR BOTONES DE BUSQUEDAD
/*===================================================================*/
function buscarNitRuc() {
    var tipoDoc = $("#select_tipo_doc").val();
    //console.log(tipoDoc);

    if (tipoDoc == 'NIT') {
        $("#buscarNit").attr('hidden', false);
        $("#buscarRuc").attr('hidden', true);
        $("#text_nit").val("");
        $("#text_direccion").val("");
    } else if (tipoDoc == 'R.U.C') {
        $("#buscarNit").attr('hidden', true);
        $("#buscarRuc").attr('hidden', false);
        $("#text_nit").val("");
    } else {
        alert('Debe Seleccione un tipo de documento');
        // Toast.fire({
        //     icon: 'error',
        //     title: 'Debe Seleccione un tipo de documento'
        // })

        $("#buscarNit").attr('hidden', true);
        $("#buscarRuc").attr('hidden', true);
    }

}

/*************************************************************************
         FUNCION PARA LLAMAR LOS DATOS DE RENIEC DESDE API
 ***************************************************************************/
$('#buscarNit').click(function() {
    nit = $('#text_nit').val();
    $.ajax({
        url: '../controller/reniec/consultaNIT.php',
        type: 'post',
        data: 'nit=' + nit,
        dataType: 'json',
        success: function(r) {
            if (r.numeroDocumento == nit) {
                // $('#text_ape_p').val(r.apellidoPaterno);
                // $('#text_ape_m').val(r.apellidoMaterno);
                $('#text_nombre').val(r.nombres + ' ' + r.apellidoPaterno + ' ' + r
                    .apellidoMaterno);
            } else {
                alert(r.error);
            }
            //console.log(r)
        }
    });
});

$('#buscarRuc').click(function() {
    ruc = $('#text_nit').val();
    $.ajax({
        url: '../controller/reniec/consultaRUC.php',
        type: 'post',
        data: 'ruc=' + ruc,
        dataType: 'json',
        success: function(r) {
            if (r.numeroDocumento == ruc) {
                // $('#text_ruc').val(r.numeroDocumento);//ruc
                $('#text_direccion').val(r.direccion); //direccion
                $('#text_nombre').val(r.nombre); //razon
            } else {
                alert(r.error);
            }
            // console.log(r)
        }
    });
});
    </script>