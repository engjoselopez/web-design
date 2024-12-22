<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="#">Productos</a>
        <a href="#">Contacto</a>
    </nav>
    <h1>Detalle del Producto</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tienda";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $productId = intval($_GET['id']);
    $sql = "SELECT * FROM productos WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        echo "<div class='producto'>";
        echo "<img src='imagen/{$producto['imagen']}' alt='{$producto['nombre']}'>";
        echo "<h2>{$producto['nombre']}</h2>";
        echo "<p>{$producto['descripcion']}</p>";
        echo "<p class='precio'>{$producto['precio']} USD</p>";
        echo "</div>";
    } else {
        echo "Producto no encontrado.";
    }

    $conn->close();
    ?>
</body>
</html>
