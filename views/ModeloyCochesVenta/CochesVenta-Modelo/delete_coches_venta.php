<?php
include("conexion.php");

if(isset($_GET['id']))
{
    $id= $_GET['id'];
    $query= "DELETE FROM coches_venta WHERE id = $id";
    $result=mysqli_query($conn,$query);

    if(!result)
    {
        die("No se puede eliminar el registro");
    }

    $_SESSION['message'] = 'Modelo eliminado';
    $_SESSION['message_type'] = 'danger';
    header("Location: coches_venta.php");
}
?>
