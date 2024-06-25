<?php
require("errores.php");
// registrar.php

// Conectar a MYSQL
$servidor = "localhost";
$usuario = "root";
$clave = "root";
$bbdd = "islantilla";

$conexion = new mysqli($servidor, $usuario, $clave, $bbdd);
if ($conexion->connect_error) {
    die("ERROR conexión!");
}
?>

<?php
// Tratar formulario
if (isset($_REQUEST["enviar"])) {

    $id = $_REQUEST["id"];
    $cliente = $_REQUEST["cliente"];
    $entrada = $_REQUEST["entrada"];
    $salida = $_REQUEST["salida"];
    $habitacion = $_REQUEST["habitacion"];
    $pagado = $_REQUEST["pagado"];
    $importe = $_REQUEST["importe"];

    
    $sql = "INSERT INTO reservas VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sentPreparada = $conexion->prepare($sql);
    $sentPreparada->bind_param("isssiid", 
        $id, $cliente, $entrada, $salida, 
        $habitacion, $pagado, $importe);
    if($sentPreparada->execute()) {
        $mensaje = "Inserción Correcta!";
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

            <label for="id" class="form-label">ID</label>
            <input type="number" name="id" id="id" class="form-control"><br>
            <label for="cliente" class="form-label">Nombre</label>
            <input type="text" name="cliente" id="cliente" class="form-control"><br>
            
            <label for="entrada" class="form-label">Entrada</label>
            <input type="date" name="entrada" id="entrada" class="form-control"><br>
            <label for="salida" class="form-label">Salida</label>
            <input type="date" name="salida" id="salida" class="form-control"><br>
            
            <label for="habitacion" class="form-label">Habitación</label>
            <input type="number" name="habitacion" id="habitacion" class="form-control"><br>

            <p>Pagado</p>
            <input type="radio" name="pagado" id="si" value="1" class="form-check-input" checked="checked">
            <label for="si" class="form-check-label">SI</label><br>
            <input type="radio" name="pagado" id="no" value="0" class="form-check-input">
            <label for="no" class="form-check-label">NO</label><br>

            <hr>
            <label for="importe" class="form-label">Importe</label>
            <input type="number" name="importe" id="importe" 
            class="form-control" step="0.5"><br>
            <input type="submit" value="Insertar Reserva" name="enviar" class="form-control border border-danger bg-warning text-bg-light">
        </form>
        <br>
        <section class="row">
            <nav class="col">
                <a href="menu.php" class="btn btn-sm btn-dark w-100">Volver al Menú</a><br><br>
            </nav>
        </section>
    </main>

</body>

</html>