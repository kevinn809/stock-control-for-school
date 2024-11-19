<?php

// Configuración de la base de datos
$server = "localhost"; // Servidor
$user = "root";        // Usuario de la base de datos
$password = "";        // Contraseña de la base de datos
$db = "inventario";    // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($server, $user, $password, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die(json_encode(['message' => 'Conexión fallida: ' . $conexion->connect_error]));
}

// Recibir datos del formulario
$name = isset($_POST['nombre']) ? $conexion->real_escape_string($_POST['nombre']) : null;
$precio = isset($_POST['precio']) ? $conexion->real_escape_string($_POST['precio']) : null;
$cantidad = isset($_POST['cantidad']) ? $conexion->real_escape_string($_POST['cantidad']) : null;
$stockCritico = isset($_POST['stockCritico']) ? $conexion->real_escape_string($_POST['stockCritico']) : null;

// Validar datos
if (!$name || !$precio || !$cantidad || !$stockCritico) {
    echo json_encode(['message' => 'Por favor, complete todos los campos.']);
    exit;
}

// Preparar y ejecutar la consulta para la tabla 'productos'
$sql = "INSERT INTO productos (nombre, precio, cantidad, stockCritico) VALUES ('$name', '$precio', '$cantidad', '$stockCritico')";
if ($conexion->query($sql) === TRUE) {
    echo json_encode(['message' => 'Producto registrado exitosamente']);
} else {
    echo json_encode(['message' => 'Error al registrar producto: ' . $conexion->error]);
}

// Cerrar conexión
$conexion->close();
?>
