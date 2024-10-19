<?php

// Clase: Es una plantilla que define las propiedades (atributos) y comportamientos (métodos) de un objeto.
class Persona
{
    // Atributos: Son las propiedades o características de la clase.
    private $nombre;
    private $edad;

    // Constructor: Se ejecuta al crear una instancia de la clase.
    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Métodos: Son las funciones dentro de una clase que definen su comportamiento.
    public function saludar()
    {
        echo "Hola, mi nombre es " . $this->nombre . " y tengo " . $this->edad . " años.\n";
    }

    // Getters y Setters: Métodos para acceder y modificar atributos privados.
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
}

// Herencia: Permite crear una nueva clase a partir de una existente, heredando sus propiedades y métodos.
class Estudiante extends Persona
{
    private $curso;

    // El constructor de la clase hija puede llamar al constructor de la clase padre usando parent::__construct().
    public function __construct($nombre, $edad, $curso)
    {
        parent::__construct($nombre, $edad); // Llamar al constructor de Persona
        $this->curso = $curso;
    }

    // Polimorfismo: La clase hija puede sobrescribir métodos de la clase padre.
    public function saludar()
    {
        echo "Hola, soy un estudiante y mi nombre es " . $this->getNombre() . ". Estoy en el curso " . $this->curso . ".\n";
    }
}

// Encapsulamiento: Protege los datos internos de la clase y expone solo lo necesario mediante getters y setters.
$persona1 = new Persona("Jorge", 30);
$persona1->saludar(); // Salida: Hola, mi nombre es Jorge y tengo 30 años.

$persona1->setNombre("Emiliano");
$persona1->saludar(); // Salida: Hola, mi nombre es Emiliano y tengo 30 años.

echo "Accediendo al nombre mediante getter: " . $persona1->getNombre() . "\n";

// Crear una instancia de la clase hija Estudiante
$estudiante1 = new Estudiante("Laura", 22, "Arquitectura Avanzada con PHP");
$estudiante1->saludar(); // Salida: Hola, soy un estudiante y mi nombre es Laura. Estoy en el curso Arquitectura Avanzada con PHP.



// Tarea propuesta

class MySQLService
{
    private $db;

    public function __construct() {
        try {
            $db_host = 'localhost';
            $db_user = 'root';
            $db_password = 'root';
            $db_name = 'testDB';

            $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
            if ($connection->connect_error)
                throw new Exception('No se pudo conectar a la DB.');

            $this->db = $connection;
        } catch (\Throwable $th) {
            die("Error DB");
        }
    }

    public function execute(string $query) : array
    {
        $response = mysqli_query($this->db, $query);
        return $response ? $response->fetch_all(MYSQLI_ASSOC) : [];
    }
}

$db = new MySQLService();
$db->execute("SELECT * FROM Users");