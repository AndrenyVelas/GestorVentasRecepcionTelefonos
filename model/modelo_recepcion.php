<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Recepcion extends conexionBD
	{


		 /**************************************************
 		      LISTAR CLIENTE EN COMBO
 		  **************************************************/
		 public function Listar_select_Cliente()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_CLIENTE()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			$query ->execute();
			$resultado = $query->fetchAll();
			foreach ($resultado as $resp) {
			        $arreglo[]=$resp;//almacenando los datos del arreglo
			

			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }






		
		  /**************************************************
 		      LISTAR MOTIVO EN COMBO
 		  **************************************************/
		 public function Listar_select_Motivo()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_MOTIVO()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			$query ->execute();
			$resultado = $query->fetchAll();
			foreach ($resultado as $resp) {
			        $arreglo[]=$resp;//almacenando los datos del arreglo
			

			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }






		 /**************************************************
 		       LISTAR ROLES EN COMBO
 		 **************************************************/
		 public function Listar_Notificaiones()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_NOTIFICACION()";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			//$query ->bindParam(1,$usuario);//enviamos los parametros seguun la posicion
			$query ->execute();
			$resultado = $query->fetchAll();
			foreach ($resultado as $resp) {
			        $arreglo[]=$resp;//almacenando los datos del arreglo
			

			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }




		 /**************************************************
 		       LISTAR WIDGET EN DASHBOARD
 		  **************************************************/
		 public function Listar_widget($finicio,$ffin)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_LISTAR_DATOS_WIDGET(?,?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$finicio);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$ffin);
			$query ->execute();
			$resultado = $query->fetchAll();
			foreach ($resultado as $resp) {
			        $arreglo[]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }





		 /**************************************************
 		       LISTAR GRAFICO SERVICIO
 		  **************************************************/
		 public function Listar_Grafico_servico($finicio,$ffin)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_GRAFICO_SERVICIO(?,?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$finicio);//enviamos los parametros seguun la posicion
			$query ->bindParam(2,$ffin);
			$query ->execute();
			$resultado = $query->fetchAll();
			foreach ($resultado as $resp) {
			        $arreglo[]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }

		 
		 /**************************************************
 		       LISTAR GRAFICO VENTAS
 		  **************************************************/
		   public function Listar_Grafico_ventas($finicio,$ffin)
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_GRAFICO_VENTAS(?,?)";
			  $arreglo = array();
			  $query = $c->prepare($sql);//mandamos el precedure
			  $query ->bindParam(1,$finicio);//enviamos los parametros seguun la posicion
			  $query ->bindParam(2,$ffin);
			  $query ->execute();
			  $resultado = $query->fetchAll();
			  foreach ($resultado as $resp) {
					  $arreglo[]=$resp;//almacenando los datos del arreglo
			  }
			  return $arreglo;
			  conexionBD::cerrar_conexion();
		   }
  








		  /**************************************************
 		       REGISTRAR EL MOTIVO
 		  **************************************************/
		 public function Registrar_Recepcion($equipo,$caracteristicas,$concepto,$monto,$cliente,$motivo,$adelanto,$debe,$accesorios,$fentrega,$marca)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_REGISTRAR_RECEPCION(?,?,?,?,?,?,?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$equipo);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$caracteristicas);
			$query ->bindParam(3,$concepto);
			$query ->bindParam(4,$monto);
			$query ->bindParam(5,$cliente);
			$query ->bindParam(6,$motivo);
			$query ->bindParam(7,$adelanto);
			$query ->bindParam(8,$debe);
			$query ->bindParam(9,$accesorios);
			$query ->bindParam(10,$fentrega);
			$query ->bindParam(11,$marca);


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
 		       MODIFICAR EL MOTIVO
 		  **************************************************/
		 public function Modificar_Recepcion($id,$cliente,$equipo,$caracteristicas,$motivo,$concepto,$monto,$estado,$adelanto,$debe,$accesorios,$fentrega,$marca,$recoger)//viene del controlador
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_MODIFICAR_RECEPCION(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$query = $c->prepare($sql);//mandamos el precedure

			$query ->bindParam(1,$id);//enviamos los parametros seguun la posicion del procedure
			$query ->bindParam(2,$cliente);
			$query ->bindParam(3,$equipo);
			$query ->bindParam(4,$caracteristicas);
			$query ->bindParam(5,$motivo);
			$query ->bindParam(6,$concepto);
			$query ->bindParam(7,$monto);
			$query ->bindParam(8,$estado);
			$query ->bindParam(9,$adelanto);
			$query ->bindParam(10,$debe);
			$query ->bindParam(11,$accesorios);
			$query ->bindParam(12,$fentrega);
			$query ->bindParam(13,$marca);
			$query ->bindParam(14,$recoger);


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