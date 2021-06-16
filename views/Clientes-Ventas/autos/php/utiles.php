<?PHP
class utiles{
	
	function MsgBox($str){
	  $leng = "language=\"javascript\"";
      echo "<script $leng>\n";
      echo "alert($str);\n";
      echo "</script>\n";	  
	}
	
	function valRFC($rfc){
		if(preg_match("/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}/",$rfc))
			return 1;
		else
			return -1;		
	}

	function valMatricula($matr){
		if(preg_match("/^[A-Z]{3}-[0-9]{2}-[0-9]{2}/",$matr))
			return 1;
		else
			return -1;		
	}	
	
		function val_tel($tel){
			if (preg_match("/[0-9]{10}/",$tel))
				return 1;
			else
				return -1;
		}
		
		//Validar matricula, siguiendo formato: 3 letras - 2 numeros - 2numeros
		function val_Placa($placa){
			if (preg_match("/[A-Z]{3}\-[0-9]{2}\-[0-9]{2}/",$placa))
				return 1;
			else
				return -1;
		}
	
	
	//validar	matricula 3 letras - 2 num - 2 num
}
?>