<?php include 'template/header.php' ?>

<?php 
    /*SI NO EXISTE id, ME MOSTRARA EL SIGUIENTE ERROR*/
     
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
    
    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd-> prepare("select * from persona where id = ?;");
    $sentencia-> execute ([$id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                    <label class="form-label">Nombre/s:: </label>
                    <input type="text" class="form-control" name="txtNombre" required value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Apellido/s:: </label>
                    <input type="text" class="form-control" name="txtApellido"  required value="<?php echo $persona->apellido; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Dni: </label>
                    <input type="text" class="form-control" name="txtDni"  required value="<?php echo $persona->dni; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Telefono: </label>
                    <input type="text" class="form-control" name="txtTelefono"  required value="<?php echo $persona->telefono; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="text" class="form-control" name="txtEmail"  required value="<?php echo $persona->email; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Historial Clinico: </label>
                    <input type="text" class="form-control" name="txtHistorial"  required value="<?php echo $persona->historial; ?>">
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="id" value="<?php echo $persona->id; ?>">
                    <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>