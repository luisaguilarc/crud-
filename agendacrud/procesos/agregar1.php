<?php 
	require_once "../clases/conexion1.php";
	require_once "../clases/crud1.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombre'],
		$_POST['descripcion'],
		$_POST['fecha']
				);

	echo $obj->agregar($datos);
	

 ?>