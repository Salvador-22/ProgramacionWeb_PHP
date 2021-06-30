<?php
include("conexion.php");

    if(isset($_POST['save_auto_venta']))
    {
       $unidades= $_POST['unidades'];
       $precio=$_POST['precio'];
       $idEstado=$_POST['idEstado'];
       $idModelo=$_POST['idModelo'];
       $estado=1;
       $query = "INSERT INTO coches_venta(id_modelo,estado,unidades,precio,estado_logico) VALUES('$idModelo','$idEstado','$unidades','$precio','$estado')";
       $result= mysqli_query($conn, $query);

       if(!$result)
       {
           die("Fallo al insertar");
       }

       $_SESSION['message']='Tarea guardada correctamente';
       $_SESSION['message_type']='correcto';
       header("Location: coches_venta.php");
    }
?>
