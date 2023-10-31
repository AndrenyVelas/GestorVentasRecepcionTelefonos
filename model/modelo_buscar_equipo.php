<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Buscar_Equipo extends conexionBD
	{




		 /**************************************************
 		      BUSCAR EQUIPO POR NIT
 		  **************************************************/
		 public function Listar_Equipo_nit($nit)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_BUSCAR_EQUIPO_NIT(?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$nit);//enviamos los parametros seguun la posicion

			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }






















}


 ?>