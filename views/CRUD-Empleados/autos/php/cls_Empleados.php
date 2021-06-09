<?PHP
require_once("ConectaDB.php");
class cls_empleados extends ConectaDB{
	
	var $empleados;
	
	function listEmpleados($sql){
		$this->exeQuery($sql);
		$this->empleados = $this->xEnUso;
		return $this->empleados;
    }
	
	function existEmpleado($sql){
		$this->exeQuery($sql);
		$this->empleados = $this->numrows;
		return $this->empleados;
    }
	
	function sigEmpleados(){
		$this->empleados = mysqli_fetch_row($this->resultado);
		return $this->empleados;	
	}
	
	function insertEmpleados($sql){	
		$this->empleados = $this->saveData($sql);	
		return $this->empleados;	
	}
	
	function CerrarConn(){
	  $this->Cerrar();
	}


	
	
}






?>