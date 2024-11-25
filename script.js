function mostrarFormulario(tipo) {
    // Oculta todos los formularios
    document.querySelectorAll('.formulario').forEach(formulario => {
        formulario.style.display = 'none';
    });

    // Muestra el formulario correspondiente
    if (tipo === 'registrar') {
        document.getElementById('formularioRegistrar').style.display = 'block';
    } else if (tipo === 'consultar') {
        consultarProductos();
        document.getElementById('tablaProductos').style.display = 'block';
    }
}

function cerrarFormulario() {
    // Oculta todos los formularios
    document.querySelectorAll('.formulario').forEach(formulario => {
        formulario.style.display = 'none';
    });
}


// Función para registrar productos
function registrarProducto() {
    let nombre = document.getElementById('nombre').value;
    let precio = document.getElementById('precio').value;
    let cantidad = document.getElementById('cantidad').value;
    let stockCritico = document.getElementById('stockCritico').value;

    if (nombre && precio && cantidad && stockCritico) {
        fetch('registrarProducto.php', {
            method: 'POST',
            body: new URLSearchParams({
                'nombre': nombre,
                'precio': precio,
                'cantidad': cantidad,
                'stockCritico': stockCritico
            })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            cerrarFormulario();
        });
    } else {
        alert('Por favor, complete todos los campos.');
    }
}

// Función para consultar productos
function consultarProductos() {
    fetch('consultarProducto.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('productosTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = ''; // Limpiar la tabla antes de cargar los productos
            data.productos.forEach(producto => {
                let row = tableBody.insertRow();
                row.innerHTML = `
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td>${producto.precio}</td>
                    <td>${producto.cantidad}</td>
                    <td>${producto.stockCritico}</td>
                `;
                // Agregar la clase 'critico' si el producto está por debajo del stock crítico
                if (producto.cantidad <= producto.stockCritico) {
                    row.classList.add('critico');
                }
            });
        });
}

// Función para generar reporte (simulando en este caso)
function generarReporte() {
    print("");
}

// Función para eliminar un producto
function eliminarProducto() {
    let deletProductID = prompt("Ingrese el ID del producto que desea eliminar:");
    if (deletProductID) {
        fetch('eliminarProducto.php', {
            method: 'POST',
            body: new URLSearchParams({ 'ID': deletProductID })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            consultarProductos(); // Actualiza la tabla después de eliminar
        });
    }
}

