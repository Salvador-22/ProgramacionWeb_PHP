<?php  
/**
 * 
 */
class basededatos
{
	public static function conexion(){
   $unir = new mysqli('localhost','root','','concesionaria');
       return $unir;
	}
}







?>