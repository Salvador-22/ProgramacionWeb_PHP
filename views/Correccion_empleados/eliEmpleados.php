<?PHP 
    $id = $_POST['id'];
	$nom = $_POST['nombre'];
	$apellpat = $_POST['apellidopat'];
	$apellmat = $_POST['apellidopat'];
	$con = $_POST['contratacion'];
	$pues = $_POST['puesto'];
    require_once "php/utiles.php";
    require_once "php/cls_Empleados.php";
    $objUtiles = new utiles();
	$objAutos = new cls_Empleados();
    $sqlUpdate = "UPDATE empleados SET estado_logico=0;
                WHERE id = $id;";
    $rsUpd = $objEmpleados->insertEmpleados($sqlUpdate);
    echo $rsUpd;
    if ($rsUpd == "") {
        $objUtiles->Msgbox("'DATOS ACTUALIZADOS!!'");
    }else{
        $objUtiles->Msgbox("'HA OCURRIDO UN ERROR!!'");
    }
    $objAutos->CerrarConn();
    header("Refresh: 1; URL=listar_empleado.php");
    die();
	
	
?>