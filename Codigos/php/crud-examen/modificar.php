<?php
require("errores.php");
require("funciones.php");
// modificar.php

// Conectar a MYSQL
$conexion = conectar();
?>


<?php
if (isset($_REQUEST["editar"])) {
    $id = $_REQUEST["editar"];

    $sql = "SELECT * FROM reservas WHERE id = ?";
    $sentPreparada = $conexion->prepare($sql);
    $sentPreparada->bind_param("i", $id);
    $sentPreparada->execute();
    $fila = $sentPreparada->get_result();
    $fila = $fila->fetch_all(MYSQLI_ASSOC);

    //var_dump($fila);
    $mensaje = "Vas a actualizar la fila: " . $id;
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
            if (isset($_REQUEST["editar"])) {
                echo $mensaje;
            }
            ?>
        </p>
        <hr>
        <?php
        if (isset($_REQUEST["editar"])) {
        ?>
            <form action="actualizar.php" method="post" class="form w-50 text-light">

                <label for="id" class="form-label">ID</label>
                <input type="number" name="id" id="id" 
                class="form-control text-bg-secondary" disabled = "disabled"
                value="<?php echo $fila[0]['id'] ?>"><br>
                <input type="hidden" name="id"
                value="<?php echo $fila[0]['id'] ?>">

                <label for="cliente" class="form-label">Cliente</label>
                <input type="text" name="cliente" id="cliente" 
                class="form-control" 
                value="<?php echo $fila[0]['cliente'] ?>"><br>

                <label for="entrada" class="form-label">Entrada</label>
                <input type="date" name="entrada" id="entrada" 
                class="form-control" 
                value="<?php echo $fila[0]['entrada'] ?>"><br>

                <label for="salida" class="form-label">Salida</label>
                <input type="date" name="salida" id="salida" 
                class="form-control" 
                value="<?php echo $fila[0]['salida'] ?>"><br>

                <label for="hab" class="form-label">Habitación</label>
                <input type="number" name="hab" id="hab" 
                class="form-control" 
                value="<?php echo $fila[0]['hab'] ?>"><br>

                <p>Pagado</p>
                <?php if ($fila[0]['pagado']) {
                ?>
                    <input type="radio" name="pagado" id="si" value="1" 
                    class="form-check-input" checked="checked">
                    <label for="si" class="form-check-label">SI</label><br>
                    <input type="radio" name="pagado" id="no" value="0" 
                    class="form-check-input">
                    <label for="no" class="form-check-label">NO</label><br>
                <?php
                } ?>
                <?php if (!$fila[0]['pagado']) {
                ?>
                    <input type="radio" name="pagado" id="si" value="1" 
                    class="form-check-input" >
                    <label for="si" class="form-check-label">SI</label><br>
                    <input type="radio" name="pagado" id="no" value="0" 
                    class="form-check-input" checked="checked">
                    <label for="no" class="form-check-label">NO</label><br>
                <?php
                } ?>

                <label for="importe" class="form-label">Importe</label>
                <input type="number" name="importe" id="importe" 
                class="form-control" step="0.5"
                value="<?php echo $fila[0]['importe'] ?>"><br>

                <input type="submit" value="Actualizar Registro" name="enviar" class="form-control border border-danger bg-warning text-bg-light">
            </form>
        <?php
        }
        ?>

        <br>
        <section class="row">
            <nav class="col">
                <a href="menu.php" class="btn btn-sm btn-primary w-100">Volver al Menú</a><br><br>
            </nav>
        </section>
    </main>

</body>

</html>