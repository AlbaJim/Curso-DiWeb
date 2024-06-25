<?php
require("errores.php");
// 04-formularios.php
?>

<?php
// Tratar formulario
if (isset($_REQUEST["enviar"])) {
    $nombre = $_REQUEST["nombre"];
    $edad = $_REQUEST["edad"];
    $sexo = $_REQUEST["sexo"];
    $nac = $_REQUEST["nac"];

    echo $nombre . "<br>";
    echo $edad . "<br>";
    echo $sexo . "<br>";
    echo $nac . "<br>";
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
                echo "Misión completada";
            }
            ?>
        </p>
        <hr>
        <form action="#" method="post" class="form w-50 text-light">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"><br>
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control"><br>
            <label for="nac" class="form-label">Fecha Nacimiento</label>
            <input type="date" name="nac" id="nac" class="form-control"><br>

            <input type="radio" name="sexo" id="mujer" value="true" class="form-check-input"
            checked = "checked">
            <label for="mujer" class="form-check-label">Mujer</label><br>
            <input type="radio" name="sexo" id="hombre" value="false" class="form-check-input">
            <label for="hombre" class="form-check-label">Hombre</label><br>

            <input type="submit" value="Enviar" name="enviar"
            class="form-control border border-danger bg-warning text-bg-light">
        </form>
        <br>
    </main>

</body>

</html>