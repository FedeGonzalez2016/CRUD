<!--AQUI VAMOS A CAPTURAR LA INFORMACION ENVIADA DESDE EL index.php Y LA VAMOS A PROCESAR-->
<!--PRIMERO QUE TODO PONDREMOS UNA VALIDACION-->

<?php

    /*SI ESTA VACIO ALGUNO DE LOS SIGUIENTES CAMPOS DARA ERROR...ESTO ES UNA VALIDACION */    

    if (empty($_POST["txtNumero"]) || empty($_POST["txtNombre"]) ||  empty($_POST["txtTipo1"]) ||  empty($_POST["txtTipo2"])  ||  empty($_POST["txtEvolucion"])  ||  empty($_POST["oculto"])) {

        header ('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $numero = $_POST["txtNumero"];
    $nombre = $_POST["txtNombre"];
    $tipo1 = $_POST["txtTipo1"];
    $tipo2 = $_POST["txtTipo2"];
    $evolucion = $_POST["txtEvolucion"];

    $sentencia = $bd-> prepare ("INSERT INTO pokemon(numero,nombre,tipo1,tipo2,evolucion) VALUES (?,?,?);");
    $resultado = $sentencia->execute ([$numero,$nombre,$tipo1,$tipo2,$evolucion]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
