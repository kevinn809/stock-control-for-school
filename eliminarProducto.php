<?php
header('Content-Type: application/json');

// Configuración de la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'stockControl';

// Crear conexión
$conn = new mysqli($host, $user, $password, $db);

// Verifica la conexión
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error de conexión a la base de datos: ' . $conn->connect_error]);
    exit;
}

// Verifica si se ha enviado el ID del producto
if (!isset($_POST['ID'])) {
    echo json_encode(['message' => 'ID del producto no proporcionado']);
    exit;
}

$id = $conn->real_escape_string($_POST['ID']);

// Consulta para eliminar el producto
$sql = "DELETE FROM productos WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Producto eliminado exitosamente']);
} else {
    echo json_encode(['message' => 'Error al eliminar el producto: ' . $conn->error]);
}

$conn->close();
?>
