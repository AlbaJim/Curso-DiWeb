<?php
require("errores.php");
// 01-cargar-bbdd.php

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
    $archivoSQL = "anidi.sql";
    $contenidoSQL = file_get_contents($archivoSQL);
    $cargaBBDD = $conexion->multi_query($contenidoSQL);
    if ($cargaBBDD) {
        $mensaje = "BBDD cargado BIEN";
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
                <a href="01-cargar-bbdd.php" class="btn btn-sm btn-dark w-100">CargarBBDD</a><br><br>
                <a href="02-login.php" class="btn btn-sm btn-primary w-100">Acceso</a><br><br>
                <a href="03-insertar.php" class="btn btn-sm btn-warning w-100">Insertar</a><br><br>
            </nav>
            <nav class="col">
                <a href="04-consultar.php" class="btn btn-sm btn-success w-100">Consultar</a><br><br>
                <a href="05-actualizar.php" class="btn btn-sm btn-secondary w-100">Actualizar</a><br><br>
                <a href="06-borrar.php" class="btn btn-sm btn-danger w-100">Borrar</a><br><br>
            </nav>
        </section>
    </main>

</body>

</html>