<?php

// 03-bucles.php
// Bucle indefinido (while)
$a = 1;
while ($a <= 10) {
    echo "$a <br>";
    $a++;
}
echo "--------------------- <br>";

// Bucle definido (for)
for ($a = 1; $a <= 10; $a++) {
    echo "$a <br>";
}
echo "--------------------- <br>";

// Bucle definido (for) añadiendo continue
for ($a = 1; $a <= 10; $a++) {
    if ($a == 5) {
        continue;
    }
    echo "$a <br>";
}
echo "--------------------- <br>";

// Bucle completo (foreach)
foreach (range(1, 10) as $a) {
    echo "$a <br>";
}
