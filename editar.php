<?php include 'template/header.php' ?>

<?php 

    if(!isset($_GET['numero'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
    
    include_once 'model/conexion.php';
    $numero = $_GET['numero'];

    $sentencia = $bd-> prepare("select * from pokemon where numero = ?;");
    $sentencia-> execute ([$numero]);
    $pokemon = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos
                </div>
                <form class="p-4" method="POST" action="editar.php">
                    <div class="mb-3">
                    <label class="form-label">Numero: </label>
                    <input type="number" class="form-control" name="txtNumero" required value="<?php echo $pokemon->numero; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="txtNombre"  required value="<?php echo $pokemon->nombre; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Tipo1: </label>
                    <input type="text" class="form-control" name="txtTipo1"  required value="<?php echo $pokemon->tipo1; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Tipo2: </label>
                    <input type="text" class="form-control" name="txtTipo2"  required value="<?php echo $pokemon->tipo2; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Evolucion: </label>
                    <input type="text" class="form-control" name="txtEvolucion"  required value="<?php echo $pokemon->evolucion; ?>">
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="numero" value="<?php echo $pokemon->numero; ?>">
                    <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>