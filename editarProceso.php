<?php

    print_r($_POST);
    if(!isset($_POST['numero'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';

    $numero = $_POST['txtNumero'];
    $nombre = $_POST['txtNombre'];
    $tipo1 = $_POST['txtTipo1'];
    $tipo2 = $_POST['txtTipo2'];
    $evolucion = $_POST['txtEvolucion'];

    $sentencia = $bd->prepare ("UPDATE pokemon SET numero = ?, nombre = ?, tipo1 = ?, tipo2 = ?, evolucion = ? WHERE numero = ?;");

    $resultado = $sentencia-> execute ([$numero, $nombre, $tipo1, $tipo2, $evolucion]);

    if($resultado === TRUE){
        header('Location: index.php?mensaje=editado');
    }else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>