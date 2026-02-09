/* crearBD.php - Creación de la base de datos y la tabla Vehiculo */
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "TallerMecanico";
$port = 3307;

// Conexión al servidor
$conn = new mysqli($servername, $username, $password, "", $port);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS $database CHARACTER SET utf8 COLLATE utf8_spanish_ci";
$conn->query($sql);

// Seleccionar la base de datos
$conn->select_db($database);

// Crear tabla Vehiculo
$sql = "CREATE TABLE IF NOT EXISTS Vehiculo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    propietario VARCHAR(50) NOT NULL,
    marca VARCHAR(30) NOT NULL,
    modelo VARCHAR(30) NOT NULL,
    matricula VARCHAR(10) UNIQUE NOT NULL,
    fecha_ingreso DATE NOT NULL,
    kilometraje INT NOT NULL,
    averia TEXT,
    estado_reparacion ENUM('Pendiente', 'En reparación', 'Reparado') NOT NULL,
    presupuesto DECIMAL(8,2) NULL
) ENGINE=InnoDB;";
$conn->query($sql);

// Insertar datos iniciales
$sql = "INSERT INTO Vehiculo (propietario, marca, modelo, matricula, fecha_ingreso, kilometraje, averia, estado_reparacion, presupuesto) VALUES
    ('Uriel', 'Mercedes', 'Clase A', '1234ABC', '2024-02-01', 150000, 'Cambio de aceite', 'Pendiente', NULL),
    ('Diego', 'Tesla', 'Model 3', '5678DEF', '2024-02-10', 90000, 'Problema en la transmisión', 'En reparación', 350.00),
    ('Guille', 'BMW', 'X3', '9101GHI', '2024-02-15', 120000, 'Fallo en el sistema eléctrico', 'Reparado', 500.00)
    ON DUPLICATE KEY UPDATE propietario=VALUES(propietario)";
$conn->query($sql);

echo "Base de datos y tabla creadas con éxito.";
$conn->close();
?>
