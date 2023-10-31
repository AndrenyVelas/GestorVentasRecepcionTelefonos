<?php 

	require '../../model/modelo_venta.php';
	$MV = new Modelo_Venta();//instaciamopsç

	$idcliente= htmlspecialchars($_POST['idcliente'],ENT_QUOTES,'UTF-8');
	$compro= htmlspecialchars($_POST['compro'],ENT_QUOTES,'UTF-8');
	$serie= htmlspecialchars($_POST['serie'],ENT_QUOTES,'UTF-8');
	$numero= htmlspecialchars($_POST['numero'],ENT_QUOTES,'UTF-8');
	$impuesto= htmlspecialchars($_POST['impuesto'],ENT_QUOTES,'UTF-8');
	$total= htmlspecialchars($_POST['total'],ENT_QUOTES,'UTF-8');
	$tipo= htmlspecialchars($_POST['tipo'],ENT_QUOTES,'UTF-8');
	$porcentaje= htmlspecialchars($_POST['porcentaje'],ENT_QUOTES,'UTF-8');
	$idusuario= htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
	$idformapago= htmlspecialchars($_POST['idformapago'],ENT_QUOTES,'UTF-8');
	$observacion= htmlspecialchars($_POST['observacion'],ENT_QUOTES,'UTF-8');

	$consulta = $MV->Registrar_Venta($idcliente,$compro,$serie,$numero,$impuesto,$total,$tipo,$porcentaje,$idusuario, $idformapago, $observacion);//llamamos al metodo del modelo
	echo $consulta;

 ?>