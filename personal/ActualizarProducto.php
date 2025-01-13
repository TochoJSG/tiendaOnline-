<?php
require '../negocio/config.php';
require '../negocio/database.php';

require '../negocio/config.php';
require '../negocio/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Crear instancia de la base de datos
        $db = new Database();
        $conexion = $db->conectar();

        // Validar y asignar parámetros
        $id = $_POST['idProducto'] ?? null;
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

        // Asignar valores a los parámetros
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->bindValue(2, $codigo, PDO::PARAM_STR);
        $stmt->bindValue(3, $precio, PDO::PARAM_STR);
        $stmt->bindValue(4, $descripcion, PDO::PARAM_STR);
        $stmt->bindValue(5, $cantidad, PDO::PARAM_INT);
        $stmt->bindValue(6, $costo, PDO::PARAM_STR);
        $stmt->bindValue(7, $activo, PDO::PARAM_INT);
        $stmt->bindValue(8, $categoria, PDO::PARAM_INT);
        $stmt->bindValue(9, $descuento, PDO::PARAM_STR);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Producto actualizado con éxito.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el producto.']);
        }
    } catch (PDOException $e) {
        // Manejo de errores
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
}
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $con = $db->conectar();

    if (!$con) {
        echo json_encode(['success' => false, 'message' => 'Error al conectar con la base de datos.']);
        exit;
    }

    // Validación de entradas
    $id = $_POST['idProducto'] ?? null;
    $precio = $_POST['precioU'] ?? null;
    $descripcion = $_POST['descripcionU'] ?? null;
    $cantidad = $_POST['cantidadU'] ?? null;
    $costo = $_POST['costoU'] ?? null;
    $activo = isset($_POST['activoU']) && $_POST['activoU'] === 'true' ? 1 : 0;
    $categoria = $_POST['categoriaU'] ?? null;
    $descuento = $_POST['descuentoU'] ?? null;
    $codigo = $_POST['codigoUnico'] ?? null;

    // Verificar que todos los valores necesarios estén definidos
    if (!$id || !$precio || !$descripcion || !$cantidad || !$costo || !$categoria || !$codigo) {
        echo json_encode(['success' => false, 'message' => 'Faltan parámetros necesarios.']);
        exit;
    }

    try {
        // Construir la consulta con los valores manualmente
        $query = sprintf(
            "CALL ActualizarProducto('%d', '%s', '%f', '%s', '%d', '%f', '%d', '%d', '%f')",
            $id,
            $codigo,
            $precio,
            $descripcion,
            $cantidad,
            $costo,
            $activo,
            $categoria,
            $descuento
        );

        // Ejecutar la consulta
        if ($con->query($query)) {
            echo json_encode(['success' => true, 'message' => 'Producto actualizado con éxito.']);
        } else {
            throw new Exception('Error al ejecutar la consulta: ' . $con->error);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        if (isset($con) && $con instanceof mysqli) {
            $con->close();
        }
    }
}*/
?>
