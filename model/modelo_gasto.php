<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Gasto extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR GASTO
 		  **************************************************/
		 public function Listar_Gasto()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_GASTO()";
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
 		       REGISTRAR GASTO
 		  **************************************************/
		 public function Registrar_Gasto($gasto,$monto,$responsable)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_GASTOS(?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$gasto);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$monto);
			$query ->bindParam(3,$responsable);
			$resultado = $query ->execute();
			//solo de usa cuando no se retorna un valor en el procedure(actualizar)
			if($resultado){
				return 1;
			}else{
				return 0;
			}
			conexionBD::cerrar_conexion();
		 }



		  /**************************************************
 		       MODIFICAR GASTO
 		  **************************************************/
		 //modificar Rol
		 public function Modificar_Gasto($id,$gasto,$monto,$responsable,$estado)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_MODIFICAR_GASTOS(?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$gasto);
			$query ->bindParam(3,$monto);
			$query ->bindParam(4,$responsable);
			$query ->bindParam(5,$estado);
			$resultado = $query ->execute();
			//cuando en el procedure retorna 1 o 2 (GUARDAR)
			if ($row = $query->fetchColumn()) {
				return $row;
			}

			conexionBD::cerrar_conexion();
		 }






}


 ?>













