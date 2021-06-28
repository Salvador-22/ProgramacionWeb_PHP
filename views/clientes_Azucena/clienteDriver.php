<?php

class cliente_d{

function __construct(){

require_once('clientemodelo.php');
}
public function misclientes(){
	$mostrar = new cliente_m();

	$datos["clientes"]=$mostrar->get_clientes();
	require_once('../php/cliente.php');
}

public function subirdatos($nombre,$apellido_p,$apellido_m,$direccion,$telefono){

	$datos=new cliente_m();
	$datos -> crear_usuario($nombre,$apellido_p,$apellido_m,$direccion,$telefono);
	$this->misclientes();
}
public function eliminar($id){
	$idies=new cliente_m();
	$idies->del_cliente($id);
	$this->misclientes();
}
public function modificar($id,$nom,$app,$apm,$dir,$tel){
	$modif=new cliente_m();
	$modif->update_cliente($id,$nom,$app,$apm,$dir,$tel);
	$this->misclientes();
}
}