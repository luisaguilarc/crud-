<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['categoria'],
		$_POST['nombre'],
		$_POST['apaterno'],
		$_POST['amaterno'],
		$_POST['telefono'],
		$_POST['email'],
		$_POST['idagenda']
				);

	echo $obj->agregar($datos);
	

 ?>