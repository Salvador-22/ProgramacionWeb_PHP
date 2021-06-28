<?php

require_once('db.php');
require_once('clienteDriver.php');
$boton=$_POST['btn'];
$inyectar = new cliente_d();

switch ($boton) {
	case 1:
$nom=$_POST['nombre'];
$app=$_POST['apellido_p'];
$apm=$_POST['apellido_m'];
$dir=$_POST['direccion'];
$tel=$_POST['telefono'];
$inyectar->subirdatos($nom,$app,$apm,$dir,$tel);

		break;
	case 2:
	$id=$_POST['ids'];
	$inyectar->eliminar($id);
		break;

		case 3:
$id=$_POST['id'];
$nom=$_POST['nom'];
$app=$_POST['app'];
$apm=$_POST['apm'];
$dir=$_POST['dir'];
$tel=$_POST['tel'];
$inyectar->modificar($id,$nom,$app,$apm,$dir,$tel);
			break;


			default;

		break;
}




?>