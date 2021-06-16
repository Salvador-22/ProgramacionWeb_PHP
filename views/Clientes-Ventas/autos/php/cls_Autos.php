<?PHP
require_once("ConectaDB.php");
class cls_Autos extends ConectaDB{
	
	var $autos;
	
	function listAutos($sql){
		$this->exeQuery($sql);
		$this->autos = $this->xEnUso;
		return $this->autos;
    }

	function findAutos($sql){
		$this->exeQuery($sql);
		$this->autos = $this->xEnUso;
		return $this->autos;
    }
	
	function existAuto($sql){
		$this->exeQuery($sql);
		$this->autos = $this->numrows;
		return $this->autos;
    }
	function updateAuto($sql){
		$this->saveData($sql);
		return $this->resultado;
    }
	
	function sigAutos(){
		$this->autos = mysqli_fetch_row($this->resultado);
		return $this->autos;	
	}
	
	function insertAutos($sql){	
		$this->exeQuery($sql);
		$this->autos = $this->saveData($sql);	
		return $this->autos;	
	}

	function insertClientes($sql){
		$this->autos= $this->saveData($sql);
		return $this->autos;
	}
	
	function insertVentas($sql){
		$this->autos= $this->saveData($sql);
		return $this->autos;
	}
	
	function updateClientes($sql){
		$this->autos= $this->saveData($sql);
		return $this->autos;
	}
	
	function updateVentas($sql){
		$this->autos= $this->saveData($sql);
		return $this->autos;
	}
	
	function CerrarConn(){
	  $this->Cerrar();
	}


	
	
}






?>