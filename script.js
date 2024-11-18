function registrarProducto() {
    let nombre = document.getElementById('nombre').value;
    let precio = document.getElementById('precio').value;
    let cantidad = document.getElementById('cantidad').value;
    let stockCritico = document.getElementById('stockCritico').value;

    if (nombre && precio && cantidad && stockCritico) {
        fetch('registrarProducto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'nombre': nombre,
                'precio': precio,
                'cantidad': cantidad,
                'stockCritico': stockCritico
            }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
            cerrarFormulario();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un problema al procesar la solicitud.');
        });
    } else {
        alert('Por favor, complete todos los campos.');
    }
}
