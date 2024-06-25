<?php
// 02-estructuras-control.php

// Condicional if..else (SI...NO)
$edad = 18;
if ($edad >= 18) {
    echo "Puedes votar <br>";
    echo "Enhorabuena!! <br>";
} else {
    echo "NO puedes votar <br>";
}
echo "------------------------ <br>";

$edad = 8;
// Condicional if ... else if ... (SI ... NO, SI...)
// Condicional anidado
if ($edad >= 18) {
    echo "Puedes votar <br>";
    echo "Enhorabuena!! <br>";
} else if ($edad >= 3) {
    echo "Tienes que ir al cole! <br>";
} else {
    echo "A  la guarderia!<br>";
}
echo "------------------------ <br>";
// switch
$edad = 1;
switch ($edad) {
    case ($edad >= 18):
        echo "Puedes votar <br>";
        echo "Enhorabuena!! <br>";
        break;
    case $edad >= 3:
        echo "Tienes que ir al cole! <br>";
        break;

    default:
        echo "A  la guarderia!<br>";
        break;
}

echo "------------------------ <br>";
$opcion = 4;
switch ($opcion) {
    case 1: echo "Sumar! <br>";             break;
    case 2: echo "Restar! <br>";            break;
    case 3: echo "Multiplicar! <br>";       break;
    case 4: echo "Dividir! <br>";           break;
    default: echo "Opción incorrecta <br>"; break;
}

// pero no siempre usaremos break en un switch...case
$dia = "martes";

switch ($dia) {
    case 'lunes':
    case 'martes':
    case 'miércoles':
    case 'jueves':
    case 'viernes':
        echo "Toca dar clase <br>";
        break;

    default:
        echo "No hay clase <br>";
        break;
}