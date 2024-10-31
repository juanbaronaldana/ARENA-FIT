<?php
// index.php
include 'php/db.php'; // Incluir la conexión a la base de datos

// Consultar productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Comprobar si hay productos
if ($result->num_rows > 0) {
    $productos = [];
    while ($producto = $result->fetch_assoc()) {
        $productos[] = $producto; // Almacena los productos en un array
    }
} else {
    $productos = []; // No hay productos
}

$conn->close(); // Cerrar conexión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Virtual - Arena Fit</title>
    <link rel="stylesheet" href="../css/index.css"> <!-- Llamar al CSS -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="html/login.html">Iniciar Sesión</a></li>
                <li><a href="html/register.html">Registrarse</a></li>
            </ul>
        </nav>
        <h1>Bienvenido a Arena Fit</h1>
    </header>

    <main>
        <h2>Lista de Productos</h2>
        <div class="productos">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="producto">
                        <img src="images/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <h3><?php echo $producto['nombre']; ?></h3>
                        <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                        <button onclick="agregarAlCarrito(<?php echo $producto['id']; ?>)">Agregar al Carrito</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Arena Fit. Todos los derechos reservados.</p>
    </footer>

    <script>
        function agregarAlCarrito(productoId) {
            alert('Producto con ID ' + productoId + ' agregado al carrito (simulación).');
        }
    </script>
</body>
</html>
