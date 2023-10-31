    <!-- Content Header (Page header) -->

    <script src="../js/producto.js?rev=<?php echo time();?>"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="col-lg-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Listado de Productos</b></h3>
                <button class="btn btn-info btn-sm float-right" onclick="AbrirModalRegistroProducto();"><i
                        class="fas fa-plus"></i> Nuevo</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table id="tabla_producto" class="display compact" style="width: 100%">
                            <thead style="background:#343A40; color:white">
                                <tr>
                                    <th>#</th>
                                    <th style="width: 8%">C. Barra</th>
                                    <th>Descripcion</th>
                                    <th>Marca</th>
                                    <th>Unidad</th>
                                    <th>Stock</th>
                                    <th>Precio Sin Garantia</th>
                                    <th>Precio Con Garantia</th>
                                    <th>Foto</th>
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
    <div class="modal fade" id="modal_registro_producto" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 ">
                            <label for="text_num_compro">Nombre</label>
                            <input type="text" name="text_producto" class="form-control form-control-sm"
                                id="text_producto" placeholder="Nombre de producto">
                        </div>
                        <div class="col-lg-6 col-sm-6 ">
                            <label for="text_num_compro">Codigo General</label>
                            <input type="text" name="text_codigo_g" class="form-control form-control-sm"
                                id="text_codigo_g" placeholder="Codigo General">
                        </div>
                        <div class="col-lg-6 col-sm-6">

                            <label for="">Proveedor</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_proveedor"
                                style="width: 100%"> </select>
                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <label form="">Marca</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_marca"
                                style="width: 100%"> </select>
                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <label form="">Categoria</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_categoria"
                                style="width: 100%"> </select>
                        </div>

                        <div class="col-6 ">
                            <label for="">Stock</label>
                            <input type="number" name="text_stock" class="form-control form-control-sm" id="text_stock"
                                placeholder="Stock">
                        </div>
                        <div class="col-lg-6 col-sm-6">

                            <label form="">Unidad M</label>
                            <select class="form-control form-control-sm js-example-basic-single" id="select_unidadm"
                                style="width: 100%"> </select>
                        </div>

                        <div class="col-6 col-sm-6 ">
                            <label for="">Precio Sin Garantia</label>
                            <input type="number" name="text_pcompra" class="form-control form-control-sm"
                                id="text_pcompra" placeholder="Precio Compra">
                        </div>
                        <div class="col-6 col-sm-6 ">
                            <label for="">Precio Con Garantia</label>
                            <input type="number" name="text_pventa" class="form-control form-control-sm"
                                id="text_pventa" placeholder="Precio Venta" onmousemove="PVenta();">
                        </div>
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault" oninput="PVenta();">
                            Garantia
                            </label>
                        </div> -->
                        <div class="col-12">
                            <label for="">Foto</label></br>
                            <input type="file" id="text_foto">
                        </div>


                    </div>
                    <br>
                    <hr>
                    <h5 style="text-align:center;">Subir datos desde excel</h5>
                    <br>
                    <div class="row">

                        <div class="col-12  ">

                            <input type="file" id="text_archivo" class="form-control-sm"> <br>
                            <br>
                        </div>



                        <div class="col-12  ">

                            <button type="button" onclick="cargar_excel();"
                                class="btn btn-success btn-sm">Importar</button>
                        </div>

                        <div class="col-12">
                            <a href="../EXCEL/plantilla.xlsx">Descargar Plantilla</a>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnRegistrarPro">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- fin Modal -->

    <!-- Modal Editar  -->
    <div class="modal fade" id="modal_editar_producto" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Producto </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-9 ">
                            <input type="text" id="idproducto" hidden="">
                            <label for="text_num_compro">Nombre</label>
                            <input type="text" name="text_producto_editar" class="form-control form-control-sm"
                                id="text_producto_editar" placeholder="Nombre de producto">
                        </div>
                        <div class="col-3 ">
                            <input type="text" id="idproducto" hidden="">
                            <label for="text_num_compro">Codigo I.</label>
                            <input type="text" name="text_codigo_editar" class="form-control form-control-sm"
                                id="text_codigo_editar" placeholder="Codigo" disabled>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <input type="text" id="idproducto" hidden="">
                            <label for="text_num_compro">Codigo General</label>
                            <input type="text" name="text_codigo_g_editar" class="form-control form-control-sm"
                                id="text_codigo_g_editar" placeholder="Codigo">
                        </div>
                        <div class="col-lg-6 col-sm-6">

                            <label for="">Proveedor</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_proveedor_editarr" style="width: 100%"> </select>
                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <label form="">Marca</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_marca_editar" style="width: 100%"> </select>
                        </div>

                        <div class="col-lg-6 col-sm-6">

                            <label form="">Categoria</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_categoria_editar" style="width: 100%"> </select>
                        </div>
                        <div class="col-6 ">
                            <label for="text_num_compro">Stock</label>
                            <input type="number" name="text_stock_editar" class="form-control form-control-sm"
                                id="text_stock_editar" placeholder="Stock" disabled>
                        </div>
                        <div class="col-lg-6 col-sm-6">

                            <label form="">Unidad M</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_unidadm_editar" style="width: 100%"> </select>
                        </div>

                        <div class="col-6 col-sm-6 ">
                            <label for="text_num_compro">Precio Sin Garantia</label>
                            <input type="number" name="text_pcompra_editar" class="form-control form-control-sm"
                                id="text_pcompra_editar" placeholder="Precio Compra">
                        </div>

                        <div class="col-6 col-sm-6 ">
                            <label for="text_num_compro">Precio Con Garantia</label>
                            <input type="number" name="text_pventa_editar" class="form-control form-control-sm"
                                id="text_pventa_editar" placeholder="Precio Venta">
                        </div>
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul">
                            <label class="form-check-label" for="flexCheckDefault" oninput="EditPre();">
                            Garantia
                            </label>
                        </div> -->
                        <div class="col-12 ">

                            <label form="">Estado</label>
                            <select class="form-control form-control-sm js-example-basic-single"
                                id="select_estado_producto_editar" style="width: 100%">
                                <option value="ACTIVO">ACTIVO</option>
                                <!--iniciar el select 2 en el script -->
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>




                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="ModificarProducto();">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->


    <!-- Modal AUMENTAR STOCK  -->
    <div class="modal fade" id="modal_aumentar_stock" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Aumentar Stock Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="input-group input-group-sm mb-3 col-10">
                            <div class="input-group-prepend">
                                <input type="text" id="idproducto" hidden="">
                                <span class="input-group-text">Nombre </span>
                            </div>
                            <input type="text" id="text_producto_editar_2" class="form-control form-control-sm"
                                placeholder="Nombre de producto" disabled>
                        </div>
                        <div class="input-group input-group-sm mb-3 col-2">
                            <div class="input-group-prepend">

                            </div>
                            <input type="text" id="text_codigo_editar_2" class="form-control form-control-sm"
                                placeholder="Codigo" disabled>
                        </div>
                        <div class="input-group input-group-sm mb-3 col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Stock</span>
                            </div>
                            <input type="text" id="text_stock_editar_2" class="form-control form-control-sm"
                                oninput="calcular();" placeholder="Stock" disabled>
                        </div>
                        <div class="input-group input-group-sm mb-3 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+</span>
                            </div>
                            <input type="number" id="text_stock_aumentar" class="form-control form-control-sm"
                                oninput="calcular();" placeholder="Aumentar" onkeypress="return soloNumeros(event)">
                        </div>
                        <div class="input-group input-group-sm mb-3 col-2">
                            <div class="input-group-prepend">

                            </div>
                            <input type="text" id="text_stock_suma" class="form-control form-control-sm"
                                oninput="calcular();" placeholder="Total" disabled>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="SumarStock();">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->

      <!-- Modal DISMINUIR STOCK  -->
      <div class="modal fade" id="modal_disminuir_stock" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Salida directa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="input-group input-group-sm mb-3 col-10">
                            <div class="input-group-prepend">
                                <input type="hidden" id="idproducto_dis" >
                                <span class="input-group-text">Nombre </span>
                            </div>
                            <input type="text" id="text_producto_editar_2_dis" class="form-control form-control-sm"
                                placeholder="Nombre de producto" disabled>
                        </div>
                        <div class="input-group input-group-sm mb-3 col-2">
                            <div class="input-group-prepend">

                            </div>
                            <input type="text" id="text_codigo_editar_2_dis" class="form-control form-control-sm"
                                placeholder="Codigo" disabled>
                        </div>
                        <div class="input-group input-group-sm mb-3 col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Stock</span>
                            </div>
                            <input type="text" id="text_stock_editar_2_dis" class="form-control form-control-sm"
                                oninput="calcularResta();" placeholder="Stock" disabled>
                        </div>
                        <div class="input-group input-group-sm mb-3 col-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+</span>
                            </div>
                            <input type="number" id="text_stock_disminuir_dis" class="form-control form-control-sm"
                                oninput="calcularResta();" placeholder="Disminuir" onkeypress="return soloNumeros(event)">
                        </div>
                        <div class="input-group input-group-sm mb-3 col-2">
                            <div class="input-group-prepend">

                            </div>
                            <input type="text" id="text_stock_resta" class="form-control form-control-sm"
                                oninput="calcularResta();" placeholder="Total" disabled>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="DisminuirStock();">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->


    <!-- Modal Editar FOTO -->
    <div class="modal fade" id="modal_editar_foto" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#343A40; color:white">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Foto del producto: <label for=""
                            id="lbl_producto"></label></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">
                            <input type="text" id="idproducto_foto" hidden="">
                            <input type="text" id="fotoactual" hidden="">
                            <input type="text" id="cod_barra" hidden="">
                            <input type="file" id="text_foto_editar">
                        </div>

                    </div>
                    <br>

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Foto Actual</label>
                                <div class="card">
                                    <div class="card-body">


                                    </div>

                                    <img class="" id="img-preview">

                                </div>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="ModificarFotoEmpresa();">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- fin Modal -->

    <script>
