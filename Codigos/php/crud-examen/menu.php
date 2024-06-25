<?php
require("errores.php");
// menu.php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <br>
    <main class="container align-center w-50 bg-info p-3 text-center">
        <p class="alert alert-info">
            MENU PRINCIPAL
        </p>
        <hr>
        <br>
        <section class="row">
            <nav class="col">
                <a href="islantilla.php" class="btn btn-sm btn-dark w-100">Instalar BBDD</a><br><br>
                <a href="reservas.php" class="btn btn-sm btn-primary w-100">Consulta Tabla</a><br><br>
            </nav>
        </section>
    </main>

</body>

</html>