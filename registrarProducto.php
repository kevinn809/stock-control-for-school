<?php
header('Content-Type: application/json');

// Verificar qué datos se están recibiendo
var_dump($_POST); // Ver las variables que se están recibiendo

// Configuración de la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'stockControl';

// Crear conexión
$conn = new mysqli($host, $user, $password, $db);

// Verifica la conexión
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error de conexión: ' . $conn->connect_error]);
    exit;
}

// Verifica los datos enviados
if (!isset($_POST['nombre']) || !isset($_POST['precio']) || !isset($_POST['cantidad']) || !isset($_POST['stockCritico'])) {
    echo json_encode(['message' => 'Datos incompletos']);
    exit;
}

$nombre = $conn->real_escape_string($_POST['nombre']);
$precio = $conn->real_escape_string($_POST['precio']);
$cantidad = $conn->real_escape_string($_POST['cantidad']);
$stockCritico = $conn->real_escape_string($_POST['stockCritico']);

// Inserta el producto
$sql = "INSERT INTO productos (nombre, precio, cantidad, stockCritico) VALUES ('$nombre', '$precio', '$cantidad', '$stockCritico')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Producto registrado exitosamente']);
} else {
    echo json_encode(['message' => 'Error al registrar el producto: ' . $conn->error]);
}

$conn->close();
?>
