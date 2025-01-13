<?php
//require 'conexion.php'; // Asegúrate de tener la conexión configurada correctamente.
require '../negocio/config.php';
//require 'constantes.php';
require '../negocio/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    $codigo = $_POST['buscarUpdate'];
    
	$db = new Database();
	$con = $db->conectar();
	
    $sqlDB = $con->prepare("CALL BuscarProducto(?)");
    $sqlDB->bind_param('s', $codigo);
    $sqlDB->execute();
    $result = $sqlDB->get_result();
    
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        echo json_encode(['success' => true, 'producto' => $producto]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
    }
    
    $sqlDB->close();
}
?>
