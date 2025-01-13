<?php
require '../negocio/config.php';
require '../negocio/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    try {
        $db = new Database();// Crear instancia de la base de datos
        $conexion = $db->conectar();

        $id = $_POST['idProducto'] ?? null;// Validar y asignar parámetros
        $codigo = $_POST['codigoUnico'] ?? null;
        $precio = $_POST['precioU'] ?? null;
        $descripcion = $_POST['descripcionU'] ?? null;
        $cantidad = $_POST['cantidadU'] ?? null;
        $costo = $_POST['costoU'] ?? null;
        $activo = isset($_POST['activoU']) && $_POST['activoU'] === 'true' ? 1 : 0;
        $categoria = $_POST['categoriaU'] ?? null;
        $descuento = $_POST['descuentoU'] ?? null;

        // Validar que los campos requeridos no sean nulos
        if (!$id || !$codigo || !$precio || !$descripcion || !$cantidad || !$costo || !$categoria) {
            echo json_encode(['success' => false, 'message' => 'Faltan parámetros necesarios.']);
            exit;
        }

        // Preparar la consulta
        $stmt = $conexion->prepare("CALL ActualizarProducto(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindValue(1, $id, PDO::PARAM_INT);// Asignar valores a los parámetros
        $stmt->bindValue(2, $codigo, PDO::PARAM_STR);
        $stmt->bindValue(3, $precio, PDO::PARAM_STR);
        $stmt->bindValue(4, $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(5, $cantidad, PDO::PARAM_INT);
        $stmt->bindValue(6, $costo, PDO::PARAM_STR);
        $stmt->bindValue(7, $activo, PDO::PARAM_INT);
        $stmt->bindValue(8, $categoria, PDO::PARAM_INT);
        $stmt->bindValue(9, $descuento, PDO::PARAM_STR);

        if ($stmt->execute()) {// Ejecutar la consulta
            echo json_encode(['success' => true, 'message' => 'Producto actualizado con éxito.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el producto.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
}
?>