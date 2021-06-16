<?PHP
print_r($_POST); 
//$_GET[]
$mat = $_POST['matricula'];
$mot = $_POST['motor'];
$mod = $_POST['modelo'];

echo "matricula: ". $mat . "| motor: ".$mot." | modelo". $mod;

?>