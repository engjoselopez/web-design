<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
        </tr>

        <?php
        // Conectar a la base de datos
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

        // Obtener productos
        $sql = "SELECT id, nombre, descripcion, precio FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar datos de cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "<td>" . $row["precio"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay productos disponibles</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
