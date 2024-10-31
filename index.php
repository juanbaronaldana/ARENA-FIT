<?php
// index.php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARENA-FIT - Tienda de Productos</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <h1>ARENA-FIT</h1>
        <nav>
            <?php if (isset($_SESSION['user_name'])): ?>
                <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                <a href="php/logout.php">Cerrar sesión</a>
            <?php else: ?>
                <a href="html/login.html">Iniciar sesión</a>
                <a href="html/register.html">Registrarse</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="productos">
        <h2>Productos Disponibles</h2>
        <div class="productos-container">
            <?php
            include 'php/db.php'; // Asegúrate de que esta línea esté correcta
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            while ($producto = $result->fetch_assoc()) {
                echo "<div class='producto'>";
                echo "<img src='img/" . htmlspecialchars($producto['imagen']) . "' alt='" . htmlspecialchars($producto['nombre']) . "'>";
                echo "<h3>" . htmlspecialchars($producto['nombre']) . "</h3>";
                echo "<p class='precio'>$" . htmlspecialchars($producto['precio']) . "</p>";
                echo "<button>Agregar al carrito</button>";
                echo "</div>";
            }
            $conn->close();
            ?>
        </div>
    </section>
</body>
</html>
