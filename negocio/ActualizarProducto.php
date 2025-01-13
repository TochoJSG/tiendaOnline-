<?php
//require 'conexion.php';

require 'config.php';
//require 'constantes.php';
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$db = new Database();
	$con = $db->conectar();
    
	$id = $_POST['idProducto'];//Atencion con este
    $precio = $_POST['precioU'];
    $descripcion = $_POST['descripcionU'];
    $cantidad = $_POST['cantidadU'];
    $costo = $_POST['costoU'];
    $activo = $_POST['activoU'] === 'true' ? 1 : 0;
    $categoria = $_POST['categoriaU'];
    $descuento = $_POST['descuentoU'];
	$codigo = $_POST['codigoUnico'];
    
	$sqlDB = $con->prepare("CALL ActualizarProducto(?, ?, ?, ?, ?, ?, ?, ?)");
    $sqlDB->bind_param($id, $codigo, $precio, $descripcion, $cantidad, $costo, $activo, $categoria, $descuento);
    if ($sqlDB->execute()) {
        echo json_encode(['success' => true, 'message' => 'Producto actualizado con éxito.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el producto.']);
    }

    $sqlDB->close();
}
?>
