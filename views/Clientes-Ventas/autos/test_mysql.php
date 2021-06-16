<?php

require_once "php/cls_Autos.php";
require_once "php/utiles.php";
$value = 'prb'
//$sql = "insert into coches values('','test','123456',1,1);";
$sql = "update coches set matricula='$value' where id=1;";
echo $sql."<br>";
$objAutos = new cls_Autos();
$n = $objAutos->updateAuto($sql);
echo "num filas afectadas: ".$n."<br/>";
?>
