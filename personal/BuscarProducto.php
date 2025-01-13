<?php
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

        // Validar que no haya valores nulos
        if (!$id || !$codigo || !$precio || !$descripcion || !$cantidad || !$costo || !$categoria) {
            echo json_encode(['success' => false, 'message' => 'Faltan parámetros necesarios.']);
            exit;
        }

        // Preparar la consulta
        $stmt = $conexion->prepare("CALL ActualizarProducto(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Asignar los valores
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
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
}
?>

/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['buscarUpdate'] ?? null; // Validar entrada

    if (!$codigo) {
        echo json_encode(['success' => false, 'message' => 'Código no proporcionado.']);
        exit;
    }

    $db = new Database();
    $con = $db->conectar();

    if (!$con) {
        echo json_encode(['success' => false, 'message' => 'Error al conectar con la base de datos.']);
        exit;
    }

    try {
        // Usamos `prepare` para evitar inyección SQL
        $sqlDB = $con->prepare("CALL BuscarProducto(?)");
        if (!$sqlDB) {
            throw new Exception('Error al preparar la consulta: ' . $con->error);
        }

        // Vinculamos el parámetro
        $sqlDB->bind_param('s', $codigo);

        // Ejecutamos la consulta
        $sqlDB->execute();

        // Obtenemos el resultado
        $result = $sqlDB->get_result();
        if (!$result) {
            throw new Exception('Error al obtener resultados: ' . $sqlDB->error);
        }

        if ($result->num_rows > 0) {
            $producto = $result->fetch_assoc();
            echo json_encode(['success' => true, 'producto' => $producto]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        // Cerramos recursos
        if (isset($sqlDB) && $sqlDB instanceof mysqli_stmt) {
            $sqlDB->close();
        }
        if (isset($con) && $con instanceof mysqli) {
            $con->close();
        }
    }
}*/
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db = new Database();
    $conexion = $db->conectar();

    $codigo = $_POST['buscarUpdate'];
    
    $stmt = $conexion->prepare("CALL BuscarProducto(?);");
    $stmt->bind_param('s', $codigo);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        echo json_encode(['success' => true, 'producto' => $producto]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
    }
    
    $stmt->close();
}*/

