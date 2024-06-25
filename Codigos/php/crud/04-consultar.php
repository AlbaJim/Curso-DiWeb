<?php
require("errores.php");
require("funciones.php");
// 04-consultar.php

// Conectar a MYSQL
$conexion = conectar();
?>

<?php
// Realizar una consulta 
$sql = "SELECT * FROM Alumnos";
$filas = $conexion->query($sql);
$numFilas = $filas->num_rows;
$mensaje = "Nº de registros: " . $numFilas;
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

        <?php
        // Tratar tabla
        if (isset($_REQUEST["enviar"])) {
        ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Nacimiento</th>
                        <th>Aula</th>
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
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>

        <?php
        }
        ?>

        <p class="alert alert-info">
            <?php
            if (isset($_REQUEST["enviar"])) {
                echo $mensaje;
            }
            ?>
        </p>
        <hr>
        <form action="#" method="post" class="form w-50 text-light">
            <input type="submit" value="Consultar Tabla" name="enviar" class="form-control border border-danger bg-warning text-bg-light">
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