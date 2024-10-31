<?php
// process_login.php
session_start();
include 'db.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT id, nombre, contrasena FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($contrasena, $user['contrasena'])) {
            // Almacena el nombre del usuario en la sesión
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../index.php"); // Redirige al index
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
$conn->close();
?>
