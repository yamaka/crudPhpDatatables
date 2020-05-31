<?php
	$server = "localhost";
	$user = "root";
	$password = "root123";//poner tu propia contraseña, si tienes una.
	$bd = "prueba";

	$conexion = mysqli_connect($server, $user, $password, $bd);
	if (!$conexion){ 
		die('Error de Conexión: ' . mysqli_connect_errno());	
	}
?>

