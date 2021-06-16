<?PHP
require_once("constantes.php");
class ConectaDB{
	//Variables
	var $conexion;
	var $consulta;
	var $resultado;
	var $xEnUso;
	var $numrows;
	
	//constructor;    __constructor php 8
	function ConectaDB(){
		$this->conexion = mysqli_connect(NOM_MAQ .":".PUERTO, USUARIO, CONTRASENA, BASE_DATOS); 
		if(!$this->conexion)
		  die("¡¡No pudo conectarse !!");

		//mysql_select_db(BASE_DATOS, $this->conexion) or die ("No pudo seleccionar la base de datos");
		}
	
	//funciones propias de la clase ConectaDB
	function exeQuery($Query){
		$this->consulta=$Query;
		$this->ConectaDB();
		//$this->resultado =  mysqli_query( $this->conexion, $Query);
		$this->resultado =  mysqli_query( $this->conexion, $this->consulta);
	
		$this->xEnUso = mysqli_fetch_array($this->resultado,MYSQLI_NUM);
		$this->numrows = mysqli_num_rows($this->resultado);
	}
	
	function saveData($Query){
		$this->consulta=$Query;
		$this->ConectaDB();
		$this->resultado =  mysqli_query( $this->conexion, $this->consulta);
	}	
	
	function Cerrar(){
		mysqli_close($this->conexion);
	}	
}
?>