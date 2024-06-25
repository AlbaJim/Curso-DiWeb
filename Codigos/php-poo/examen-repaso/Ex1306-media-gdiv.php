<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
// Ex1306-media-gdiv.php

// Creamos la función
function mgd($num) {
    $divisores = 0;
    $dividendo = 1;     // Ej: 6x3x2x1 si ponemos 0, sale 0
    for ($i = $num; $i >= 1; $i--) { 
        if($num % $i == 0) {
            $divisores ++;
            $dividendo  = $dividendo * $i;
        }
    }
    return $dividendo / $divisores;
}
$mensaje = "";
if (isset($_REQUEST['enviar'])) {
    $num = $_REQUEST['num'];            // number
    /*
    if($num < 1000 || $num > 10000) {
        $mensaje = "Num incorrecto";
    } else {
        $mensaje = mgd($num);
    }
    */
    $mensaje = mgd($num);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - POO - Clases</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
</head>

<body>
    <main class="w-70 p-3 m-3 border border-secondary rounded-4">
        <h1 class="bg-primary text-white text-center">
            PHP con POO: Clases</h1>
        <section>
            <p class="alert alert-info">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    echo $num. "<br>";          // number
                    echo $mensaje. "<br>";      
                }
                ?>
            </p>
        </section>
        <section class="w-50">
            <form action="#" method="post" class="form">
                <label for="num" class="form-label">Número</label>
                <input type="number" name="num" id="num" class="form-control"><br>
                <br><br>
                <input type="submit" value="Enviar" name="enviar" class="btn btn-outline-primary">
            </form>
        </section>
    </main>

</body>

</html>