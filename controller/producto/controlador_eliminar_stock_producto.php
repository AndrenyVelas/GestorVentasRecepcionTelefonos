<?php 

	
	require '../../model/modelo_producto.php';
	$MP = new Modelo_Producto();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
	$cantidad= htmlspecialchars($_POST['cantidad'],ENT_QUOTES,'UTF-8');
	$total= htmlspecialchars($_POST['total'],ENT_QUOTES,'UTF-8');

	$consulta = $MP->Disminuir_Stock($id,$cantidad, $total );//llamamos al modelo
	echo $consulta;

 ?>


<?php 

	require '../../model/modelo_marca.php';
	$MMA = new Modelo_Marca();//instaciamops
	$id= htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');	
	$consulta = $MMA->Eliminar_Marca($id);//llamamos al metodo del modelo
	echo $consulta;

 ?>