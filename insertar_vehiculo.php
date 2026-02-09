/* insertar_vehiculo.php - Inserción de datos en la base de datos */
<?php
$servername = "db";
$username = "root";
$password = "rootpass";
$database = "TallerMecanico";
$port = 3306;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}else {
        $propietario = $_POST['propietario'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $matricula = $_POST['matricula'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $kilometraje = $_POST['kilometraje'];
        $averia = $_POST['averia'];
        $estado_reparacion = $_POST['estado_reparacion'];
        $presupuesto = $_POST['presupuesto'];

        $sql = "INSERT INTO Vehiculo (propietario, marca, modelo, matricula, fecha_ingreso, kilometraje, averia, estado_reparacion, presupuesto)
                VALUES ('$propietario', '$marca', '$modelo', '$matricula', '$fecha_ingreso', $kilometraje, '$averia', '$estado_reparacion', $presupuesto)";

        if ($conn->query($sql) === TRUE) {
            header("Location: listado_vehiculos.php?mensaje=Vehículo registrado correctamente");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
}
$conn->close();
?>
