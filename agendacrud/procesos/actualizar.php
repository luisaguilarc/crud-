<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['categoriaU'],
		$_POST['nombreU'],
		$_POST['apaternoU'],
		$_POST['amaternoU'],
		$_POST['telefonoU'],
		$_POST['emailU'],
		$_POST['idagenda']
				);
	
	echo $obj->actualizar($datos);

 ?>