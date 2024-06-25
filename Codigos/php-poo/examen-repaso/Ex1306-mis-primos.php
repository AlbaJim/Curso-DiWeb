<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
function esPrimo($num)
{
    $resultado = 0;
    // Ejemplo: $num = 6
    // i = 6,5,4,3,2,1
    // 6/6 r=0 -> divisores = 1
    // 6/3 r=0 -> divisores = 2 ........
    $divisores = 0;
    for ($i = $num; $i >= 1; $i--) {
        if ($num % $i == 0) {
            $divisores++;
        }
    }
    if ($divisores <= 2) {
        $resultado = 1;
    }
    return $resultado;
}

function verPrimos($num)
{
    $primos = [];
    $contador = 0;

    for ($i = 1; $i < 1000; $i++) {
        $resultado = esPrimo($i); 
        if($resultado ==1) {
            $primos[] = $i;
            $contador++;
        }
        if($contador == $num) {
            break;
        }
    }

    return $primos;
}

?>

<?php
// ejemplo-00-Plantilla.php
// SCRIPT PRINCIPAL
if (isset($_REQUEST['enviar'])) {
    $num = $_REQUEST['num'];            // number

    /*
    $mensaje = "No es primo";
    $resultado = 0;
    $resultado = esPrimo($num);
    if ($resultado == 1) {
        $mensaje = "Es primo";
    }
    */
    $patata = verPrimos($num);
    
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
                    echo $num . "<br>";          // number
                    $mensaje = var_dump($patata);
                }
                ?>
            </p>
        </section>
        <section class="w-50">
            <form action="#" method="post" class="form">
                <label for="num" class="form-label">Número</label>
                <input type="number" name="num" id="num" class="form-control"><br>
                <hr><br>
                <input type="submit" value="Enviar" name="enviar" class="btn btn-outline-primary">
            </form>
        </section>
    </main>

</body>

</html>