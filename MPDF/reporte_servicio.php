<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';
require 'numeroletras/CifrasEnLetras.php';
//Incluímos la clase pago
$v=new CifrasEnLetras(); 
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [80, 190]]);
$query = "SELECT
	configuracion.confi_razon_social, 
	configuracion.confi_ruc, 
	configuracion.confi_nombre_representante, 
	configuracion.confi_direccion, 
	configuracion.confi_celular, 
	configuracion.confi_telefono, 
	configuracion.confi_correo, 
	configuracion.config_foto, 
	configuracion.confi_estado, 
	configuracion.confi_url, 
	configuracion.confi_cnta01, 
	servicio.servicio_id, 
	servicio.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	cliente.cliente_celular, 
	recepcion.rece_equipo, 
	recepcion.rece_adelanto, 
	recepcion.rece_debe, 

	recepcion.motivo_id, 
	motivo.motivo_descripcion, 
	recepcion.marca_id, 
	marca.marca_descripcion, 
	servicio.servicio_monto, 
	servicio.servicio_concepto, 
	servicio.servicio_responsable, 
	servicio.servicio_fregistro, 
	servicio.servicio_entrega
FROM
	configuracion,
	servicio
	INNER JOIN
	recepcion
	ON 
		servicio.rece_id = recepcion.rece_id
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id
	INNER JOIN
	motivo
	ON 
		recepcion.motivo_id = motivo.motivo_id
	INNER JOIN
	marca
	ON 
		recepcion.marca_id = marca.marca_id

	where servicio.servicio_id =  '".$_GET['codigo']."'";

	$resultado = $mysqli ->query($query);
while ($row1 = $resultado-> fetch_assoc()){
	$totalpagar=($row1['servicio_monto']);
	//Convertimos el total en letras
	$letra=($v->convertirEurosEnLetras($totalpagar));

	//para ver el logo en la i,presion
	//<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; "><img src="../'.$row1['config_foto'].'" width="45px"></h3><br>
	//<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">R.U.C '.$row1['confi_ruc'].'</h5>
$html.='	
	<h1 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; "><img src="../'.$row1['config_foto'].'" width="150px"></h1><br>
	<h3 style="text-align:center;display: inline-block;margin: 0px;padding: 0px; ">'.$row1['confi_razon_social'].'</h3>
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">'.$row1['confi_direccion'].'</h5>	
	<h5 style="text-align:center;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Cel. '.$row1['confi_celular'].'</h5><br>
	

	Ticket N.:&nbsp; 000'.$row1['servicio_id'].'&nbsp;&nbsp; - &nbsp;&nbsp;'.$row1['servicio_fregistro'].' <br>
	Cliente:&nbsp; '.$row1['cliente_nombres'].'<br>
	Celular:&nbsp; '.$row1['cliente_celular'].'<br>
	<br>
		        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Datos del Servicio<br>
	------------------------------------------------<br>
	
	
	'.$row1['servicio_concepto'].'<br>
	Marca:&nbsp; '.$row1['marca_descripcion'].'<br>
	Servicio:&nbsp;  '.$row1['motivo_descripcion'].' <br>
	Entregado a:&nbsp;  '.$row1['servicio_responsable'].' <br>
	Estado:&nbsp;  <b>'.$row1['servicio_entrega'].' </b><br>

	------------------------------------------------<br>';


	if ($row1['rece_adelanto'] > 0) {
        $html.='
	<h4 style="text-align:right;display: inline-block;margin: 0px;padding: 0px;  font-weight:normal;">Adelanto Q.: '.$row1['rece_adelanto'].'</h4>
	<h4 style="text-align:right;display: inline;margin: 0px;padding: 0px;  font-weight:normal;">Pendiente Q.: '.$row1['rece_debe'].'</h4>
	<h4 style="text-align:right; margin: 0px;padding: 0px; ">Monto Q.: '.$row1['servicio_monto'].'</h4><br>';
	}else{
        	$html.='<h4 style="text-align:right; margin: 0px;padding: 0px; ">Monto Q.: '.$row1['servicio_monto'].'</h4><br>';
        }

$html.='
	<table>
	        <thead>
	        <tr>
            	
            	<td style="text-align:left;font-size:11px"><b>TOTAL:</b> '.strtoupper($letra).'</td>

       </tr>

             <tr>
            	<td style="text-align:center;">
	            <barcode code="'.$row1['confi_cnta01'].'" type="QR" class="barcode" size="0.5" disableborder="1" />
	            </td>
              </tr>
              <tr>
	           	<td style="text-align:center;" ><b>Gracias por su preferencia.!</b></td>  
	          </tr>
	        </thead>
	  </table>
         
         ';









}

$css = file_get_contents('css/style_rece.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();