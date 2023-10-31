<?php 

	require '../../model/modelo_servicio.php';
	$MSE = new Modelo_Servicio();//instaciamopsç

	$idrecepcion= htmlspecialchars($_POST['idrecepcion'],ENT_QUOTES,'UTF-8');
	$monto= htmlspecialchars($_POST['monto'],ENT_QUOTES,'UTF-8');
	$concepto= htmlspecialchars($_POST['concepto'],ENT_QUOTES,'UTF-8');
	$responsable= htmlspecialchars($_POST['responsable'],ENT_QUOTES,'UTF-8');
	$comentario= htmlspecialchars($_POST['comentario'],ENT_QUOTES,'UTF-8');



	$consulta = $MSE->Registrar_Sevicio($idrecepcion,$monto,$concepto,$responsable,$comentario);//llamamos al metodo del modelo
	echo $consulta;

 ?>