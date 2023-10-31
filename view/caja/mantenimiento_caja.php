    <!-- Content Header (Page header) -->

    <script src="../js/caja.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header ">
                            <!--bg-info -->
                            <h6 class="card-title" style="text-align:center"><b>Arqueo de Caja - </b>&nbsp;&nbsp;
                                <label for="" id="text_estado" class="text-info "></label>&nbsp;&nbsp; <label for=""
                                    id="text_fecha_apert" class="text-info "></label>

                            </h6>
                            <button class="btn btn-outline-success  mb-2 btnAbrirCaja float-right" type="button"
                                onclick="AbrirModalAbrirCaja();" title="Abrir Caja" id="btnAbrirCaja"><i
                                    class="fas fa-unlock"> Abrir caja</i>
                            </button>

                        </div>
                        <div class="card-body">

                            <!-- <div class="row">
                                <div class="col-md-5">
                                 
                                    <div class="panel panel-flat">
                                        <div class="table-responsive">
                                            <table class="display compact">
                                                <tbody>
                                                  <tr class="">
                                                        <td class=""></td>
                                                        <td class="">
                                                            <h5>
                                                                <left><strong>MONTO INICIAL</strong></left>
                                                            </h5>
                                                        </td>
                                                        <th class=""></th>
                                                        <th class="text-right">
                                                            <h5><strong id="text_apertura">S/ 0.00</strong></h5>
                                                            <input type="text" id="text_apertura" >
                                                            
                                                        </th>
                                                    </tr>
                                                    
                                                    <tr class="">
                                                        <th class=""></th>
                                                        <th class="text-success ">
                                                            <h5>
                                                                <left><strong>INGRESOS TOTALES</strong></left>
                                                            </h5>
                                                        </th>
                                                        <th class=""></th>
                                                        <th class="text-right text-success">
                                                            <h5><strong id="Ingresos">S/ 0.00</strong></h5>
                                                        </th>
                                                    </tr>
                                                    <tr class="">
                                                        <th class=""></th>
                                                        <th class="text-danger ">
                                                            <h5>
                                                                <left><strong>EGRESOS TOTALES</strong></left>
                                                            </h5>
                                                        </th>
                                                        <th class=""></th>
                                                        <th class="text-right text-danger">
                                                            <h5><strong id="Egresos">S/ 0.00</strong></h5>
                                                        </th>
                                                    </tr>
                                                    <tr class="">
                                                        <td class=""></td>
                                                        <td class="">
                                                            <h5>
                                                                <left><strong>SALDO</strong></left>
                                                            </h5>
                                                        </td>
                                                        <th class=""></th>
                                                        <th class="text-right">
                                                            <h5><strong id="Saldo">S/ 0.00</strong></h5>
                                                        </th>
                                                    </tr>
                                                    <tr class="">
                                                        <td class=""></td>
                                                        <td class="text-info">
                                                            <h5>
                                                                <left><strong>MONTO INICIAL + SALDO </strong></left>
                                                            </h5>
                                                        </td>
                                                        <th class=""></th>
                                                        <th class="text-right text-info">
                                                            <h5><strong id="Diferencia">S/ 0.00</strong></h5>
                                                        </th>
                                                        <input type="hidden" id="txtdiferencia" value="">
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">

                                <div class="col-5">
                                    <label for="">Fecha Inicio</label>
                                    <input type="date" name="" id="text_finicio" class="form-control  form-control-sm">
                                </div>
                                <div class="col-5">
                                    <label for="">Fecha Fin</label>
                                    <input type="date" name="" id="text_ffin" class="form-control  form-control-sm">
                                </div>
                                <div class="col-2">
                                    <label for="">&nbsp;</label><br>
                                    <button class="btn btn-info btn-sm" onclick="Listar_Caja()"><i
                                            class="fas fa-search"></i></button>

                                </div>

                            </div><br>

                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table id="tabla_movi_caja" class="display compact" style="width: 100%">
                                        <thead style="background:#343A40; color:white">
                                            <tr>
                                                <th>#</th>
                                                <th>Monto Ini</th>
                                                <th>Monto Servicio</th>
                                                <th>Monto Ventas</th>
                                                <th>Monto Egreso</th>
                                                <th>Fecha Apertura</th>
                                                <th>Fecha Cierre</th>
                                                <th>Cant Ventas</th>
                                                <th>Cant Egreso</th>
                                                <th>Monto Total</th>
                                                <th>Estado</th>
                                                <th style="text-align: center;">Accion</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Modal abrir caja -->
    <div class="modal fade" id="modal_abrir_caja" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Abrir Caja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-xs-12">
                            <label for="">Descripcion </label>
                            <input type="text" id="text_descripcion" class="form-control form-control-sm"
                                placeholder="Apertura de Caja" disabled>
                        </div>
                        <div class="col-12 col-xs-12">
                            <label for="">Monto Inicial</label>
                            <input type="number" id="text_monto" name= "text_monto" class="form-control form-control-sm"
                                placeholder="Monto incial">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary"
                        onclick="Registrar_Apertura_caja();myFunction(); ">Abrir
                        Caja</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->






    <!-- Modal cerrar caja -->
    <div class="modal fade" id="modal_cerrar_caja" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#990000; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Caja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-xs-12">

                            <label for="">Monto Apertura </label>
                            <input type="text" id="text_apertura" class="form-control form-control-sm"
                                placeholder="Apertura de Caja" oninput="Sumar();" disabled>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label for="">Monto Ventas</label>
                            <input type="number" id="text_monto_ventas" oninput="Sumar();"
                                class="form-control form-control-sm" placeholder="Monto incial" disabled>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label for="">Cant Ventas</label>
                            <input type="number" id="text_cant_ventas" class="form-control form-control-sm"
                                placeholder="Monto incial" disabled>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label for="">Monto Servicio</label>
                            <input type="number" id="text_monto_servicio" oninput="Sumar();"
                                class="form-control form-control-sm" placeholder="Monto incial" disabled>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label for="">Cant Servicio</label>
                            <input type="number" id="text_cant_servicio" class="form-control form-control-sm"
                                placeholder="Monto incial" disabled>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label for="">Monto Egreso</label>
                            <input type="number" id="text_monto_egreso" class="form-control form-control-sm"
                                placeholder="Monto incial" oninput="Sumar();" disabled>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label for="">Cant Egreso</label>
                            <input type="number" id="text_cant_egreso" class="form-control form-control-sm"
                                placeholder="Monto incial" disabled>
                        </div>
                        <div class="col-6 col-xs-12">
                            <label for="">Monto Total</label>
                            <input type="text" id="text_monto_total" class="form-control form-control-sm"
                                placeholder="Monto total caja" oninput="Sumar();" disabled>
                        </div>
                        <div class="  col-6 col-xs-12">
                            <label for="">&nbsp;</label><br>
                            <button class="btn btn-success btn-sm " onmousemove="Sumar();" onclick="Sumar();"><i
                                    class="fas fa-plus"></i> Calcular</button>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" id="btncerrar"
                        onclick="Registrar_Cierre_caja(); myFunction();">Cerrar Caja</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->












    <script>
//para el diseño del combo
$(document).ready(function() {
    $('.js-example-basic-single').select2();

    // actualizar automaticamente el campo estado y fecha en formulario - llamamos a la funcion traer datos venta
    // const myInterval = setInterval(Traer_datos_ventas, 1500);
    // const myTimeout = setTimeout(myStopFunction, 2000);


    let timeout;
    Listar_Caja();
});

Traer_datos_ventas();


function myFunction() {
    timeout = setTimeout(Traer_datos_ventas, 2000);
}



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

document.getElementById('text_finicio').value = anio + "-" + mes + "-" + d;
document.getElementById('text_ffin').value = anio + "-" + mes + "-" + d;


    </script>