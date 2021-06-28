<?php 
require_once('conexion_basededatos.php');
require_once('ModelosDrivers.php');

$llamar =new modelo_d();
$firma=$_POST['btn'];

switch ($firma) {
	case 1:
	    $marca=$_POST['Marca'];
		$modelo=$_POST['Modelo'];
		$anio=$_POST['anio'];

$llamar->enviardatos($marca,$modelo,$anio);
		break;
	case 2:
	    $id=$_POST['id'];
		$marca=$_POST['marca'];
		$modelo=$_POST['modelo'];
		$anio=$_POST['anio'];

		$llamar->correccion($id,$marca,$modelo,$anio);
		break;

		case 3:
		 $id=$_POST['id'];
		 $llamar->eliminar($id);
		 break;
	
}





 ?>