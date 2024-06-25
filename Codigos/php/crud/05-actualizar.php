<?php
require("errores.php");
require("funciones.php");
// 05-actualizar.php

// Conectar a MYSQL
$conexion = conectar();
?>

<?php
// Tratar formulario
if (isset($_REQUEST["enviar"])) {

    $nombre = $_REQUEST["nombre"];
    $edad = $_REQUEST["edad"];
    $sexo = $_REQUEST["sexo"];
    $nac = $_REQUEST["nac"];
    $numaula = $_REQUEST["numaula"];

    $sql = "UPDATE Alumnos 
            SET edad = ?, sexo = ?, fechanac = ?, numAula = ?
            WHERE nombre = ?";
    $sentPreparada = $conexion->prepare($sql);
    $sentPreparada->bind_param("iisis", 
        $edad, $sexo, $nac, $numaula, $nombre);

    if($sentPreparada->execute()) {
        $mensaje = "Actualizado/a Alumno/a en la BBDD";
    } else {
        $mensaje = "ERROR!";
    }
    
}
?>


<?php
if (isset($_REQUEST["alumno"])) {
    $nombre = $_REQUEST["alumno"];

    $sql = "SELECT * FROM Alumnos WHERE nombre = ?";
    $sentPreparada = $conexion->prepare($sql);
    $sentPreparada->bind_param("s", $nombre);
    $sentPreparada->execute();
    $fila = $sentPreparada->get_result();
    $fila = $fila->fetch_all(MYSQLI_ASSOC);

    //var_dump($fila);
    $mensaje = "Vas a actualizar la fila: " . $nombre;
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
                        <td><a href="05-actualizar.php?alumno=<?php echo $alumno['nombre'] ?>" 
                        class="btn btn-outline-success"> Actualizar</a></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

        <p class="alert alert-info">
            <?php
            if (isset($_REQUEST["alumno"])) {
                echo $mensaje;
            }
            ?>
        </p>
        <hr>
        <?php
        if (isset($_REQUEST["alumno"])) {
        ?>
            <form action="#" method="post" class="form w-50 text-light">

                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" 
                class="form-control text-bg-secondary" disabled = "disabled"
                value="<?php echo $fila[0]['nombre'] ?>"><br>
                <input type="hidden" name="nombre"
                value="<?php echo $fila[0]['nombre'] ?>">

                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" value="<?php echo $fila[0]['edad'] ?>"><br>

                <p>Sexo</p>
                <?php if ($fila[0]['sexo']) {
                ?>
                    <input type="radio" name="sexo" id="mujer" value="1" class="form-check-input" checked="checked">
                    <label for="mujer" class="form-check-label">Mujer</label><br>
                    <input type="radio" name="sexo" id="hombre" value="0" class="form-check-input">
                    <label for="hombre" class="form-check-label">Hombre</label><br>
                <?php
                } ?>
                <?php if (!$fila[0]['sexo']) {
                ?>
                    <input type="radio" name="sexo" id="mujer" value="1" class="form-check-input" >
                    <label for="mujer" class="form-check-label">Mujer</label><br>
                    <input type="radio" name="sexo" id="hombre" value="0" class="form-check-input" checked="checked">
                    <label for="hombre" class="form-check-label">Hombre</label><br>
                <?php
                } ?>

                <hr>
                <label for="nac" class="form-label">Fecha Nacimiento</label>
                <input type="date" name="nac" id="nac" class="form-control" value="<?php echo $fila[0]['fechanac'] ?>"><br>
               
                <!-- INVESTIGAR como cargar un option especifico! -->
                <select name="numaula" id="numaula" class="form-select">
                    <option value="23">Aula23</option>
                </select><br>
                <input type="submit" value="Actualizar Registro" name="enviar" class="form-control border border-danger bg-warning text-bg-light">
            </form>
        <?php
        }
        ?>

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