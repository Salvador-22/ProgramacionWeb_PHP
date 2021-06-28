<?php

class cliente_m{

	private $db;
	private $cliente;
	private $datos;

public function __construct(){
	$this->db=basedatos::conexion();
}
public function crear_usuario($nombre,$app,$apm,$direccion,$tel){
	
$sql="INSERT INTO `clientes` (`id`, `nombre`, `apellido_pat`, `apellido_mat`, `direccion`, `telefono`, `estado_logico`) VALUES (NULL, '$nombre', '$app', '$apm', '$direccion', 'tel', NULL)";
$cliente = $this->db->query($sql);

}
public function get_clientes(){
	$sql="SELECT id,nombre,apellido_pat,apellido_mat,direccion,telefono FROM clientes";
	$datos=$this->db->query($sql);
	while ($row = $datos->fetch_assoc()){
		$this->datos[]=$row;
	}
	return $this->datos;
}
public function del_cliente($id){
	$sql = "DELETE FROM clientes where id = '$id'";
	$this->db->query($sql);
}


public function update_cliente($id,$nom,$app,$apm,$dir,$tel){
	$sql="UPDATE clientes SET nombre='$nom',apellido_pat='$app',apellido_mat='$apm',direccion='$dir',telefono='$tel' where id='$id'";
	$this->db->query($sql);
}
}
?>
