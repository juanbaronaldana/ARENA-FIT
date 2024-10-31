<?php
include 'db.php'; // Incluir archivo de conexión a la base de datos

$query = "SELECT * FROM productos";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<img src='../imagenes/" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>";
        echo "<h3>" . $row['nombre'] . "</h3>";
        echo "<p class='price'>$" . $row['precio'] . "</p>";
        echo "<button onclick=\"location.href='producto.php?id=" . $row['id'] . "'\">Ver Producto</button>";
        echo "</div>";
    }
} else {
    echo "<p>No hay productos disponibles</p>";
}

$conn->close();
?>
