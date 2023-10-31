<?php 

	require '../../model/modelo_buscar_equipo.php';
	$MBEQ = new Modelo_Buscar_Equipo();//instaciamopsç

	$nit= htmlspecialchars($_POST['nit'],ENT_QUOTES,'UTF-8');

	$consulta = $MBEQ->Listar_Equipo_nit($nit);//llamamos al modelo
	if ($consulta) {
		echo json_encode($consulta);
	}else{
		echo '{
			"sEcho" : 1,
			"iTotalRecords":"0",
			"iTotalDisplayRecords": "0",
			"aaData": []

		}';
	}


 ?>