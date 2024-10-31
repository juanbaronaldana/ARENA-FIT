<?php
// process_register.php
include 'db.php'; // Asegúrate de que este archivo exista y esté en la misma carpeta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña
    $telefono = $_POST['telefono'];

    // Preparar y vincular
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, contrasena, telefono) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $email, $contrasena, $telefono); // 'sssss' indica que todos son cadenas

    // Intentar ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro exitoso!";
        header("Location: ../html/login.html"); // Redirigir al login
        exit(); // Asegúrate de salir después de redirigir
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
