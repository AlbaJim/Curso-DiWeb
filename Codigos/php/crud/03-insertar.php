<?php
require("errores.php");
// 03-insertar.php

// Conectar a MYSQL
$servidor = "localhost";
$usuario = "root";
$clave = "root";
$bbdd = "anidi";

$conexion = new mysqli($servidor, $usuario, $clave, $bbdd);
if ($conexion->connect_error) {
    die("ERROR conexión!");
}
?>

<?php
// Tratar formulario
if (isset($_REQUEST["enviar"])) {

    $nombre = $_REQUEST["nombre"];
    $edad = $_REQUEST["edad"];
    $sexo = $_REQUEST["sexo"];
    $nac = $_REQUEST["nac"];
    $numaula = $_REQUEST["numaula"];

    /*
    echo $nombre . "<br>";
    echo $edad . "<br>";
    echo $sexo . "<br>";
    echo $nac . "<br>";
    echo $numaula . "<br>";  
    */
    
    $sql = "INSERT INTO Alumnos VALUES (?, ?, ?, ?, ?)";
    $sentPreparada = $conexion->prepare($sql);
    $sentPreparada->bind_param("siisi", 
        $nombre, $edad, $sexo, $nac, $numaula);
    if($sentPreparada->execute()) {
        $mensaje = "Insertada Alumno/a en la BBDD";
    } else {
        $mensaje = "ERROR!";
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

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"><br>
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control"><br>

            <p>Sexo</p>
            <input type="radio" name="sexo" id="mujer" value="1" class="form-check-input" checked="checked">
            <label for="mujer" class="form-check-label">Mujer</label><br>
            <input type="radio" name="sexo" id="hombre" value="0" class="form-check-input">
            <label for="hombre" class="form-check-label">Hombre</label><br>

            <hr>
            <label for="nac" class="form-label">Fecha Nacimiento</label>
            <input type="date" name="nac" id="nac" class="form-control"><br>
            <select name="numaula" id="numaula" class="form-select">
                <option value="23">Aula23</option>
            </select><br>
            <input type="submit" value="Insertar Registro" name="enviar" class="form-control border border-danger bg-warning text-bg-light">
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
