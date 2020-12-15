<?php 

class crud{
	public function agregar($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT into t_categorias (nombre,descripcion,fecha)
		values ('$datos[0]',
		'$datos[1]',
		'$datos[2]')";
		return mysqli_query($conexion,$sql);
	}

	public function obtenDatos($idcategoria){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_categoria,
		nombre,
		descripcion,
		fecha
		from t_categorias 
		where id_categoria='$idcategoria'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);

		$datos=array(
			'id_categoria' => $ver[0],
			'nombre' => $ver[1],
			'descripcion' => $ver[2],
			'fecha' => $ver[3]
		);
		return $datos;
	}

	public function actualizar($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="UPDATE t_categorias set nombre='$datos[0]',
		descripcion='$datos[1]',
		fecha='$datos[2]'
		where id_categoria='$datos[3]'";
		return mysqli_query($conexion,$sql);
	}
	public function eliminar($idcategoria){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from t_categorias where id_categoria='$idcategoria'";
		return mysqli_query($conexion,$sql);
	}
}

?>