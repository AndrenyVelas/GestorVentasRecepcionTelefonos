<?php 
	require 'serverside.php';
	//llamamos al getobtener del serverside
	$table_data->getObtnerListadoRecepcion('view_listar_recepcion','rece_id',array('rece_id','cliente_id','cliente_nombres','motivo','rece_caracteristicas','motivo_id','motivo_descripcion','rece_monto','rece_fregistro','rece_estado','rece_estatus','rece_equipo','rece_concepto','rece_adelanto','rece_debe','rece_accesorios','rece_fentrega','marca_id','marca_descripcion'));

	
 ?>