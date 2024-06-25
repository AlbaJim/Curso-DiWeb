<?php
// diweb2023/Codigos/php-poo/ejemplo-02-encapsulamiento.php
// Control de errores
ini_set('display_errors', 1); // Muestra los errores en la pantalla
ini_set('display_startup_errors', 1); // Muestra los errores de inicio
error_reporting(E_ALL); // Reporta todos los errores de PHP
ini_set('error_log', 'errores.log');
ini_set('log_errors', 1);

class Camion {
    // Atributos con valores por defecto
    public $modelo = "Volvo Fh Electric";
    private $precio = 500000;
    private $electrico = true;
    
    // Constructor
    public function __construct($modelo, $precio, $electrico)
    {
        $this->modelo = $modelo;
        //$this->precio = $precio;
        //$this->electrico = $electrico;
        // Ahora para asignar usamos los setter
        $this->setPrecio($precio);
        $this->setElectrico($electrico);
    }

    // Setter y Getter
    // Controlo que el camión como mínimo vale 100000€
    public function setPrecio ($precio) {
        if($precio > 100000) {
            $this->precio = $precio;
        }
    }

    public function setElectrico ($electrico) {
            $this->electrico = $electrico;
    }

    public function getPrecio () {
        return $this->precio;
    }

    // Para booleanos se pone is<atributo>
    public function isElectrico () {
        return $this->electrico;
    }

    // Permite sacar los datos del objeto
    public function __toString()
    {
        // Defino la salida del booleano
        $valorElectrico = "No";
        //if($this->electrico) {
        if($this->isElectrico()) {
            $valorElectrico = "Si";
        }
        // Devuelvo la cadena con los datos del objeto
        return  "CAMIÓN: Modelo $this->modelo <br>
                 Precio: " . $this->getPrecio(). "<br>" .
                 "Electrico: $valorElectrico ";
    }
}

// Si se envía el formulario...
if (isset($_REQUEST['enviar'])) {
    $texto = $_REQUEST['texto'];        // String
    $num = $_REQUEST['num'];            // number
    $opcion = $_REQUEST['opcion'];      // boolean

    // Creo un objeto
    $camion = new Camion($texto, $num, $opcion);
    // Cambio el valor del camión
    //$camion->precio = -50000;
    $camion->setPrecio(500000);
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