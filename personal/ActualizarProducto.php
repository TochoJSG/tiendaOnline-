<?php
require '../negocio/config.php';
require '../negocio/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}
?>
