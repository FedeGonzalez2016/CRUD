<?php

    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';

    $id = $_POST['id'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $dni = $_POST['txtDni'];
    $telefono = $_POST['txtTelefono'];
    $email = $_POST['txtEmail'];
    $historial = $_POST['txtHistorial'];

    $sentencia = $bd->prepare ("UPDATE persona SET nombre = ?, apellido = ?, dni = ?, telefono = ?, email = ?,historial = ? WHERE id = ?;");

    $resultado = $sentencia-> execute ([$nombre,$apellido,$dni,$telefono,$email,$historial,$id]);

    if($resultado === TRUE){
        header('Location: index.php?mensaje=editado');
    }else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>