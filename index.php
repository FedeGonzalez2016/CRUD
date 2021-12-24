<?php include 'template/header.php' ?>

<?php

    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from pokemon");
    $pokemon = $sentencia -> fetchAll(PDO::FETCH_OBJ);
    /*print_r($pokemon);*/

?>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <!--INICIO ALERTA-->

        <?php
            /* VALIDACION: SI EXISTE MENSAJE Y ESE MENSAJE ES 'falta' AHI EJECUTAR LA ALERTA. EL mensaje PROVIENE DE 'registrar.php'*/ 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error</strong> Rellena todos los campos
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        
        <?php
          }
        ?>

        <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado!</strong> Se agregaron los datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
        }
        ?>

        <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
        }
        ?>

        <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Editado!</strong> Los datos fueron actualizados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
        }
        ?>

        <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Eliminado!</strong> Los datos fueron borrados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
        }
        ?>

        <!--FIN ALERTA-->
          <div class="card">
            <div class="card-header">
              Lista Pokemon
            </div>
            <div class="p-4">
                  <!-- PARA QUE TODOS LOS ELEMENTOS DENTRO DE LA TABLE ESTEN ALINEADOS-->
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo1</th>
                        <th scope="col">Tipo2</th>
                        <th scope="col">Evolucion</th>
                        <th scope="col" colspan="2">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        foreach($pokemon as $dato){

                        
                      ?>

                      <tr>
                        <td scope="row"> <?php echo $dato->numero; ?></td>
                        <td><?php echo $dato->nombre; ?></td>
                        <td><?php echo $dato->tipo1; ?></td>
                        <td><?php echo $dato->tipo2; ?></td>
                        <td><?php echo $dato->evolucion; ?></td>
                        <td><a  class="text-success" href="editar.php?numero= <?php echo $dato->numero; ?> "> <i class="bi bi-pencil-square"></i> </a></td>
                        <td><a onclick="return confirm('Desea eliminar definitivamente la informacion?');" class="text-danger" href="eliminar.php?numero= <?php echo $dato->numero; ?> "> <i class="bi bi-trash"></i> </a></td>
                      </tr>

                      <?php
                        }
                      ?>

                    </tbody>
                  </table>
            </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="card">
              <div class="card-header">
                  Ingresar datos
              </div>
              <form class="p-4" method="POST" action="registrar.php">
                <div class="mb-3">
                  <label class="form-label">Numero: </label>
                  <input type="number" class="form-control" name="txtNumero" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nombre: </label>
                  <input type="text" class="form-control" name="txtNombre" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tipo1: </label>
                  <input type="text" class="form-control" name="txtTipo1" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tipo2: </label>
                  <input type="text" class="form-control" name="txtTipo2" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Evolucion: </label>
                  <input type="text" class="form-control" name="txtEvolucion" autofocus required>
                </div>
                <div class="d-grid">
                  <input type="hidden" name="oculto" value="1">
                  <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
              </form>
          </div>
      </div>
    </div>
</div>


<?php include 'template/footer.php' ?> 