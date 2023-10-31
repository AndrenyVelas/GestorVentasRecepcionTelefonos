<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Servicio extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR EL SERVICIO POR FILTRO DE FECHA
 		  **************************************************/
		 public function Listar_Servicio($finicio,$ffin)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_SERVICIO(?,?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$finicio);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$ffin);
			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }



		 /**************************************************
 		    		   REGISTRAR SERVICIO
 		  **************************************************/
		 public function Registrar_Sevicio($idrecepcion,$monto,$concepto,$responsable,$comentario)
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_SERVICIO(?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$idrecepcion);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$monto);
			$query ->bindParam(3,$concepto);
			$query ->bindParam(4,$responsable);
			$query ->bindParam(5,$comentario);


			$resultado = $query ->execute();


			//solo de usa cuando no se retorna un valor en el procedure
			if($resultado){
				return 1;
			}else{
				return 0;
			}

			conexionBD::cerrar_conexion();
		 }





		  /**************************************************
 		    		   ELIMINAR SERVICIO
 		  **************************************************/
		 public function Eliminar_Sevicio($id)
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_ELIMINAR_SERVICIO(?)";
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion


			$resultado = $query ->execute();


			//solo de usa cuando no se retorna un valor en el procedure
			if($resultado){
				return 1;
			}else{
				return 0;
			}

			conexionBD::cerrar_conexion();
		 }
















}


 ?>