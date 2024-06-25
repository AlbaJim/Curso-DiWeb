<?php
require("errores.php");
require("funciones.php");
// 06-borrar.php

// Conectar a MYSQL
$conexion = conectar();
?>

<?php
if (isset($_REQUEST["alumno"])) {
    $nombre = $_REQUEST["alumno"];
    $mensaje = "¿Desea borrar fila de ". $nombre . "?";
}
?>


<?php
if (isset($_REQUEST["eliminar"])) {
    $nombre = $_REQUEST["eliminar"];
    $sql = "DELETE FROM Alumnos WHERE nombre = ?";
    $sentPrepada = $conexion->prepare($sql);
    $sentPrepada->bind_param("s", $nombre);
    $sentPrepada->execute();
    $mensaje = "Fila borrada!";
}
?>

<?php
// Realizar una consulta 
$sql = "SELECT * FROM Alumnos";
$filas = $conexion->query($sql);
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

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Nacimiento</th>
                        <th>Aula</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $alumnos = $filas->fetch_all(MYSQLI_ASSOC);
                    foreach ($alumnos as $alumno) {
                    ?>
                        <tr>
                            <td><?php echo $alumno['nombre'] ?></td>
                            <td><?php echo $alumno['edad'] ?></td>
                            <td><?php echo $alumno['sexo'] ?></td>
                            <td><?php echo $alumno['fechanac'] ?></td>
                            <td><?php echo $alumno['numAula'] ?></td>
                            <td><a href="06-borrar.php?alumno=<?php echo $alumno['nombre'] ?>"
                            class="btn btn-outline-danger"> Borrar</a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>

        <p class="alert alert-info">
            <?php
            if (isset($_REQUEST["alumno"]) 
                || isset($_REQUEST["eliminar"])) {
                echo $mensaje;
            }
            if (isset($_REQUEST["alumno"])) {
            ?>  
            <a href="06-borrar.php?eliminar=<?php echo $nombre ?>"
                            class="btn btn-outline-danger"> SI</a>
            <a href="06-borrar.php"
                            class="btn btn-outline-success"> NO</a>                
            <?php
            }
            ?>
        </p>
        <hr>
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