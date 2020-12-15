<?php 
	require_once "../clases/conexion1.php";
	require_once "../clases/crud1.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombreU'],
		$_POST['descripcionU'],
		$_POST['fechaU'],
		$_POST['idcategoria']
				);
	
	echo $obj->actualizar($datos);

 ?>