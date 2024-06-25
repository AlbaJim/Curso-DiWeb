<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
// Ex1306-menu.php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - POO - Clases</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
</head>

<body>
    <main class="w-70 p-3 m-3 border border-secondary rounded-4">
        <h1 class="bg-primary text-white text-center">
        Ex1306-menu</h1>
        <section>
            <p class="alert alert-info">
                MENU PRINCIPAL
            </p>
        </section>
        <section class="w-50 row">
            <nav class="col">
                <a href="Ex1306-media-gdiv.php" 
                class="btn btn-outline-info">MediaGDivisores</a><br><br>
                <a href="Ex1306-camion.php" 
                class="btn btn-outline-danger">Camión</a><br><br>
            </nav>
            <nav class="col">
                <a href="Ex1306-mis-primos.php" 
                class="btn btn-outline-primary">MisPrimos</a><br><br>
                <a href="Ex1306-tussam.php" 
                class="btn btn-outline-warning">Tussam</a><br><br>
            </nav>
        </section>
    </main>

</body>

</html>