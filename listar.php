<?php
	include ("conexion.php");

	$rNombre = $_POST["nombre"];
	$rApellidos = $_POST["apellidos"];
	$rDni = $_POST["dni"];

	if(empty($rNombre) && empty($rApellidos) && empty($rDni)){
	    echo json_encode(["data" => []]);
	    exit;
    }
	$query = "SELECT * FROM usuario WHERE estado = 1 ORDER BY idusuario desc;";
	$resultado = mysqli_query($conexion, $query);
	
	if( !$resultado )
		die("Error, no se ejecutó la consulta.");
	else{
		$array["data"] = [];//devuelve un arreglo vacio por si no hay registros en la base de datos
		while ( $data = mysqli_fetch_assoc($resultado)){
			$array["data"][] = $data; //array_map("utf8_encode", $data); usar esta función por si no te muestra nada de datos, ya que, hay conflictos con los caracteres raros
		}
		echo json_encode($array);
	}

	mysqli_free_result( $resultado );
	mysqli_close( $conexion );