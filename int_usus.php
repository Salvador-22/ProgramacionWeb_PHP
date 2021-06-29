<?PHP
    $id = $_POST['id'];
    $usu = $_POST['usuario'];
    $contra = $_POST['contrasena'];
    $tipo = $_POST['tipo'];
    require_once 'php/utiles.php';
    require_once 'php/cls_Autos.php';
    $objUtiles = new utiles();
    $objAutos = new cls_Autos();
    if (strlen($contra) != 72) {
        $contra = password_hash($contra, PASSWORD_BCRYPT);
    }
    $sqlUpdate = "UPDATE usuarios 
            SET usuario='$usu', psswd='$contra', id_tipo=$tipo
            WHERE id=$id;";
    echo $sqlUpdate;
    $rsu = $objAutos->insertAutos($sqlUpdate);
    if ($rsu == "") {
        $objUtiles->Msgbox("'DATOS ACTUALIZADOS!!'");
    }else{
        $objUtiles->Msgbox("'HA OCURRIDO UN ERROR!!'");
    }
    $objAutos->CerrarConn();
    header("Refresh: 1; URL=lst_usuarios.php");
    die();
?>