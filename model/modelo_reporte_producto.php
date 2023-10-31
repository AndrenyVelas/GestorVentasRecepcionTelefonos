<?php 
	//comunica con el servidor para consultar
	require_once 'modelo_conexion.php';

	/**
	 * 
	 */
	class Modelo_Reporte_Producto extends conexionBD
	{
		
		 /**************************************************
 		       LISTAR ENTRADAS Y SALIDAS DE LOS PRODUCTOS
 		  **************************************************/
		 public function Listar_Entrada_Salida_Producto()
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_REPORTE_PRODUCTO_EN_SAL()";
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
 		       LISTAR PRODUCTOS EN COMBO
 		  **************************************************/
		 public function Listar_select_Producto()
		 {
			$c = conexionBD:: conexionPDO();

			$sql = "CALL SP_LISTAR_SELECT_PRODUCTO()";
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
 		       KARDEX EN DATATABLE
 		  **************************************************/
		 public function Listar_Kardex($pro)
		 {
			$c = conexionBD:: conexionPDO();
			$sql = "CALL SP_KARDEX_COD_PRODUCTO(?)";
			$arreglo = array();
			$query = $c->prepare($sql);//mandamos el precedure
			$query ->bindParam(1,$pro);//enviamos los parametros seguun la posicion

			$query ->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $resp) {
			        $arreglo["data"][]=$resp;//almacenando los datos del arreglo
			}
			return $arreglo;
			conexionBD::cerrar_conexion();
		 }


		  /**************************************************
 		       LISTAR UTILIDAD DE PRODUCTOS
 		  **************************************************/
		   public function Listar_Prod_utilidad()
		   {
			  $c = conexionBD:: conexionPDO();
			  $sql = "CALL SP_REPORTE_UTILIDAD()";
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








}


 ?>
