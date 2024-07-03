<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $matricula = clean_input($_POST["matricula"]);
  $nombre = clean_input($_POST["nombre"]);
  $email = clean_input($_POST["correo"]); // Cambiado a $_POST["correo"]
  $password = clean_input($_POST["password"]);

  // Hash de la contraseña
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insertar datos en la base de datos
  $sql = "INSERT INTO usuarios (matricula, nombre, email, password) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $matricula, $nombre, $email, $hashed_password);

  if ($stmt->execute()) {
    // Registro exitoso, redirigir a Principal.html
    header("Location: inicio.html");
    exit();
  } else {
    echo "Error al registrar: " . $stmt->error;
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

