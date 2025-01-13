<?php
require '../negocio/config.php';
require '../negocio/database.php';

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
}
?>
