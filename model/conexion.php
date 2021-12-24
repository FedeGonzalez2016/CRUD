<?php

/* DATOS QUE IRAN CAMBIANDO ACORDE A LA BASE DE DATOS ESPECIFICA*/ 

$contrasena = "";
$usuario = "root";
$nombre_bd = "crud";


/* LLAMANDO A LA CLASE PDO PARA LA CONEXION Y CREANDO EL OBJETO BD*/


try {
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$nombre_bd,
        $usuario,
        $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );

} catch (Exception $e){
    echo "Problema con la conexion: ".$e->getMessage();
}

?>

<!--ARCHIVO PARA CONECTAR A LA BASE DE DATOS-->