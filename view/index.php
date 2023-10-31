<?php 
    session_start();
    if (!isset($_SESSION['S_IDUSUARIO'])) {//si existe
      header('Location: ../index.php');
    }

 ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/logo/logoP.ico" />
    <title>Dk Store</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="../utilitarios/DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../plantilla/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css"
        href="../plantilla/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
    <!--<link rel="stylesheet" type="text/css" href="../utilitarios/select2.min.css"/>-->
</head>

<body class="sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-danger navbar-badge" id="lbl_contador">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <div id="div_cuerpo">

                        </div>



                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer"
                            onclick="cargar_contenido('contenido_principal','recepcion/mantenimiento_recepcion.php')"><b>Equipos
                                por Entregar</b></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        
                        <!-- llamamos el nombre del usuario (sesion ya creada) -->
                        <?php echo $_SESSION['S_USUARIO'] ?>
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" style="font-size:large;"
                            onclick="cargar_contenido('contenido_principal','usuario/mantenimiento_perfil.php')">
                            <i class="fas fa-user-cog mr-2"></i>
                            <span class="text-muted text-sm">Perfil</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="../controller/usuario/destruir_sesion.php" class="dropdown-item"
                            style="font-size:large;">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <span class="text-muted text-sm">Cerrar Sesion</span>
                        </a>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../logo/logo_redondo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Dk Store San Marcos</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class  -->
                        <input type="text" value="<?php echo $_SESSION['S_IDUSUARIO'];  ?>" id="text_Idprincipal" hidden
                            disabled>
                        <input type="text" value="<?php echo $_SESSION['S_ROL'];  ?>" id="text_idrol" hidden disabled>




                        <!-- ROL ADMINISTRADOR  -->
                        <?php 
                if($_SESSION['S_ROL']=='1') {   
              ?>
                        <li class="nav-header" style="text-align:center;">PRINCIPAL</li>
                        <!-- RECEPCION -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas  fa-tags"></i>
                                <p>
                                    Recepcion
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','recepcion/mantenimiento_recepcion.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Recepcion
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','motivo/mantenimiento_motivo.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Motivo</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- SERVICIOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','servicio/mantenimiento_servicio.php')">
                                <i class="fas fa-coins"></i>
                                <p>
                                    Servicios
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- GASTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','gasto/mantenimiento_gasto.php')">
                                <i class="fas fa-coins"></i>
                                <p>
                                    Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>


                        <li class="nav-header" style="text-align:center;">VENTAS</li>
                        <!-- CAJA -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','caja/mantenimiento_caja.php')">
                                <i class="fas fa-cash-register"></i>
                                <p>
                                    Caja
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- VENTAS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','venta/mantenimiento_venta.php')">
                                <i class="fas fa-shopping-cart"></i>
                                <p>
                                    Ventas
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- CLIENTES -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','cliente/mantenimiento_cliente.php')">
                                <i class="fas fa-user-tie"></i>
                                <p>
                                    Clientes
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- PRODUCTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-box-open"></i>
                                <p>
                                    Productos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','producto/mantenimiento_producto.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Producto
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','categoria/mantenimiento_categoria.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categoria</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','marca/mantenimiento_marca.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Marca
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','medida/mantenimiento_medida.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Unidad Medida
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- COTIZACION -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-box-open"></i>
                                <p>
                                    Cotizaciones
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','cotizacion/mantenimiento_cotizacion.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Cotizacion
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','proveedor/mantenimiento_proveedor.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proveedor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','forma_pago/mantenimiento_forma_pago.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo Pago</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-header" style="text-align:center;">MANTENIMIENTO</li>
                        <!-- USUARIOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Usuarios
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','usuario/mantenimiento_usuario.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Usuarios
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','rol/mantenimiento_rol.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- COMPROBANTES -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','comprobante/mantenimiento_comprobante.php')">
                                <i class="fas fa-file-code"></i>
                                <p>
                                    Comprobantes
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- CONFIGURACION -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','configuracion/mantenimiento_configuracion.php')">
                                <i class="fas fa-building"></i>
                                <p>
                                    Configuracion
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- COPIA DE SEGURIDAD -->
                        <li class="nav-item">
                            <a href="../backup-restore/index.php" class="nav-link" target="_blank">
                                <i class="fas fa-database"></i>
                                <p>
                                    Copia de Seguridad
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>

                        <li class="nav-header" style="text-align:center;">REPORTE</li>
                        <!-- REPORTE SERVICIO -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reporteservicio/mantenimiento_reporte_servicio.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Servicio
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- REPORTE GASTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reportegasto/mantenimiento_reporte_gasto.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- REPORTE VENTAS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteventa/mantenimiento_reporte_venta.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Reporte ventas
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteventa/mantenimiento_pivot.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pivot </p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- REPORTE PRODUCTOS UTILIDAD Y KARDEX -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Producto
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_reporte_producto.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Por Producto
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_utilidad.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Producto - utilidad </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_kardex.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kardex </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php 
                 }
             ?>



                        <!-- ROL USUARIO RECEPCIONISTA - SOLO RECEPCIONA Y VENDE  -->
                        <?php 
                if($_SESSION['S_ROL']=='2') {   
              ?>


                        <!-- RECEPCION -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas  fa-tags"></i>
                                <p>
                                    Recepcion
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','recepcion/mantenimiento_recepcion.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Recepcion
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','motivo/mantenimiento_motivo.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Motivo</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- SERVICIOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','servicio/mantenimiento_servicio.php')">
                                <i class="fas fa-coins"></i>
                                <p>
                                    Servicios
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- GASTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','gasto/mantenimiento_gasto.php')">
                                <i class="fas fa-coins"></i>
                                <p>
                                    Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- CAJA -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','caja/mantenimiento_caja.php')">
                                <i class="fas fa-cash-register"></i>
                                <p>
                                    Caja
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>

                        



                        <li class="nav-header" style="text-align:center;">REPORTE</li>
                        <!-- REPORTE SERVICIO -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reporteservicio/mantenimiento_reporte_servicio.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Servicio
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- REPORTE GASTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reportegasto/mantenimiento_reporte_gasto.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>

                        <!-- REPORTE VENTAS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteventa/mantenimiento_reporte_venta.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Reporte ventas
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <!-- REPORTE PRODUCTOS UTILIDAD Y KARDEX -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Producto
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_reporte_producto.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Por Producto
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_utilidad.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Producto - utilidad </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_kardex.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kardex </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php 
                 }
             ?>






                        <!-- ROL VENDEDOR-->
                        <?php 
                if($_SESSION['S_ROL']=='3') {   
              ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','gasto/mantenimiento_gasto.php')">
                                <i class="fas fa-coins"></i>
                                <p>
                                    Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-header" style="text-align:center;">VENTAS</li>
                        <!-- VENTAS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','venta/mantenimiento_venta.php')">
                                <i class="fas fa-shopping-cart"></i>
                                <p>
                                    Ventas
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- CLIENTES -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','cliente/mantenimiento_cliente.php')">
                                <i class="fas fa-user-tie"></i>
                                <p>
                                    Clientes
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- PRODUCTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-box-open"></i>
                                <p>
                                    Productos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','producto/mantenimiento_producto.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Producto
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','categoria/mantenimiento_categoria.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categoria</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','marca/mantenimiento_marca.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Marca
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','medida/mantenimiento_medida.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Unidad Medida
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- COTIZACION -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-box-open"></i>
                                <p>
                                    Cotizaciones
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','cotizacion/mantenimiento_cotizacion.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Cotizacion
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','proveedor/mantenimiento_proveedor.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proveedor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','forma_pago/mantenimiento_forma_pago.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo Pago</p>
                                    </a>
                                </li>

                            </ul>
                        </li>




                        <li class="nav-header" style="text-align:center;">REPORTE</li>
                        <!-- REPORTE SERVICIO -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reporteservicio/mantenimiento_reporte_servicio.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Servicio
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- REPORTE GASTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reportegasto/mantenimiento_reporte_gasto.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- REPORTE VENTAS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteventa/mantenimiento_reporte_venta.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Reporte ventas
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <!-- REPORTE PRODUCTOS UTILIDAD Y KARDEX -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Producto
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_reporte_producto.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Por Producto
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_utilidad.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Producto - utilidad </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_kardex.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kardex </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php 
                 }
             ?>

