<?php 

class Modelo_m{

private $db;
private  $folder_entrega;
/*a quien va dirigido*/
public function __construct(){
	$this->db=basededatos::conexion();
	$this->folder_entrega=array();
}
/*peticions*/
public function crear_modelo($marca,$modelo,$anio){
$sql="INSERT INTO modelo(marca,modelo,anio) VALUE('$marca','$modelo','$anio')";
$this->db->query($sql);
}
public function ver_autos(){
	$sql="SELECT id,modelo,marca,anio FROM modelo";
	$folder_entrega=$this->db->query($sql);
	while ($acomodador=$folder_entrega->fetch_assoc()){
		$this->folder_entrega[]=$acomodador;

	}
return $this->folder_entrega;
}

public function cambiar_datos($id,$marca,$modelo,$anio){
$sql="UPDATE modelo set modelo='$modelo',marca='$marca',anio='$anio' WHERE id='$id'";
$this->db->query($sql);
}
public function eliminar_datos($id){
	$sql="DELETE FROM modelo WHERE id=$id";
	$this->db->query($sql);
}
}
 ?>
