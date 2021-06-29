<?PHP
$id = $_POST['id'];
$nomb = $_POST['nombre'];
$appat = $_POST['apePat'];
$apmat = $_POST['apeMat'];
$con = $_POST['contratacion'];
$sal = $_POST['salario'];
$puesto = $_POST['puesto'];
require_once 'php/utiles.php';
require_once 'php/cls_Autos.php';
$objUtiles = new utiles();
$objAutos = new cls_Autos();

$sqlUpdate = "UPDATE empleados 
        SET nombre='$nomb', apellido_pat='$appat', 
        apellido_mat='$apmat', contratacion='$con', 
        salario=$sal, id_puesto=$puesto
        WHERE id=$id;";
echo $sqlUpdate;
$rsu = $objAutos->insertAutos($sqlUpdate);
if ($rsu == "") {
    $objUtiles->Msgbox("'DATOS ACTUALIZADOS!!'");
}else{
    $objUtiles->Msgbox("'HA OCURRIDO UN ERROR!!'");
}
$objAutos->CerrarConn();
header("Refresh: 1; URL=lst_empleados.php");
die();
?>