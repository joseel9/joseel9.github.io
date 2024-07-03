<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_input($_POST["matricula"]);
    $password = clean_input($_POST["password"]);

    // Verificar los datos en la base de datos
    $sql = "SELECT matricula, password FROM usuarios WHERE matricula = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($matricula, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Inicio de sesión exitoso, redirigir a Platform/Principal.html
            header("Location: ../Platform/Principal.html");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        // Matrícula no encontrada, mostrar advertencia
        echo '<script>alert("Matrícula no encontrada."); window.location.href = "inicio-sesion.html";</script>';
    }

    $stmt->close();
}

function clean_input($data) {
    // Limpiar los datos ingresados por el usuario
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>