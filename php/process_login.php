<?php
// process_login.php
include 'db.php'; // Incluir archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Consultar usuario
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row['contrasena'])) {
            // Iniciar sesión
            session_start();
            $_SESSION['usuario'] = $row['nombre'];
            header("Location: ../html/index.html"); // Redirigir a la página principal
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No existe un usuario con ese correo.";
    }
}

$conn->close();
?>
