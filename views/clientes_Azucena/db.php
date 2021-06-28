<?php

class basedatos{

public static function conexion(){

	$conectar =new mysqli('localhost','root','','concesionaria');
	return $conectar;
}


}