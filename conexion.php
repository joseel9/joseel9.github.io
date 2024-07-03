<?php
$servername = "localhost";  // Nombre del servidor MySQL
$username = "root";   // Nombre de usuario de MySQL
$password = ""; // Contraseña de MySQL
$dbname = "Folio"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error en la conexión: " . $conn->connect_error);
}
?>
