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
                    <div class="card-header" style="background-color:#1DADD6;">
                        <a href="index.php">
                            <i class="fas fa-id-card" style="color: black;"></i>
                        </a>                    
                        <i class="fas fa-home"></i>
                        <a href="Index.php" style="color: white;">Inicio</a>
                        <i class="fas fa-address-book"></i>
                        <a href="contactos.php" style="color: white;">Contactos</a>
                        <i class="fas fa-file-alt"></i>
                        <a href="categorias.php" style="color: white;">Categorias</a>
                        <h1 style="text-align: center; color:white;">Contactos</h1>
                    </div>
                    <div class="card-body">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
                            Agregar nuevo contacto <span class="fa fa-plus-circle"></span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agrega nuevos contactos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevo">
                        <label>Categoria</label>
                        <input type="text" class="form-control input-sm" id="categoria" name="Categoria">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                        <label>Apellido Paterno</label>
                        <input type="text" class="form-control input-sm" id="apaterno" name="apaterno">
                        <label>Apellido Materno</label>
                        <input type="text" class="form-control input-sm" id="amaterno" name="amaterno">
                        <label>Telefono</label>
                        <input type="text" class="form-control input-sm" id="telefono" name="telefono">
                        <label>Email</label>
                        <input type="email" class="form-control input-sm" id="email" name="email">
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
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Contacto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevoU">
                        <input type="text" hidden="" id="idagenda" name="idagenda">
                        <label>Categoria</label>
                        <input type="text" class="form-control input-sm" id="categoriaU" name="CategoriaU">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
                        <label>Apellido Paterno</label>
                        <input type="text" class="form-control input-sm" id="apaternoU" name="apaternoU">
                        <label>Apellido Materno</label>
                        <input type="text" class="form-control input-sm" id="amaternoU" name="amaternoU">
                        <label>Telefono</label>
                        <input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
                        <label>Email</label>
                        <input type="email" class="form-control input-sm" id="emailU" name="emailU">
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
                url:"procesos/agregar.php",
                success:function(r){
                    if(r==1){
                        $('#frmnuevo')[0].reset();
                        $('#tablaDatatable').load('tablaContactos.php');
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
                url:"procesos/actualizar.php",
                success:function(r){
                    if(r==1){
                        $('#tablaDatatable').load('tablaContactos.php');
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
        $('#tablaDatatable').load('tablaContactos.php');
    });
</script>

<script type="text/javascript">
    function agregaFrmActualizar(idagenda){
        $.ajax({
            type:"POST",
            data:"idagenda=" + idagenda,
            url:"procesos/obtenDatos.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idagendaU').val(datos['id_agenda']);
                $('#categoriaU').val(datos['categoria']);
                $('#nombreU').val(datos['nombre']);
                $('#apaternoU').val(datos['apaterno']);
                $('#amaternoU').val(datos['amaterno']);
                $('#telefonoU').val(datos['telefono']);
                $('#emailU').val(datos['email']);
            }
        });
    }

    function eliminarDatos(idagenda){
        alertify.confirm('Eliminar contacto', '¿Seguro de eliminar este contacto?', function(){ 

            $.ajax({
                type:"POST",
                data:"idagenda=" + idagenda,
                url:"procesos/eliminar.php",
                success:function(r){
                    if(r==1){
                        $('#tablaDatatable').load('tablaContactos.php');
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