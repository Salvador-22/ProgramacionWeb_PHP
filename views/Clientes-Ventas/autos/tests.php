<?PHP
/*
require_once "php/cls_Autos.php";
//objeto para autos
$objAutos = new cls_Autos();
$r = $objAutos->listAutos("SELECT * FROM test");
while($r <> null)
{
	echo "$r[0]: $r[1] | $r[2]<br/>";
    $r = $objAutos->sigAutos();										
}
$objAutos->CerrarConn();

require_once "php/utiles.php";
$objUtiles = new utiles();
//$objUtiles->MsgBox("'Hola mundo, desde PHP'");

$ret = $objUtiles->valRFC("EABE821102H65");
echo "validar RFC: ". $ret;
echo "<br>";
$ret = $objUtiles->valMatricula("TAA-87-98");
echo "validar MATRICULA: ". $ret."<br>";*/
/*--------------------------------------------------*/
require_once "php/cls_Autos.php";
require_once "php/utiles.php";
//objeto para utiles
$objUtiles = new utiles();
$mat = 'LEE';
$mod = 'JUST';
$sql = "SELECT * FROM test WHERE matricula='$mat' AND modelo='$mod';";
echo $sql."<br>";
$objAutos = new cls_Autos();
$n = $objAutos->existAuto($sql);
echo "num filas afectadas: ".$n."<br/>";
if($n == 0){
$sql = "INSERT INTO test VALUES ('','$mat','$mod');";
//Ok la validacion matricula	
//guarar a la base de datos
$r = $objAutos->insertAutos($sql);
echo "<br/> r:".$r;
if($r == "")
	$objUtiles->Msgbox("'YA SE DIO DE ALTA EL AUTO'");
else
    $objUtiles->Msgbox("'error!!!'");
}
else
	echo "YA EXISTE EL AUTO, NO PUEDES REPETIRLO";
$pwd = password_hash("danielb",PASSWORD_BCRYPT);
echo $pwd;
if(password_verify('danielb',$pwd)){
	echo "es correcto";
}
else{
	echo 'No es correcto';
}
?>
								
								