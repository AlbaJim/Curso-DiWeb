<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php 
// Fragmento de POO
// 1. Interfaces
interface Metodos1 {
    public static function darAlta();
}

interface Metodos2 {
    public function darBaja();
}

// 2. Traits
trait Gestion1 {
    public function usar() {
        return "Vehículo en uso";
    }
}

trait Gestion2 {
    public function asignarChofer() {
        return "Vehículo con chofer asignado";
    }
}

// 3. Clase Padre (abstracta)
abstract class Vehiculo {
    // Atributos
    protected $matricula = "";
    protected $antiguedad = 0;
    protected $electrico = true;

    // Constructor
    public function __construct($matricula, $antiguedad, $electrico)
    {
        $this->matricula = $matricula;
        $this->antiguedad = $antiguedad;
        $this->electrico = $electrico;
    }

    // Resto de métodos
    public function setMatricula ($matricula) {
        $this->matricula = $matricula;
    }

    public function setAntiguedad ($antiguedad) {
        $this->antiguedad = $antiguedad;
    }

    public function setElectrico ($electrico) {
        $this->electrico = $electrico;
    }

    public function getMatricula () {
        return $this->matricula;
    }

    public function getAntiguedad () {
        return $this->antiguedad;
    }

    public function isElectrico () {
        return $this->electrico;
    }

    // Método abstracto
    abstract public function __toString();
}

// 4. Clase Linea (composicion)
class Linea {
    // Atributos
    public $denominacion = "";
    public $numParadas = 10;

    // Constructor
    public function __construct($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    // Método toString
    public function __toString()
    {
        return  "Denominación: $this->denominacion <br>" . 
                "NumParadas: $this->numParadas <br>";
    }
}

// 5. Clases Hijas
class Bus extends Vehiculo implements Metodos1, Metodos2 {
    // Meto los traits
    use Gestion1, Gestion2;

    // Atributos
    public $modelo = "";
    public $capacidad = 55;
    public $Linea1;

    // Constructor
    public function __construct($modelo)
    {
        $this->modelo = $modelo;
        parent::__construct("1111AAA", 2020, false);
        $this->Linea1 = new Linea("Plus Ultra-Pol Norte");
    }

    public function __toString()
    {
        return  "Matricula: " .$this->getMatricula(). "<br>" . 
                "Antigüedad: ". $this->getAntiguedad(). "<br>" . 
                "Electrico: ". $this->isElectrico(). " <br>" .
                "Modelo: $this->modelo <br>" . 
                "Linea <br> ########### <br> $this->Linea1 <br>";
    }

    // Añadimos los 2 métodos de las interfaces
    public static function darAlta() {
        return new Bus("SCANIA GNC");
    }

    public function darBaja() {
        return "Bus dado de Baja";
    }
}

class CocheTaller extends Vehiculo implements Metodos1 {
    use Gestion1;

    // Atributos
    public $marca = "";
    public $Linea1;
    public $completo = true;

    // Constructor
    public function __construct($marca)
    {
        $this->marca = $marca;
        parent::__construct("1111AAA", 2020, false);
        $this->Linea1 = new Linea("Plus Ultra-Pol Norte");
    }


    // Método de la interfaz
    public static function darAlta() {
        return new CocheTaller("FORD Super Duty");
    }

    // Método toString del padre implementado
    public function __toString()
    {
        return  "Matricula: " .$this->getMatricula(). "<br>" . 
                "Antigüedad: ". $this->getAntiguedad(). "<br>" . 
                "Electrico: ". $this->isElectrico(). " <br>" .
                "Marca: $this->marca <br>" . 
                "Completo: $this->completo <br>" .
                "Linea <br> ########### <br> $this->Linea1 <br>";
    }

}
   
?>

<?php
// Ex1306-tussam.php
// 6. SCRIPT PRINCIPAL
if (isset($_REQUEST['enviar'])) {
    //$vehiculo1 = new Vehiculo("AAA", 2020, false);
    $bus1 = new Bus("IVECO E-WAY");
    $cocheTaller1 = new CocheTaller("TOYOTA Hilux");
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
            PHP con POO: Clases</h1>
        <section>
            <p class="alert alert-info">
                <?php
                if (isset($_REQUEST['enviar'])) {
                    echo $bus1;
                    echo $cocheTaller1;
                    $bus2 = Bus::darAlta();
                    echo $bus2;
                }
                ?>
            </p>
        </section>
        <section class="w-50">
            <form action="#" method="post" class="form">
                <input type="submit" value="Enviar" name="enviar" class="btn btn-outline-primary">
            </form>
        </section>
    </main>

</body>

</html>