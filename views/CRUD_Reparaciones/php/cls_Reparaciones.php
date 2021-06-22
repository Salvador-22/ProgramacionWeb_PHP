<?PHP
require_once("ConectaDB.php");
class cls_reparaciones extends ConectaDB{
	
	var $reparaciones;
	
	function listReparaciones($sql){
		$this->exeQuery($sql);
		$this->reparaciones = $this->xEnUso;
		return $this->reparaciones;
    }
	
	function existReparacion($sql){
		$this->exeQuery($sql);
		$this->reparaciones = $this->numrows;
		return $this->reparaciones;
    }
	
	function sigReparaciones(){
		$this->reparaciones = mysqli_fetch_row($this->resultado);
		return $this->reparaciones;	
	}
	
	function insertReparaciones($sql){	
		$this->reparaciones = $this->saveData($sql);	
		return $this->reparaciones;	
	}
	
	function CerrarConn(){
	  $this->Cerrar();
	}


	
	
}






?>