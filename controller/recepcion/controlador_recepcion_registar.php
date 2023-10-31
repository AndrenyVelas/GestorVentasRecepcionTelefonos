<?php 

	require '../../model/modelo_recepcion.php';
	$MREC = new Modelo_Recepcion();//instaciamops.

	$equipo= htmlspecialchars($_POST['equipo'],ENT_QUOTES,'UTF-8');
	$caracteristicas= htmlspecialchars($_POST['caracteristicas'],ENT_QUOTES,'UTF-8');
	$concepto= htmlspecialchars($_POST['concepto'],ENT_QUOTES,'UTF-8');
	$monto= htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');
	$cliente= htmlspecialchars($_POST['cliente'],ENT_QUOTES,'UTF-8');
	$motivo= htmlspecialchars($_POST['motivo'],ENT_QUOTES,'UTF-8');
	$adelanto= htmlspecialchars($_POST['adelanto'],ENT_QUOTES,'UTF-8');
	$debe= htmlspecialchars($_POST['debe'],ENT_QUOTES,'UTF-8');

	$accesorios= htmlspecialchars($_POST['accesorios'],ENT_QUOTES,'UTF-8');
	$fentrega= htmlspecialchars($_POST['fentrega'],ENT_QUOTES,'UTF-8');
	$marca= htmlspecialchars($_POST['marca'],ENT_QUOTES,'UTF-8');


	$consulta = $MREC->Registrar_Recepcion($equipo,$caracteristicas,$concepto,$monto,$cliente,$motivo,$adelanto,$debe,$accesorios,$fentrega,$marca);//llamamos al metodo del modelo
	echo $consulta;

 ?>