	<?PHP 
    $id = $_POST['id'];
	$fech = $_POST['fecha'];
    $horas = $_POST['hora'];
	$idcoche = $_POST['coche'];
	$idmec = $_POST['mecanico'];
	$idclie = $_POST['cliente'];
    require_once "php/cls_Empleados.php";
	$objAutos = new cls_Empleados();
    $sqlUpdate = "UPDATE reparaciones SET estado_logico=0;
                WHERE id = $id;";
    $rsUpd = $objEmpleados->insertEmpleados($sqlUpdate);
    echo $rsUpd;
    if ($rsUpd == "") {
        $objUtiles->Msgbox("'DATOS ACTUALIZADOS!!'");
    }else{
        $objUtiles->Msgbox("'HA OCURRIDO UN ERROR!!'");
    }
    $objAutos->CerrarConn();
    header("Refresh: 1; URL=listar_reparaciones.php");
    die();
	
	
?>