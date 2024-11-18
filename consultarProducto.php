<?php
header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

$host = 'localhost';
$user = 'root';
$password = 'password'; // Cambia 'password' por tu contraseña real
$db = 'inventario';

$conn = new mysqli($host, $user, $password, $db);

// Verifica la conexión
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error de conexión a la base de datos: ' . $conn->connect_error]);
    exit;
}

// Obtén los datos enviados desde JavaScript
$nombre = $_POST['nombre'] ?? '';
$precio = $_POST['precio'] ?? 0;
$cantidad = $_POST['cantidad'] ?? 0;
$stockCritico = $_POST['stockCritico'] ?? 0;

// Verifica que los campos requeridos no estén vacíos
if (empty($nombre) || $precio <= 0 || $cantidad < 0 || $stockCritico < 0) {
    echo json_encode(['message' => 'Todos los campos son obligatorios y deben tener valores válidos']);
    exit;
}

// Inserta los datos en la base de datos
$sql = "INSERT INTO inventario (nombre, precio, cantidad, stockCritico) VALUES ('$nombre', $precio, $cantidad, $stockCritico)";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Producto registrado exitosamente']);
} else {
    echo json_encode(['message' => 'Error al registrar producto: ' . $conn->error]);
}

$conn->close();
?>