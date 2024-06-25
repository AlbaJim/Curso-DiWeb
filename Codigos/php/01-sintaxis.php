<?php
// 01-sintaxis.php
require("errores.php");

echo "Hola mundo <br>";

$x = 20;
$y = 6;
$z = $x / $y;
$w = $x % $y;

echo "$z <br>";
echo "$w <br>";

// Tabla o Array Unidimensional
/* Variable con varios datos
Cada dato se asocia con un indice (0,1,2...N)
*/
$numeros = [3, 6, 1, 8, 2];
echo "$numeros[3] <br>";
echo $numeros[0] + $numeros[4] . "<br>";

/* Arrays asociativos */
$alumna1 = array(
    "nombre" => "Esther",
    "sexo" => true,
    "edad" => 46,
    "sueldo" => 2350.55
);
echo $alumna1["nombre"] . "<br>";
echo $alumna1["edad"] . "<br>";
echo $alumna1["sueldo"] . "Euros" . "<br>";



// Operadores Post Incremento/Decremento
$num = 7;
$num++;     // $num = $num +1;
echo $num . "<br>";
$num--;
echo $num . "<br>";

$base = 2;
$exponente = 4;
$potencia = $base ** $exponente;
echo $potencia . "<br>";
