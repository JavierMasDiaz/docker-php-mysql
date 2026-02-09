<?php
/* listado_vehiculos.php - Listado de vehículos */
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
        $sql = "SELECT * FROM Vehiculo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Propietario</th><th>Marca - Modelo</th><th>Matrícula</th><th>Fecha de Ingreso</th><th>Estado</th><th>Acciones</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['propietario'] . "</td>";
                echo "<td>" . $row['marca'] . " - " . $row['modelo'] . "</td>";
                echo "<td>" . $row['matricula'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($row['fecha_ingreso'])) . "</td>";
                echo "<td>" . $row['estado_reparacion'] . "</td>";
                echo "<td><a href='info_vehiculo.php?id=" . $row['id'] . "'>Ver</a> | ";
                echo "<a href='editar_vehiculo.php?id=" . $row['id'] . "'>Editar</a> | ";
                echo "<a href='eliminar_vehiculo.php?id=" . $row['id'] . "'>Eliminar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No hay vehículos registrados.";
        }
      }
$conn->close();
echo "<br>";
echo '<a href="index.html">[Página Principal]</a>';
?>
