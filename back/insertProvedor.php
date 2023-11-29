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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    // Consulta SQL para la inserción
    $sql = "INSERT INTO Proveedor (Nombre, Direccion, Telefono) VALUES ('$nombre', '$direccion', '$telefono')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Inserción exitosa";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>