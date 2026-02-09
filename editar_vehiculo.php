/* editar_vehiculo.php - Edición de datos de un vehículo */
<?php
$servername = "adb";
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
        $id = $_GET['id'];
        $sql = "SELECT * FROM Vehiculo WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <form action="actualizar_vehiculo.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Propietario: <input type="text" name="propietario" value="<?php echo $row['propietario']; ?>" required></label><br>
            <label>Marca: <input type="text" name="marca" value="<?php echo $row['marca']; ?>" required></label><br>
            <label>Modelo: <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" required></label><br>
            <label>Estado de Reparación:
                <select name="estado_reparacion">
                    <option value="Pendiente" <?php echo ($row['estado_reparacion'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="En reparación" <?php echo ($row['estado_reparacion'] == 'En reparación') ? 'selected' : ''; ?>>En reparación</option>
                    <option value="Reparado" <?php echo ($row['estado_reparacion'] == 'Reparado') ? 'selected' : ''; ?>>Reparado</option>
                </select>
            </label><br>
            <input type="submit" value="Actualizar">
        </form>
      }