//para el diseño del combo
$(document).ready(function() {
    $('.js-example-basic-single').select2();

});
//  rolA = document.getElementById('text_idrol').value; //CAPTURAMOS EL ROL PARA DAR EL ACCESO
//  console.log(rolA);

Listar_Producto();
cargar_SelectCategoria();
cargar_SelectMarca();
cargar_Select_Proveedor();
cargar_Select_Unidad();


//validar que solo seleccione un archivo excel 
document.getElementById("text_archivo").addEventListener("change", () => {
    var fileName = document.getElementById("text_archivo").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).
    toLowerCase();
    if (extFile == "xlsm" || extFile == "xls" || extFile == "xlsx") {
        //TO DO 
    } else {
        Swal.fire("MENSAJE DE ADVERTENCIA",
            "SOLO SE ACEPTAN ARCHIVOS EXCEL - USTED SUBIO UN ARCHIVO CON EXTESION " + extFile, "warning");
        document.getElementById("text_archivo").value = "";
    }
});


//validar que solo seleccione foto (Registrar foto)
document.getElementById("text_foto").addEventListener("change", () => {
    var fileName = document.getElementById("text_foto").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).
    toLowerCase();
    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
        //TO DO 
    } else {
        Swal.fire("MENSAJE DE ADVERTENCIA", "SOLO SE ACEPTAN IMAGENES - USTED SUBIO UN ARCHIVO CON EXTESION " +
            extFile, "warning");
        document.getElementById("text_foto").value = "";
    }
});

/**************************************************
  IMPORTAR DESDE EXCEL
****************************************************/
function cargar_excel() {
    let archivo = document.getElementById("text_archivo").value;
    if (archivo.length == 0) {
        return Swal.fire("Mensaje de Advertencia", "Selecciones un Archivo", "warning");
    }

    let formData = new FormData();
    let excel = $("#text_archivo")[0].files[0];
    formData.append('excel', excel);
    $.ajax({
        url: '../EXCEL/excel_import.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(resp) {
            Swal.fire("Mensaje de Confirmacion", "Importacion de Productos Exitosa", "success")
            document.getElementById('text_archivo').value = "";


        }

    });
    return false;

}

$("#btnRegistrarPro").on('click', function() {
    RegistrarProducto();
})
    </script>