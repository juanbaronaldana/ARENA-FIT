<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['img']['name']; // Cambia "img" según el "name" en el HTML
    $target = "../img/" . basename($imagen);

    // Insertar en la base de datos
    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$imagen')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
            echo "Producto agregado exitosamente.";
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
