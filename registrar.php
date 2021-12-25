<!--AQUI VAMOS A CAPTURAR LA INFORMACION ENVIADA DESDE EL index.php Y LA VAMOS A PROCESAR-->
<!--PRIMERO QUE TODO PONDREMOS UNA VALIDACION-->

<?php

    /*SI ESTA VACIO ALGUNO DE LOS SIGUIENTES CAMPOS DARA ERROR...ESTO ES UNA VALIDACION */    

    if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) ||  empty($_POST["txtDni"]) ||  empty($_POST["txtTelefono"])  ||  empty($_POST["txtEmail"])  ||  empty($_POST["txtHistorial"])) {

        header ('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $email = $_POST["txtEmail"];
    $historial = $_POST["txtHistorial"];

    $sentencia = $bd-> prepare ("INSERT INTO persona(nombre,apellido,dni,telefono,email,historial) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute ([$nombre,$apellido,$dni,$telefono,$email,$historial]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
