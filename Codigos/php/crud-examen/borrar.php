<?php
require("errores.php");
require("funciones.php");
// borrar.php

// Conectar a MYSQL
$conexion = conectar();
?>

<?php
if (isset($_REQUEST["alumno"])) {
    $nombre = $_REQUEST["alumno"];
    $mensaje = "¿Desea borrar fila de " . $nombre . "?";
}
?>


<?php
if (isset($_REQUEST["borrar"])) {
    $id = $_REQUEST["borrar"];
    $sql = "DELETE FROM reservas WHERE id = ?";
    $sentPrepada = $conexion->prepare($sql);
    $sentPrepada->bind_param("i", $id);
    $sentPrepada->execute();
    $mensaje = "Fila borrada!";
}
?>

<?php
// Realizar una consulta filtrada
if (isset($_REQUEST["eliminar"])) {
    $id = $_REQUEST["eliminar"];
    $sql = "SELECT * FROM reservas WHERE id = ?";
    $sentPreparada = $conexion->prepare($sql);

    /**
     * Vinculaciones:
     * - i -> int, bool (enteros y booleanos)
     * - s -> string, date (cadenas y fechas)
     * - d -> float y decimal (flotantes y decimales)
     */
    $sentPreparada->bind_param("i", $id);

    $sentPreparada->execute();
    $fila = $sentPreparada->get_result();
    $fila = $fila->fetch_all(MYSQLI_ASSOC);
    //var_dump($fila);
    $mensaje = "¿Borrar registro?";
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
        <?php
        if (isset($_REQUEST["eliminar"])) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Habitación</th>
                        <th>Pagado</th>
                        <th>Importe</th>>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($fila as $reserva) {
                    ?>
                        <tr>
                            <td><?php echo $reserva['id'] ?></td>
                            <td><?php echo $reserva['cliente'] ?></td>
                            <td><?php echo $reserva['entrada'] ?></td>
                            <td><?php echo $reserva['salida'] ?></td>
                            <td><?php echo $reserva['hab'] ?></td>
                            <td><?php echo $reserva['pagado'] ?></td>
                            <td><?php echo $reserva['importe'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        <?php
        }
        ?>
        <p class="alert alert-danger">
            <?php
            if (isset($_REQUEST["eliminar"])
            ||isset($_REQUEST["borrar"])) {
                echo $mensaje;
            }
            if (isset($_REQUEST["eliminar"])) {
            ?>
                <a href="borrar.php?borrar=<?php echo $fila[0]['id'] ?>" class="btn btn-outline-danger"> SI</a>
                <a href="reservas.php" class="btn btn-outline-success"> NO</a>
            <?php
            }   
            ?>
        </p>
        <hr>
        <br>
        <section class="row">
            <nav class="col">
                <a href="menu.php" class="btn btn-sm btn-success w-100">Volver al menú</a><br><br>
            </nav>
        </section>
    </main>

</body>

</html>