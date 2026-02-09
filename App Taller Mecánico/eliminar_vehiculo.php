/* eliminar_vehiculo.php - Eliminación de un vehículo */
<?php
include 'config.php';
$id = $_GET['id'];
$sql = "DELETE FROM Vehiculo WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: listado_vehiculos.php?mensaje=Vehículo eliminado correctamente");
} else {
    echo "Error al eliminar: " . $conn->error;
}
$conn->close();
?>
