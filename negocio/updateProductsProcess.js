document.getElementById('buscarUpdateSubmit').addEventListener('click', function (e) {
	
    e.preventDefault(); // Evita el envío del formulario.
    
    const codigo = document.getElementById('buscarUpdate').value;

    fetch('../negocio/BuscarProducto.php', { //AQui atencion al ruteo del archivo
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `buscarUpdate=${encodeURIComponent(codigo)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const producto = data.producto;

            // Habilitar campos y llenar con valores encontrados
            document.querySelectorAll('.updateForm').forEach(field => field.disabled = false);
			
            document.getElementById('precioU').value = producto.precio;
            document.getElementById('descripcionU').value = producto.descripcion;
            document.getElementById('cantidadU').value = producto.cantidad;
            document.getElementById('costoU').value = producto.costo;
            document.getElementById(producto.activo ? 'activoU' : 'inactivoU').checked = true;
            document.getElementById('categoriaU').value = producto.categoria;
            document.getElementById('descuentoU').value = producto.descuento;
        } else {
            alert(data.message); // Producto no encontrado
        }
    })
    .catch(error => console.error('Error:', error));
});
