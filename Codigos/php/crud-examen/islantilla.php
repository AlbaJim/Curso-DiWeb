<?php
require("errores.php");
// islantilla.php

// Conectar a MYSQL
$servidor = "localhost";
$usuario = "root";
$clave = "root";

$conexion = new mysqli($servidor, $usuario, $clave);
if ($conexion->connect_error) {
    die("ERROR conexión!");
}
?>

<?php
// Tratar formulario
if (isset($_REQUEST["enviar"])) {
    $archivoSQL = "examen.sql";
    $contenidoSQL = file_get_contents($archivoSQL);
    $cargaBBDD = $conexion->multi_query($contenidoSQL);
    if ($cargaBBDD) {
        $mensaje = "Inserción Correcta";
    } else {
        $mensaje = "ERROR";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <br>
    <main class="container align-center w-50 bg-info p-3">
        <p class="alert alert-info">
            <?php
            if (isset($_REQUEST["enviar"])) {
                echo $mensaje;
            }
            ?>
        </p>
        <hr>
        <form action="#" method="post" class="form w-50 text-light">
            <input type="submit" value="Cargar SQL" name="enviar" class="form-control border border-danger bg-warning text-bg-light">
        </form>
        <br>
        <section class="row">
            <nav class="col">
                <a href="menu.php" class="btn btn-sm btn-danger w-100">Volver Menú</a><br><br>
            </nav>

        </section>
    </main>

</body>

</html>