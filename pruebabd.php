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
} else {
    echo "Conexión exitosa a la base de datos";
}

$conn->close();
?>
