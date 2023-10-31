<?php 
$mysqli = new mysqli('localhost','root','','dk_store_v2');
if (mysqli_connect_errno()) {
	echo 'Conexion Fallida: ', mysqli_connect_error();
	exit();
	// code...
}





 ?>