    <!-- Content Header (Page header) -->

    <script src="../js/recepcion.js?rev=<?php echo time(); ?>"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="col-lg-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Listado de Recepciones</b></h3><label for="" id="text_estado" hidden></label>
                <button class=" btn btn-info btn-sm float-right" id="textnuevarecepcion"
                    onclick="AbrirModalRegistroRecepcion();"><i class="fas fa-plus"></i> Nuevo</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table id="tabla_recepcion" class="display compact">
                            <thead style="background:#343A40; color:white">
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Concepto</th>
                                    <th>Motivo</th>
                                    <th>Monto</th>
                                    <th>Adelanto</th>
                                    <th>Fecha</th>
                                    <th>Entrega</th>
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
    <div class="modal fade" id="modal_registro_recepcion" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Recepcion de Equipos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">


                        <div class="col-6   col-xs-12">
                            <label>Cliente:</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_cliente"
                                style="width:100%"> </select>
                        </div>
                        <div class="  col-1 col-xs-12">
                            <label for="">&nbsp;</label><br>
                            <button class="btn btn-success btn-sm " onclick="AbrirModalRegistroCliente();"><i
                                    class="fas fa-plus"></i></button>
                        </div>

                        <div class="col-5 col-xs-12">
                            <label>Equipo:</label>
                            <input type="text" id="text_equipo" class="form-control form-control-sm"
                                placeholder="Equipo">
                        </div>



                        <div class="col-4 col-xs-12">
                            <label>Marca:</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_marca"
                                style="width: 100%"> </select>
                        </div>

                        <div class="col-8 col-xs-12">
                            <label>Caracteristicas:</label>
                            <input type="text" id="text_caracteristicas" class="form-control form-control-sm"
                                placeholder="Caracteristicas">
                        </div>




                        <div class="col-4 col-xs-12">
                            <label>Motivo:</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_motivo"
                                style="width: 100%"> </select>
                        </div>

                        <div class="col-8 col-xs-12">
                            <label>Contraseña</label>
                            <input type="text" id="text_accesorios" class="form-control form-control-sm"
                                placeholder="Contraseña">
                        </div>



                        <div class="col-4 col-xs-12">
                            <label>F. Entrega:</label>
                            <input type="date" id="text_fentrega" class="form-control form-control-sm"
                                placeholder="Accesorios">
                        </div>
                        <div class="col-8 col-xs-12">
                            <label>Falla:</label>
                            <input type="text" id="text_concepto" class="form-control form-control-sm"
                                onpaste="return false" placeholder="Falla del equipo">
                        </div>



                        <div class="col-3 col-xs-12">
                            <label>Monto:</label>
                            <input type="number" id="text_monto" class="form-control form-control-sm"
                                oninput="calcular();" onpaste="return false" placeholder="Monto">
                        </div>

                        <div class="col-1" style="text-align: right;">
                            <label for="">&nbsp;</label><br>
                            <input type="checkbox" id="chkadelanto" hidden>
                        </div>
                        <div class="col-4 col-xs-12">
                            <label>Adelanto:</label>
                            <input type="number" id="text_adelanto" class="form-control form-control-sm"
                                oninput="calcular();" placeholder="0">
                        </div>
                        <div class="col-4 col-xs-12">
                            <label>Pendiente:</label>
                            <input type="text" id="text_debe" class="form-control form-control-sm" oninput="calcular();"
                                value="0" placeholder="0" disabled>
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="RegistrarRecepcion();">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->

    <!-- Modal Editar  -->
    <div class="modal fade" id="modal_editar_recepcion" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Recepcion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-6   col-xs-12">
                            <input type="text" id="idrecepcion" hidden="">
                            <label>Cliente:</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_cliente_editar" style="width:100%"> </select>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label>Equipo:</label>
                            <input type="text" id="text_equipo_editar" class="form-control form-control-sm"
                                placeholder="Equipo">
                        </div>


                        <div class="col-4 col-xs-12">
                            <label>Marca:</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_marca_editar" style="width: 100%"> </select>
                        </div>
                        <div class="col-8 col-xs-12">
                            <label>Caracteristicas:</label>
                            <input type="text" id="text_caracteristicas_editar" class="form-control form-control-sm"
                                placeholder="Caracteristicas">
                        </div>


                        <div class="col-4 col-xs-12">
                            <label>Motivo:</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_motivo_editar" style="width: 100%"> </select>
                        </div>

                        <div class="col-8 col-xs-12">
                            <label>Accesorios:</label>
                            <input type="text" id="text_accesorios_editar" class="form-control form-control-sm"
                                placeholder="Accesorios">
                        </div>


                        <div class="col-4 col-xs-12">
                            <label>F. Entrega:</label>
                            <input type="date" id="text_fentrega_editar" class="form-control form-control-sm"
                                placeholder="Accesorios">
                        </div>
                        <div class="col-8 col-xs-12">
                            <label>Falla:</label>
                            <input type="text" id="text_concepto_editar" class="form-control form-control-sm"
                                onpaste="return false" placeholder="Falla del equipo">
                        </div>



                        <div class="col-3 col-xs-12">
                            <label>Monto:</label>
                            <input type="number" id="text_monto_editar" class="form-control  form-control-sm"
                                oninput="calcularAlEditar();" placeholder="Monto">
                        </div>

                        <div class="col-1" style="text-align: right;">
                            <label for="">&nbsp;</label><br>
                            <input type="checkbox" id="chkadelanto2" hidden>
                        </div>
                        <div class="col-4 col-xs-12">
                            <label>Adelanto:</label>
                            <input type="number" id="text_adelanto_editar" class="form-control form-control-sm"
                                oninput="calcularAlEditar();" placeholder="Adelanto">
                        </div>
                        <div class="col-4 col-xs-12">
                            <label>Pendiente:</label>
                            <input type="text" id="text_debe_editar" class="form-control form-control-sm"
                                oninput="calcularAlEditar();" placeholder="Por Pagar" disabled>
                        </div>

                        <div class="col-8   col-xs-12">
                            <input type="text" id="idrecepcion" hidden="">
                            <label>Estado:</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_estado_recepcion_editar" style="width: 100%">
                                <option value="ACTIVO">ACTIVO</option>
                                <!--iniciar el select 2 en el script -->
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                        <div class="col-4   col-xs-12">
                            <label>Recoger:</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_recoger_recepcion_editar" style="width: 100%">
                                <option value="">Seleccione</option>
                                <!--iniciar el select 2 en el script -->
                                <option value="POR RECOGER">POR RECOGER</option>
                                <option value="POR ENTREGAR">POR ENTREGAR</option>

                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="ModificarRecepcion();">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->


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
//para el dise単o del combo
$(document).ready(function() {
    $('.js-example-basic-single').select2();
     //OCULTAR LO BOTONES DE BUSQUEDAD
     $("#buscarNit").attr('hidden', true);
    $("#buscarRuc").attr('hidden', true);

    //PARA HABILITAR LO BOTONES DE BUSQUEDAD
    $("#select_tipo_doc").change(function() {
        buscarNitRuc();
    });
    cargar_Notificaiones_Recepcion();
    Listar_Recepcion();
    cargar_SelectCliente();
    cargar_SelectMotivo();
    cargar_SelectMarca();
    Traer_estado_caja();

});


var f = new Date();
var anio = f.getFullYear();
var mes = f.getMonth() + 1;
var d = f.getDate();


if (d < 10) {
    d = '0' + d;
}
if (mes < 10) {
    mes = '0' + mes;
}



document.getElementById('text_fentrega').value = anio + "-" + mes + "-" + d;
//document.getElementById("text_adelanto").value="0";



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
    </script>