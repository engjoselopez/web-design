<?php
// Mostrar errores para debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$nombreBD = "tienda";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contraseña, $nombreBD);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Preparar y enlazar
    $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación: " . $conn->error);
    }

    $stmt->bind_param("ssd", $nombre, $descripcion, $precio);

    // Ejecutar
    if ($stmt->execute()) {
        echo "Nuevo producto agregado exitosamente";
        header("Location:mostrar_productos.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
