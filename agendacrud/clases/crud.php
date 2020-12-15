<?php 

class crud{
	public function agregar($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT into t_agenda (categoria,nombre,apaterno,amaterno,telefono,email)
		values ('$datos[0]',
		'$datos[1]',
		'$datos[2]',
		'$datos[3]',
		'$datos[4]',
		'$datos[5]')";
		return mysqli_query($conexion,$sql);
	}

	public function obtenDatos($idagenda){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_agenda,
		categoria,
		nombre,
		apaterno,
		amaterno,
		telefono,
		email
		from t_agenda 
		where id_agenda='$idagenda'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);

		$datos=array(
			'id_agenda' => $ver[0],
			'categoria' => $ver[1],
			'nombre' => $ver[2],
			'apaterno' => $ver[3],
			'amaterno' => $ver[4]
			'telefono' => $ver[5],
			'email' => $ver[6]
		);
		return $datos;
	}

	public function actualizar($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="UPDATE t_agenda set categoria='$datos[0]',
		nombre='$datos[1]',
		apaterno='$datos[2]'
		amaterno='$datos[3]',
		telefono='$datos[4]',
		email='$datos[5]'
		where id_agenda='$datos[6]'";
		return mysqli_query($conexion,$sql);
	}
	public function eliminar($idagenda){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from t_agenda where id_agenda='$idagenda'";
		return mysqli_query($conexion,$sql);
	}
}

?>