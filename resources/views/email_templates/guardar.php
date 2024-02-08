<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "soesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$marca = $_POST['marca'];
$tipo_lente = $_POST['tipo_lente'];
$material = $_POST['material'];
$tratamiento = $_POST['tratamiento'];

// Insertar datos en la base de datos
$sql = "INSERT INTO catalogos (marca, tipo_lente, material, tratamiento) VALUES ('$marca', '$tipo_lente', '$material', '$tratamiento')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente";
} else {
    echo "Error al guardar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
