<?php 

	require '../../model/modelo_empresa.php';
	
	
	$MEMP = new Modelo_Empresa();//instaciamops

	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$razon= htmlspecialchars($_POST['razon'],ENT_QUOTES,'UTF-8');
	$ruc= htmlspecialchars($_POST['ruc'],ENT_QUOTES,'UTF-8');
	$repre= htmlspecialchars($_POST['repre'],ENT_QUOTES,'UTF-8');
	$direccion= htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
	$celular= htmlspecialchars($_POST['celular'],ENT_QUOTES,'UTF-8');
	$telefono= htmlspecialchars($_POST['telefono'],ENT_QUOTES,'UTF-8');
	$correo= htmlspecialchars($_POST['correo'],ENT_QUOTES,'UTF-8');	
	$estado= htmlspecialchars($_POST['estado'],ENT_QUOTES,'UTF-8');	
	$url= htmlspecialchars($_POST['url'],ENT_QUOTES,'UTF-8');
	$cuenta01= htmlspecialchars($_POST['cuenta01'],ENT_QUOTES,'UTF-8');
	$nro_cuenta01= htmlspecialchars($_POST['nro_cuenta01'],ENT_QUOTES,'UTF-8');
	$cuenta02= htmlspecialchars($_POST['cuenta02'],ENT_QUOTES,'UTF-8');
	$nro_cuenta02= htmlspecialchars($_POST['nro_cuenta02'],ENT_QUOTES,'UTF-8');


	$consulta = $MEMP->Modificar_Empresa($id,$razon,$ruc,$repre,$direccion,$celular,$telefono,$correo,$estado,$url,$cuenta01,$nro_cuenta01,$cuenta02,$nro_cuenta02  );//llamamos al modelo
	echo $consulta;
	

 ?>