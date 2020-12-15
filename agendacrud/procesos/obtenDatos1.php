<?php 
	
	require_once "../clases/conexion1.php";
	require_once "../clases/crud1.php";

	$obj= new crud();

	echo json_encode($obj->obtenDatos($_POST['idcategoria']));

 ?>