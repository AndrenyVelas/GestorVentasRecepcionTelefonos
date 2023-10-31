<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Rol extends conexionBD
	{
		
		
		/**************************************************
				listar Rol
		**************************************************/
		 public function Listar_Rol()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_ROL()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }

		/**************************************************
				REGISTRAR Rol
		**************************************************/
		 public function Registrar_Rol($rol)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_ROL(?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$rol);//enviamos los parametros seguun la posicion del procedure

			$resultado = $query ->execute();
			//cuando en el procedure retorna 1 o 2
			if ($row = $query->fetchColumn()) {
				return $row;
			}
			conexionBD::cerrar_conexion();
		 }

		/**************************************************
				MODIFICAR Rol
		**************************************************/
		 public function Modificar_Rol($id,$rol,$estado)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_MODIFICAR_ROL(?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$rol);
			$query ->bindParam(3,$estado);
			$resultado = $query ->execute();
			//cuando en el procedure retorna 1 o 2 (GUARDAR)
			if ($row = $query->fetchColumn()) {
				return $row;
			}
			//solo de usa cuando no se retorna un valor en el procedure(actualizar)
			//if($resultado){
			//	return 1;
			//}else{
			//	return 0;
			//}
			conexionBD::cerrar_conexion();
		 }

}


 ?>