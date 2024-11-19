<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Inventario</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .formulario {
            display: none; /* Asegura que están ocultos por defecto */
        }
        .critico {
            background-color: #f8d7da; /* Color para productos con stock crítico */
        }
        #menu button {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Gestión de Inventario</h1>

        <div id="menu">
            <button onclick="mostrarFormulario('registrar')">Registrar Producto</button>
            <button onclick="mostrarFormulario('consultar')">Consultar Productos</button>
            <button onclick="generarReporte()">Generar Reporte</button>
        </div>

        <!-- Formulario de Registro -->
        <div id="formularioRegistrar" class="formulario">
            <h2>Registrar Producto</h2>
            <input type="text" id="nombre" placeholder="Nombre del producto">
            <input type="number" id="precio" placeholder="Precio del producto">
            <input type="number" id="cantidad" placeholder="Cantidad">
            <input type="number" id="stockCritico" placeholder="Stock Crítico">
            <button onclick="registrarProducto()">Registrar</button>
            <button onclick="cerrarFormulario()">Cancelar</button>
        </div>

        <!-- Tabla de productos -->
        <div id="tablaProductos" class="formulario">
            <h2>Consultar Productos</h2>
            <table id="productosTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Stock Crítico</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Productos cargados con JavaScript -->
                </tbody>
            </table>
            <button onclick="cerrarFormulario()">Cerrar</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
