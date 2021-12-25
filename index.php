<?php include 'template/header.php' ?>

<?php

    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from persona");
    $persona = $sentencia -> fetchAll(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <!--INICIO ALERTA-->

        <?php
            /* VALIDACION: SI EXISTE MENSAJE Y ESE MENSAJE ES 'falta' AHI EJECUTAR LA ALERTA. EL mensaje PROVIENE DE 'registrar.php'*/ 
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Rellena todos los campos
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
              Lista de Pacientes
            </div>
            <div class="p-4">
                  <!-- PARA QUE TODOS LOS ELEMENTOS DENTRO DE LA TABLE ESTEN ALINEADOS-->
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre/s</th>
                        <th scope="col">Apellido/s</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Historial Clinico</th>
                        <th scope="col" colspan="2">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        foreach($persona as $dato){

                        
                      ?>

                      <tr>
                        <td scope="row"> <?php echo $dato->id; ?></td>
                        <td><?php echo $dato->nombre; ?></td>
                        <td><?php echo $dato->apellido; ?></td>
                        <td><?php echo $dato->dni; ?></td>
                        <td><?php echo $dato->telefono; ?></td>
                        <td><?php echo $dato->email; ?></td>
                        <td><?php echo $dato->historial; ?></td>
                        <td><a  class="text-success" href="editar.php?id=<?php echo $dato->id; ?> "> <i class="bi bi-pencil-square"></i> </a></td>
                        <td><a onclick="return confirm('Desea eliminar definitivamente la informacion?');" class="text-danger" href="eliminar.php?id= <?php echo $dato->id; ?> "> <i class="bi bi-trash"></i> </a></td>
                      </tr>

                      <?php
                        }
                      ?>

                    </tbody>
                  </table>
            </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="card">
              <div class="card-header">
                  Ingresar datos:
              </div>
              <form class="p-4" method="POST" action="registrar.php">
                <div class="mb-3">
                  <label class="form-label">Nombre/s: </label>
                  <input type="text" class="form-control" placeholder="Nombre" name="txtNombre" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Apellido/s: </label>
                  <input type="text" class="form-control" placeholder="Apellido" name="txtApellido" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Dni: </label>
                  <input type="number" class="form-control" placeholder="Dni" name="txtDni" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Telefono: </label>
                  <input type="number" class="form-control" placeholder="Telefono" name="txtTelefono" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email: </label>
                  <input type="text" class="form-control" placeholder="alguien@ejemplo.com" name="txtEmail" autofocus required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Historial Clinico: </label>
                  <input type="textarea" class="form-control" placeholder="Contenido" name="txtHistorial" autofocus required>
                </div>
                <!-- PARA QUE EL BOTON OCUPE TODO EL TAMAÑO DEL FORMULARIO-->
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