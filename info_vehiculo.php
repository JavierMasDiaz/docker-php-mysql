<?php
/* info_vehiculo.php - Información detallada de un vehículo */
$servername = "localhost";
$username = "root";
$password = "";
$database = "TallerMecanico";
$port = 3307;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM Vehiculo WHERE id=$id";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            echo "<h2>Información del Vehículo</h2>";
            echo "<ul><li><strong>Propietario:</strong> " . $row['propietario'] . "</li>";
            echo "<li><strong>Marca y Modelo:</strong> " . $row['marca'] . " - " . $row['modelo'] . "</li>";
            echo "<li><strong>Matrícula:</strong> " . $row['matricula'] . "</li>";
            echo "<li><strong>Fecha de Ingreso:</strong> " . date('d/m/Y', strtotime($row['fecha_ingreso'])) . "</li>";
            echo "<li><strong>Kilometraje:</strong> " . $row['kilometraje'] . " km</li>";
            echo "<li><strong>Avería:</strong> " . $row['averia'] . "</li>";
            echo "<li><strong>Estado:</strong> " . $row['estado_reparacion'] . "</li>";
            echo "<li><strong>Presupuesto:</strong> " . ($row['presupuesto'] ? $row['presupuesto'] . " €" : "No definido") . "</li></ul>";
        } else {
            echo "Vehículo no encontrado.";
        }
      }
$conn->close();
echo "<br>";
echo '<a href="listado_vehiculos.php">[Listado de vehículos]</a>';
?>
