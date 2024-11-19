<?php
header('Content-Type: application/json');

// Configuración de la base de datos
$host = 'localhost';
$user = 'root';
$password = ''; 
$db = 'inventario';

// Crear conexión
$conn = new mysqli($host, $user, $password, $db);

// Verifica la conexión
if ($conn->connect_error) {
    echo json_encode(['message' => 'Error de conexión a la base de datos: ' . $conn->connect_error]);
    exit;
}

// Consulta para obtener los productos de la tabla "productos"
$sql = "SELECT id, nombre, precio, cantidad, stockCritico FROM productos";
$result = $conn->query($sql);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    $productos = [];
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
    echo json_encode(['productos' => $productos]);
} else {
    echo json_encode(['productos' => []]); // Retorna una lista vacía si no hay productos
}

$conn->close();
?>
