<?php
require("errores.php");
require("funciones.php");
// reservas.php

// Conectar a MYSQL
$conexion = conectar();
?>

<?php
// Realizar una consulta 
$sql = "SELECT * FROM reservas";
$filas = $conexion->query($sql);
$numFilas = $filas->num_rows;
$mensaje = "Nº de registros: " . $numFilas;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <br>
    <main class="container align-center w-70 bg-info p-3">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Habitación</th>
                    <th>Pagado</th>
                    <th>Importe</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $reservas = $filas->fetch_all(MYSQLI_ASSOC);
                
                foreach ($reservas as $reserva) {
                ?>
                    <tr>
                        <td><?php echo $reserva['id'] ?></td>
                        <td><?php echo $reserva['cliente'] ?></td>
                        <td><?php echo $reserva['entrada'] ?></td>
                        <td><?php echo $reserva['salida'] ?></td>
                        <td><?php echo $reserva['hab'] ?></td>
                        <td><?php echo $reserva['pagado'] ?></td>
                        <td><?php echo $reserva['importe'] ?></td>
                        <td><a href="modificar.php?editar=<?php echo $reserva['id']?>"
                        class="btn btn-outline-success">
                        Editar</a></td>
                        <td><a href="borrar.php?eliminar=<?php echo $reserva['id']?>"
                        class="btn btn-outline-danger">Eliminar</a></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

        <p class="alert alert-info">
            <?php
            if (isset($_REQUEST["enviar"])) {
                echo $mensaje;
            }
            ?>
        </p>
        <hr>
        <br>
        <section class="row">
            <nav class="col">
                <a href="registrar.php" class="btn btn-sm btn-dark w-100">Registrar</a><br><br>
                <a href="menu.php" class="btn btn-sm btn-primary w-100">Volver al Menú</a><br><br>
            </nav>
        </section>
    </main>

</body>

</html>