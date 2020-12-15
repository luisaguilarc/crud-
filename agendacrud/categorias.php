<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header"  style="background-color:#1DADD6;">
						<a href="index.php">
							<i class="fas fa-id-card" style="color: black;"></i>
						</a>                    
						<i class="fas fa-home"></i>
						<a href="Index.php" style="color: white;">Inicio</a>
						<i class="fas fa-address-book"></i>
						<a href="contactos.php" style="color: white;">Contactos</a>
						<i class="fas fa-file-alt"></i>
						<a href="categorias.php" style="color: white;">Categorias</a>
						<h1 style="text-align: center; color:white;">Categorias</h1>
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar Nueva Categoria <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						By Eduardo Acatitlan
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nueva categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
						<label>Fecha</label>
						<input type="text" class="form-control input-sm" id="fecha" name="fecha">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idcategoria" name="idcategoria">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Descricion</label>
						<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
						<label>Fecha</label>
						<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar1.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tablaCategorias.php');
						alertify.success("agregado con exito");
					}else{
						alertify.error("Fallo al agregar");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar1.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tablaCategorias.php');
						alertify.success("Actualizado con exito ");
					}else{
						alertify.error("Fallo al actualizar");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tablaCategorias.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idjuego){
		$.ajax({
			type:"POST",
			data:"idcategoria=" + idcategoria,
			url:"procesos/obtenDatos1.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idcategoria').val(datos['id_categoria']);
				$('#nombreU').val(datos['nombre']);
				$('#descripcionU').val(datos['descripcion']);
				$('#fechaU').val(datos['fecha']);
			}
		});
	}

	function eliminarDatos(idjuego){
		alertify.confirm('Eliminar un juego', '¿Seguro de eliminar esta categoria?', function(){ 

			$.ajax({
				type:"POST",
				data:"idcategoria=" + idcategoria,
				url:"procesos/eliminar1.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tablaCategorias.php');
						alertify.success("Eliminado con exito!");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}
</script>