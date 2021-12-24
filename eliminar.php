<?php
    if(!isset($_GET['numero'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $numero = $_GET['numero'];

    $sentencia = $bd->prepare ("DELETE FROM pokemon where numero = ?;");
    $resultado = $sentencia->execute([$numero]);

    if(resultado === TRUE){
        header('Location: index.php?mensaje=eliminado');
    }else{
        header('Location: index.php?mensaje=error');
    }
?>