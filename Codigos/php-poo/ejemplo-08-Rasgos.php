<?php // diweb2023/Codigos/php-poo/ejemplo-08-rasgos.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Interfaces
interface iAcciones {
    public static function leeTren($modelo, $precio, 
    $electrico, $remolque, $marca);
    public static function crearFlota($modelo, $precio, 
    $electrico, $marca, $numCamiones);
}

interface iMetodos {
    public function __toString();
}

// Rasgos
trait MensajesAplicacion {
    public function inicio () {
        return "Bienvenidos <br><br>";
    }
    public function fin () {
        return "¡Hemos acabado!";
    }
}

abstract class Camion {
    public $modelo = "Volvo Fh Electric";
    private $precio = 500000;
    public $electrico = true;

    public function __construct($modelo, $precio, $electrico) {
        $this->electrico = $electrico;
        $this->modelo = $modelo;
        $this->setPrecio($precio);
    }

    public function setPrecio($precio) {
        if ($precio > 100000) {
            $this->precio = $precio;
        }
    }
    public function getPrecio()  {
        return $this->precio;
    }

    abstract public function __toString();
}

// Definimos la clase para la composición
class Remolque {
    public $marca = "";
    public $tara = 0.0;
    public function __construct($marca, $tara) 
    {
        $this->marca = $marca;
        $this->tara = $tara;
    }
    public function __toString() {
        return "Marca: $this->marca, Tara: $this->tara";
    }
}

// Clase hija (OJO, con la composición)
class TrenCarretera extends Camion implements iAcciones, iMetodos {
    // Usamos los traits
    use MensajesAplicacion;

    // Atributos de la clase hija
    public $remolque2 = false;
    public $remolquePrincipal;  // Composición
    // En el constructor uso el del padre (parent::__)
    public function __construct($modelo, $precio, 
        $electrico, $remolque, $marca)    {
        parent::__construct($modelo, $precio, $electrico);
        $this->remolque2 = $remolque;
        // Hago la composición
        $this->remolquePrincipal =  new Remolque($marca, 6.16);
    }   

    public static function leeTren($modelo, $precio, 
        $electrico, $remolque, $marca)    {
        return new TrenCarretera($modelo, $precio, 
            $electrico, $remolque, $marca);
    }

    // Vamos a definir otro método estático: crearFlota
    public static function crearFlota($modelo, $precio, 
    $electrico, $marca, $numCamiones) {
        // Defino el array de camiones
        $flota = [];

        // Añado camion por camion al array. Camiones serán iguales!
        for ($i=0; $i < $numCamiones; $i++) { 
            $nuevoTren = TrenCarretera::leeTren($modelo, 
                $precio, $electrico, true, $marca);
            $flota [] = $nuevoTren;
        }        

        $pintaCamiones = "";
        // Imprimimos los camiones (foreach)
        foreach ($flota as $num => $camion) {
            $pintaCamiones .=   "DATOS TREN CARRETERA Nº" . ($num + 1) 
                            .   "<br>" . $camion. "<br><br>";
        }
        return $pintaCamiones;
    }

    public function __toString() {
        $valorElectrico = "No";
        if ($this->electrico) {
            $valorElectrico = "Si";
        }

        // En el toString, añado el otro objeto (remolquePrincipal)
        return  "CAMIÓN: Modelo $this->modelo <br>
                Precio: " . $this->getPrecio() . "<br>" .
                "Electrico: $valorElectrico <br>" .
                "Remolque: " . ($this->remolque2 ? "Si" : "No") . "<br>" .
                "Datos Remolque: " . $this->remolquePrincipal;
    }
}

// Si se envía el formulario -> SCRIPT PRINCIPAL
if (isset($_REQUEST['enviar'])) {
    $modelo = $_REQUEST['texto'];           // String
    $precio = $_REQUEST['num'];             // number
    $marca = $_REQUEST['marca'];           // String
    $electrico = $_REQUEST['opcion'];       // boolean

    // En TrenCarretera la marca, va al final
    $trenCarretera = 
        new TrenCarretera($modelo, $precio, $electrico, true, $marca);
    $trenCarretera2 = 
        TrenCarretera::leeTren("Volvo FHT", $precio, true, true, $marca);

    // Sin embargo, en crearFlota, la marca será el penúltimo parámetro
    $flota = TrenCarretera::crearFlota($modelo, $precio, $electrico, $marca, 5);
}
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
            PHP con POO: Rasgos (con TODA LA POO)</h1>
        <section>
            <p class="alert alert-info">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    //echo $camion;
                    // Uso el trait con el método inicio
                    echo $trenCarretera->inicio();
                    echo $trenCarretera . "<br><br>";
                    echo $trenCarretera2 . "<br><br>";
                    echo $flota;
                    // Uso el trait con el método fin
                    echo $trenCarretera->fin();
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
                <label for="marca" class="form-label">Marca Remolque</label>
                <input type="text" name="marca" id="marca" class="form-control"><br>
                <hr><br><p>Electrico</p>
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