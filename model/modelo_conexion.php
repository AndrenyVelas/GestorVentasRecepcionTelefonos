<?php 
/**
 * 
 */
class conexionBD
{
	
	public function conexionPDO()
	{
		# code...
		$host     =  'localhost' ;
		$usuario  =  'root' ;
		$clave    =  '' ;
		$dbname   =  'dk_store_v2' ;
		try{
			$pdo = new PDO("mysql:host=$host; dbname=$dbname", $usuario,$clave);
			$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec("set names utf8");
			return $pdo;

		}catch (exception $e){
			echo "La conexion ha fallado";
		}
	}

	function cerrar_conexion()
	{
		$this->$pdo=null;

	}
}


?>