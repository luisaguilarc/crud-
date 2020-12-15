<?php 
	
	require_once "../clases/conexion1.php";
	require_once "../clases/crud1.php";

	$obj= new crud();

	echo $obj->eliminar($_POST['idcategoria']);

 ?>