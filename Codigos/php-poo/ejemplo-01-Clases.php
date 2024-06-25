<?php
// diweb2023/Codigos/php-poo/ejemplo-01-Clases.php

// Por convención la clase se pone la primera en mayúsculas
// IMPORTANTE: Las clases van antes del isset
class Camion {
    // Atributos con valores por defecto
    public $modelo = "Volvo Fh Electric";
    public $precio = 500000;
    public $electrico = true;
    
    // Constructor
    public function __construct($modelo, $precio, $electrico)
    {
        $this->modelo = $modelo;
        $this->precio = $precio;
        $this->electrico = $electrico;
    }

    // Permite sacar los datos del objeto
    public function __toString()
    {
        // Defino la salida del booleano
        $valorElectrico = "No";
        if($this->electrico) {
            $valorElectrico = "Si";
        }
        // Devuelvo la cadena con los datos del objeto
        return  "CAMIÓN: Modelo $this->modelo <br>
                 Precio: $this->precio <br>
                 Electrico: $valorElectrico ";
    }
}

// Si se envía el formulario...
if (isset($_REQUEST['enviar'])) {
    $texto = $_REQUEST['texto'];        // String
    $num = $_REQUEST['num'];            // number
    $opcion = $_REQUEST['opcion'];      // boolean

    // Creo un objeto
    $camion = new Camion($texto, $num, $opcion);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0">
    <title>PHP - POO - Clases</title>

    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
</head>

<body>
    <main class="w-70 p-3 m-3 border border-secondary rounded-4">
        <h1 class="bg-primary text-white text-center">
            PHP con POO: Clases</h1>

        <section>
            <p class="alert alert-info">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    /*
                    echo $texto. "<br>";        // String
                    echo $num. "<br>";          // number
                    echo $opcion. "<br>";        // boolean
                    */
                    echo $camion;
                }
                ?>
            </p>
        </section>
        <section class="w-50">
            <form action="#" method="post" class="form">
                <label for="texto" class="form-label">Modelo</label>
                <input type="text" name="texto" id="texto" class="form-control"><br>
                <label for="num" class="form-label">Precio</label>
                <input type="number" name="num" id="num" class="form-control"><br>
                <hr><br>
                <p>Electrico</p>
                <input type="radio" name="opcion" id="opcion1" class="form-check-input" checked value="1">
                <label for="opcion1" class="form-check-label">Si</label><br>
                <input type="radio" name="opcion" id="opcion2" class="form-check-input" value="0">
                <label for="opcion2" class="form-check-label">No</label><br><br>
                <input type="submit" value="Enviar" name="enviar" class="btn btn-outline-primary">
            </form>
        </section>
    </main>

</body>

</html>