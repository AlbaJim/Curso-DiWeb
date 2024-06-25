<?php
// diweb2023/Codigos/php-poo/ejemplo-03-herencia.php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

class Camion {
    // Atributos con valores por defecto
    public $modelo = "Volvo Fh Electric";
    private $precio = 500000;
    public $electrico = true;
    
    // Constructor
    public function __construct ($modelo, $precio, $electrico)  {
        $this->electrico = $electrico;
        $this->modelo = $modelo;
        $this->setPrecio($precio); 
    }

    // Setter y Getter
    public function setPrecio ($precio) {
        if($precio > 100000) {
            $this->precio = $precio;
        }
    }

    public function getPrecio () {
        return $this->precio;
    }

    // Permite sacar los datos del objeto
    public function __toString() {
        $valorElectrico = "No";
        if($this->electrico) {
            $valorElectrico = "Si";
        }

        return  "CAMIÓN: Modelo $this->modelo <br>
                 Precio: " . $this->getPrecio(). "<br>" .
                 "Electrico: $valorElectrico ";
    }
}

// Clase hija usando la palabra reservada extends
// Se hereda TODO: atributos y métodos
class TrenCarretera extends Camion {
    // Atributo de la clase hija
   public $remolque2 = false;

   // En el constructor uso el del padre (parent::__)
   public function __construct($modelo, $precio, $electrico, $remolque) {
        parent::__construct($modelo, $precio, $electrico);
        $this->remolque2 = $remolque;
   }

   public function __toString()
   {
        // Usamos ternarios: <atributo> ? valorTrue : valorFalse
        // OJO a los parentesis en ($this->..."No")
        return parent::__toString() . "<br>" .
        "Remolque: " . ($this->remolque2 ? "Si" : "No"); 
   }
}

// Si se envía el formulario...
if (isset($_REQUEST['enviar'])) {
    $modelo = $_REQUEST['texto'];        // String
    $precio = $_REQUEST['num'];            // number
    $electrico = $_REQUEST['opcion'];      // boolean

    // Creo un objeto TrenCarretera
    // $camion = new Camion($modelo, $precio, $electrico);
    $trenCarretera = new TrenCarretera($modelo, $precio, $electrico, true);
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
            PHP con POO: Herencia con Encapsulamiento</h1>
        <section>
            <p class="alert alert-info">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    //echo $camion;
                    echo $trenCarretera;
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