<?php 
                if($_SESSION['S_ROL']=='4') {   
              ?>
                        <li class="nav-header" style="text-align:center;">PRINCIPAL</li>
                        <!-- RECEPCION -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas  fa-tags"></i>
                                <p>
                                    Recepcion
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','recepcion/mantenimiento_recepcion.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Recepcion
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','motivo/mantenimiento_motivo.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Motivo</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- SERVICIOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','servicio/mantenimiento_servicio.php')">
                                <i class="fas fa-coins"></i>
                                <p>
                                    Servicios
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- GASTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','gasto/mantenimiento_gasto.php')">
                                <i class="fas fa-coins"></i>
                                <p>
                                    Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>


                        <li class="nav-header" style="text-align:center;">VENTAS</li>
                        <!-- CAJA -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','caja/mantenimiento_caja.php')">
                                <i class="fas fa-cash-register"></i>
                                <p>
                                    Caja
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- VENTAS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','venta/mantenimiento_venta.php')">
                                <i class="fas fa-shopping-cart"></i>
                                <p>
                                    Ventas
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- CLIENTES -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','cliente/mantenimiento_cliente.php')">
                                <i class="fas fa-user-tie"></i>
                                <p>
                                    Clientes
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- PRODUCTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-box-open"></i>
                                <p>
                                    Productos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','producto/mantenimiento_producto.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Producto
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','categoria/mantenimiento_categoria.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categoria</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','marca/mantenimiento_marca.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Marca
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','medida/mantenimiento_medida.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Unidad Medida
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- COTIZACION -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-box-open"></i>
                                <p>
                                    Cotizaciones
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','cotizacion/mantenimiento_cotizacion.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Cotizacion
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','proveedor/mantenimiento_proveedor.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proveedor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','forma_pago/mantenimiento_forma_pago.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo Pago</p>
                                    </a>
                                </li>

                            </ul>
                        </li>




                        <li class="nav-header" style="text-align:center;">REPORTE</li>
                        <!-- REPORTE SERVICIO -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reporteservicio/mantenimiento_reporte_servicio.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Servicio
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- REPORTE GASTOS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link"
                                onclick="cargar_contenido('contenido_principal','reportegasto/mantenimiento_reporte_gasto.php')">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Gastos
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <!-- REPORTE VENTAS -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteventa/mantenimiento_reporte_venta.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Reporte ventas
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteventa/mantenimiento_pivot.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pivot </p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- REPORTE PRODUCTOS UTILIDAD Y KARDEX -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt"></i>
                                <p>
                                    Reporte Producto
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_reporte_producto.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Por Producto
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_utilidad.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Producto - utilidad </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        onclick="cargar_contenido('contenido_principal','reporteproducto/mantenimiento_kardex.php')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kardex </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php 
                 }
             ?>

                    </ul>


                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="contenido_principal">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
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
                            <button class="btn btn-info btn-sm" style="width:100%"
                                onclick="Traer_datos_widget_Graficos();"><i class="fas fa-search"></i></button><br><br>

                        </div>
                        <?php 
                if($_SESSION['S_ROL']=='1' || $_SESSION['S_ROL']=='3'|| $_SESSION['S_ROL']=='4') {   
              ?>
                        <div class="col-lg-3 col-6">



                            <div class="small-box bg-info">
                                <div class="inner">
                                    <p
                                        style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                        <b>Ventas:</b>&nbsp; </p>
                                    <h3 style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;"
                                        id="lbl_ventas">&nbsp; 0</h3>

                                    <div>
                                        <p
                                            style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                            <b>Total:</b>&nbsp; </p>
                                        <h3 style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;"
                                            id="lbl_Cant_ventas">&nbsp; 0</h3>
                                    </div>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="#" class="small-box-footer"
                                    onclick="cargar_contenido('contenido_principal','venta/mantenimiento_venta.php')">Ir
                                    a Ventas <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <?php }?>
                    
                    <?php if($_SESSION['S_ROL'] == 1 || $_SESSION['S_ROL'] == 2 || $_SESSION['S_ROL']=='4') {?>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <p
                                        style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                        <b>Servicios:</b>&nbsp; </p>
                                    <h3 style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;"
                                        id="lbl_servicio"> &nbsp;0</h3>

                                    <div>
                                        <p
                                            style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                            <b>Total:</b>&nbsp; </p>
                                        <h3 style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;"
                                            id="lbl_Cant_servicio">&nbsp;0</h3>
                                    </div>
                                </div>
                                <div class="icon">
                    
                                </div>
                                <a href="#" class="small-box-footer"
                                    onclick="cargar_contenido('contenido_principal','servicio/mantenimiento_servicio.php')">Ir
                                    a Servicios<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <p
                                        style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                        <b>Gastos:</b>&nbsp; </p>
                                    <h3 style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;"
                                        id="lbl_gasto">&nbsp;0</h3>

                                    <div>
                                        <p
                                            style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                            <b>Total:</b>&nbsp; </p>
                                        <h3 style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;"
                                            id="lbl_Cant_gasto">&nbsp;0</h3>
                                    </div>
                                </div>
                                <div class="icon">

                                </div>
                                <a href="#" class="small-box-footer"
                                    onclick="cargar_contenido('contenido_principal','gasto/mantenimiento_gasto.php')">Ver
                                    Gastos <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <?php if($_SESSION['S_ROL'] == 1 || $_SESSION['S_ROL'] == 3 || $_SESSION['S_ROL']=='4') {?>
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-danger">
                                <div class="inner">

                                    <p
                                        style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                        <b>Productos:</b>&nbsp; </p>
                                    <h3 style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;"
                                        id="lbl_Cant_producto">&nbsp;0</h3>
                                    <div>
                                        <p
                                            style="font-size:16px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                            &nbsp;</p>
                                        <h3
                                            style="font-size:19px;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">
                                            &nbsp;</h3>
                                    </div>
                                </div>
                                <div class="icon" style="font-size:10px">

                                </div>
                                <a href="#" class="small-box-footer"
                                    onclick="cargar_contenido('contenido_principal','producto/mantenimiento_producto.php')">Ver
                                    Productos<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="col-md-7">

                            <!-- BAR CHART -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Sevicios</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="grafico_servicio"
                                            style="min-height: 250px; height: 400px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>

                        <div class="col-md-5">

                            <!-- DATATABLET -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Producto mas vendidos</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="tabla_productos_mas_vendidos" class="display compact">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Producto</th>
                                                        <th style="text-align: center;">Cantidad</th>
                                                    </tr>
                                                </thead>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body  style="background:#343A40; color:white" -->
                            </div>
                            <!-- /.card -->

                        </div>


                        <div class="col-md-7">

                            <!-- BAR CHART -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Gr&aacute;fico Ventas</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="grafico_ventas"
                                            style="min-height: 250px; height: 400px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>


                        <div class="col-md-5">

                            <!-- DATATABLET -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Productos con poco Stock</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="tabla_productos_sin_stock" class="display compact">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Producto</th>
                                                        <th style="text-align: center;">Stock</th>
                                                    </tr>
                                                </thead>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body  style="background:#343A40; color:white" -->
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                    <!-- 
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>-->
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <a href="#">Dk Store San Marcos</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Dk Store San Marcos</b>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../plantilla/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../plantilla/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="../utilitarios/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../plantilla/plugins/select2/js/select2.full.min.js"></script>
    <script src="../utilitarios/sweetalert.js"></script>
    <script src="../js/usuario.js?rev=<?php echo time();?>"></script>
    <!--<script type="text/javascript" src="../utilitarios/select2.min.js"></script>-->

    <!-- Para los estilos en Excel     -->
    <script src="../utilitarios/buttons.html5.styles.min.js"></script>
    <script src="../utilitarios/buttons.html5.styles.templates.min.js"></script>
    <script src="../utilitarios/sum().js"></script>
    <script src="../plantilla/dist/js/adminlte.min.js"></script>

    <script>
    /**********************************************************************
          PRA COLOCAR FECHA DE HOY EN LOS CAMPOS 
 ***********************************************************************/
    $(document).ready(function() {
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
        //Traer_datos_widget();
        //Grafico_servicio();
        cargar_Notificaiones_Recepcion();

    });



    function cargar_contenido(id, vista) {
        $("#" + id).load(vista);
    }


    /**********************************************************************
              LLAMAMOS A LAS DOS FUNCIONES WIDGET Y GRAFICO 
     ***********************************************************************/
    function Traer_datos_widget_Graficos() {
        Traer_datos_widget();
        Grafico_servicio();
        Grafico_ventas();
        Listar_Productos_Vendidos();
        Listar_Productos_Sin_Stock();
    }



    /**********************************************************************
                 GRAFICO DE SERVICIO
     ***********************************************************************/
    function Grafico_servicio() {
        var finicio = document.getElementById('text_finicio').value;
        var ffin = document.getElementById('text_ffin').value;

        if (finicio.length == 0 || ffin.length == 0) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione una Fecha de inicio y de fin", "warning");
        }

        if (finicio > ffin) {
            return Swal.fire("Mensaje de Advertencia", "La fecha de inicio no puede ser mayor a la fecha fin",
                "warning");
        }

        $.ajax({
            url: '../controller/recepcion/controlador_traer_grafico_servicio.php',
            type: 'POST',
            data: {
                //enviamos la fechas seleccionas desde el dashboard
                finicio: finicio,
                ffin: ffin
            }
        }).done(function(resp) {
            let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA

            if (data.length > 0) {
                let tiposervicio = new Array();
                let cantidad = new Array();
                let color = new Array();

                for (let i = 0; i < data.length; i++) {

                    cantidad.push(data[i][0]);
                    tiposervicio.push(data[i][1]);
                    color.push(colorRGB());

                }
                const ctx = document.getElementById('grafico_servicio').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: tiposervicio,
                        datasets: [{
                            label: 'SERVICIOS',
                            data: cantidad,
                            backgroundColor: color,
                            borderColor: color,
                            borderWidth: 1
                        }]
                    },

                    options: {

                        scales: {
                            xAxes: [{
                                stacked: true
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });


            } else {

                const ctx = document.getElementById('grafico_servicio').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['SIN RESULTADOS'],
                        datasets: [{
                            label: 'SERVICIOS',
                            data: [0]
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: {
                                stacked: true
                            },
                            yAxes: {
                                stacked: true
                            }
                        }
                    }
                });


            }
        })

    }





    /**********************************************************************
                 GRAFICO DE VENTAS
     ***********************************************************************/
    function Grafico_ventas() {
        var finicio = document.getElementById('text_finicio').value;
        var ffin = document.getElementById('text_ffin').value;

        if (finicio.length == 0 || ffin.length == 0) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione una Fecha de inicio y de fin", "warning");
        }

        if (finicio > ffin) {
            return Swal.fire("Mensaje de Advertencia", "La fecha de inicio no puede ser mayor a la fecha fin",
                "warning");
        }

        $.ajax({
            url: '../controller/recepcion/controlador_traer_grafico_ventas.php',
            type: 'POST',
            data: {
                //enviamos la fechas seleccionas desde el dashboard
                finicio: finicio,
                ffin: ffin
            }
        }).done(function(resp) {
            let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA

            if (data.length > 0) {
                let tiposervicio = new Array();
                let cantidad = new Array();
                let color = new Array();

                for (let i = 0; i < data.length; i++) {

                    cantidad.push(data[i][0]);
                    tiposervicio.push(data[i][1]);
                    color.push(colorRGB());

                }
                const ctx = document.getElementById('grafico_ventas').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: tiposervicio,
                        datasets: [{
                            label: 'VENTAS',
                            data: cantidad,
                            backgroundColor: color,
                            borderColor: color,
                            borderWidth: 1
                        }]
                    },

                    options: {

                        scales: {
                            xAxes: [{
                                stacked: true
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });


            } else {

                const ctx = document.getElementById('grafico_ventas').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['SIN RESULTADOS'],
                        datasets: [{
                            label: 'SERVICIOS',
                            data: [0]
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: {
                                stacked: true
                            },
                            yAxes: {
                                stacked: true
                            }
                        }
                    }
                });


            }
        })

    }





    /**********************************************************************
                CREAR COLORES RGB ALEATORIOS
     ************************************************************************/
    function generarNumero(numero) {
        return (Math.random() * numero).toFixed(0);
    }

    function colorRGB() {
        var coolor = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
        return "rgb" + coolor;
    }







    /**********************************************************************
              TRAER DATOS PARA LA NOTIFICACION
 ***********************************************************************/
    function cargar_Notificaiones_Recepcion() {
        $.ajax({
            url: '../controller/usuario/controlador_traer_notificaciones_rece.php',
            type: 'POST'
        }).done(function(resp) {
            let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA
            document.getElementById('lbl_contador').innerHTML = data
            .length; //cuantas recepciones tengo pendientes
            let llenardata = "";
            if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                    llenardata += '<a href="#" class="dropdown-item">' +
                        '<div class="media">' +
                        '<div class="media-body">' +
                        '<h4 class="dropdown-item-title">' +
                        '<b>Cliente: </b>' + data[i][0] + '' +
                        '<span class="float-right text-sm text-warning"><i class="fas fa-folder-minus"></i></i></span>' +
                        '</h4>' +
                        '<p class="text-sm">Estado: ' + data[i][1] + ' | ' + data[i][3] + '</p>' +

                        '<p class="text-sm text-muted"><i class="fas fa-calendar-alt"></i> Fecha: ' + data[i][
                        2] + ' </p>' +
                        ' </div>' +
                        '</div>' +

                        '</a>' +
                        '<div class="dropdown-divider"></div>';
                }
                document.getElementById('div_cuerpo').innerHTML = llenardata;

            } else {
                llenardata += "<option value=''>No se encontraron datos</option>";
                document.getElementById('div_cuerpo').innerHTML = llenardata;
                //  document.getElementById('select_rol_editar').innerHTML = llenardata;

            }
        })
    }






    /**********************************************************************
              TRAER DATOS PARA LOS WIDGET
 ***********************************************************************/
    function Traer_datos_widget() {

        var finicio = document.getElementById('text_finicio').value;
        var ffin = document.getElementById('text_ffin').value;

        if (finicio.length == 0 || ffin.length == 0) {
            return Swal.fire("Mensaje de Advertencia", "Seleccione una Fecha de inicio y de fin", "warning");
        }

        if (finicio > ffin) {
            return Swal.fire("Mensaje de Advertencia", "La fecha de inicio no puede ser mayor a la fecha fin",
                "warning");
        }

        $.ajax({
            url: '../controller/recepcion/controlador_traer_widget.php',
            type: 'POST',
            data: {
                finicio: finicio,
                ffin: ffin
            }
        }).done(function(resp) {
            //alert(resp);
            let data = JSON.parse(resp); //POSICION DE LA FILA Y COLUMNA

            if (data.length > 0) {
                document.getElementById('lbl_ventas').innerHTML = data[0][0];
                document.getElementById('lbl_Cant_ventas').innerHTML = data[0][1];
                document.getElementById('lbl_servicio').innerHTML = data[0][2];
                document.getElementById('lbl_Cant_servicio').innerHTML = data[0][3];
                document.getElementById('lbl_gasto').innerHTML = data[0][4];
                document.getElementById('lbl_Cant_gasto').innerHTML = data[0][5];
                document.getElementById('lbl_Cant_producto').innerHTML = data[0][6];

            }
        })
    }





    /********************************************************************
                        PRODUCTOS MAS VENDIDOS 
     ********************************************************************/

    var tbl_pro_vendidos;
    //listar  con metodo normal
    function Listar_Productos_Vendidos() { //enviarlo al scrip en MANTENIMIENTO ROL
        tbl_pro_vendidos = $("#tabla_productos_mas_vendidos").DataTable({
            "responsive": true,
            "ordering": false,
            "bLengthChange": true,
            "searching": {
                "regex": false
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "pageLength": 10,
            "destroy": true,
            "async": false,
            "processing": true,
            "ajax": {
                "url": "../controller/producto/controlador_productos_mas_vendidos.php",
                type: 'POST'
            },
            "dom": 'rt',
            "columns": [
                //todos los datos del procedimiento almacenado
                // {"defaultContent": ""},//cintador 
                {
                    "data": "Producto"
                },
                {
                    "data": "cantidad",
                    render: function(data, type, row) {
                        if (data > 0) {
                            return "<center>" + '<span class=" ">' + data + '</span>'; + "</center>"
                        } else {
                            return "<center>" + '<span class="">' + data + '</span>'; + "</center>"
                        }

                    }
                },


            ],
            "language": idioma_espanol,
            select: true
        });

    }




    /********************************************************************
                        PRODUCTOS SIN STOCK  
     ********************************************************************/

    var tbl_pro_sinstock;
    //listar  con metodo normal
    function Listar_Productos_Sin_Stock() { //enviarlo al scrip en MANTENIMIENTO ROL
        tbl_pro_sinstock = $("#tabla_productos_sin_stock").DataTable({
            "responsive": true,
            "ordering": false,
            "bLengthChange": true,
            "searching": {
                "regex": false
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "pageLength": 10,
            "destroy": true,
            "async": false,
            "processing": true,
            "ajax": {
                "url": "../controller/producto/controlador_productos_sin_stock.php",
                type: 'POST'
            },
            "dom": 'rt',
            "columns": [
                //todos los datos del procedimiento almacenado
                // {"defaultContent": ""},//cintador 
                {
                    "data": "Producto"
                },
                {
                    "data": "stock",
                    render: function(data, type, row) {
                        if (data < 3) {
                            return "<center>" + '<span class="badge badge-danger ">' + data +
                            '</span>'; + "</center>"
                        } else {
                            return "<center>" + '<span class="">' + data + '</span>'; + "</center>"
                        }

                    }
                },


            ],
            "language": idioma_espanol,
            select: true
        });

    }







    var idioma_espanol = {
        select: {
            rows: "%d fila seleccionada"
        },
        "sProcessing": "Procesando...",
        "sLengthMenu": "Ver _MENU_ ",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "No hay informacion en esta tabla",
        "sInfo": "Mostrando (_START_ a _END_) total de _TOTAL_ registros",
        "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
        "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
        "SInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "<b>No se encontraron datos</b>",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Ultimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "aria": {
            "sSortAscending": ": ordenar de manera Ascendente",
            "SSortDescending": ": ordenar de manera Descendente ",
        }
    }





    /********************************************************************
                   FUNCION SOLO NUMEROS
     ********************************************************************/
    function soloNumeros(e) {
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla == 8) {
            return true;
        }

        // Patron de entrada, en este caso solo acepta numeros
        patron = /[0-9]/;
        //patron = /^\d{0,8}(\.\d{1,2})?$/
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }





    /********************************************************************
                   FUNCION SOLO LETRAS
     ********************************************************************/
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


    $(function() {
        var menues = $(".nav-link");
        menues.click(function() {
            menues.removeClass("active");
            $(this).addClass("active");
        });

    });
    </script>
</body>

</html>