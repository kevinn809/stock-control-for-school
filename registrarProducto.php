<?php

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$stockCritico = $_POST['stockCritico'];

$sql = "INSERT INTO inventario(nombre, precio, cantidad, stockCritico) VALUES ('$name','$precio','$cantidad','$stockCritico')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Producto registrado exitosamente']);
} else {
    echo json_encode(['message' => 'Error al registrar producto: ' . $conn->error]);
}

$conn->close();
?>
