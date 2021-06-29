<?php 

class modelo_d{

function __construct(){
	require_once('../Modelos/Model.php');
}
	public function datosdelmodelo(){
		$mostrar=new modelo_m();
		$folder['coches']=$mostrar->ver_autos();
	require_once('../php/cliente-vistas.php');
	}
public function enviardatos($marca,$modelo,$anio){

	$enviar=new modelo_m();
$enviar->crear_modelo($marca,$modelo,$anio);
$this->datosdelmodelo();
}

public function correccion($id,$marca,$modelo,$anio){
	$modificacion=new modelo_m();
	$modificacion->cambiar_datos($id,$marca,$modelo,$anio);
	$this->datosdelmodelo();
}

public function eliminar($id){
	$eliminacion =new modelo_m();
	$eliminacion->eliminar_datos($id);
	$this->datosdelmodelo();
}
}



 ?>