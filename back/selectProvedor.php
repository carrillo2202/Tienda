<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "tiendaWeb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Realizar consulta SELECT
$sql = "SELECT * FROM Proveedor";
$result = $conn->query($sql);

// Inicializar un array para almacenar los resultados
$data = array();

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Almacenar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Cerrar la conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
