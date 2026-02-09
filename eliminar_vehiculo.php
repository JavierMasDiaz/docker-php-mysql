/* eliminar_vehiculo.php - Eliminación de un vehículo */
<?php
$servername = "db";
$username = "root";
$password = "rootpass";
$database = "TallerMecanico";
$port = 3306;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $port);

$id = $_GET['id'];
$sql = "DELETE FROM Vehiculo WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: listado_vehiculos.php?mensaje=Vehículo eliminado correctamente");
} else {
    echo "Error al eliminar: " . $conn->error;
}
$conn->close();
?>
