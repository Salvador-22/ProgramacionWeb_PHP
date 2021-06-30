<?php
include("conexion.php");

    if(isset($_POST['save_modelo']))
    {
       $brand= $_POST['marca'];
       $model=$_POST['modelo'];
       $year=$_POST['anio'];

       echo $brand;
       $query = "INSERT INTO modelo(marca,modelo,anio) VALUES('$brand','$model','$year')";
       $result= mysqli_query($conn, $query);

       if(!$result)
       {
           die("No se puede insertar el modelo ");
       }

       $_SESSION['message']='Modelo guardado correctamente';
       $_SESSION['message_type']='correcto';
       header("Location: modelo.php");

    }
?>
