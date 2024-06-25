<?php
// funciones.php

// errores.php
ini_set('display_errors', 1); // Muestra los errores en la pantalla
ini_set('display_startup_errors', 1); // Muestra los errores de inicio
error_reporting(E_ALL); // Reporta todos los errores de PHP

ini_set('error_log', 'errores.log');
ini_set('log_errors', 1);


// funciones.php

function conectar()
{
    $servidor = "localhost";
    $usuario = "root";
    $clave = "root";
    $bbdd = "islantilla";
    $conexion = new mysqli($servidor, $usuario, $clave, $bbdd);
    if ($conexion->connect_error) {
        die("ERROR conexión!");
    }
    return $conexion;
}
