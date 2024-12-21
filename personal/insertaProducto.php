<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Conexión a la base de datos
        $database = new Database();
        $conn = $database->conectar();

        // Validar y sanitizar los datos del formulario
        $p_cate = filter_input(INPUT_POST, 'p_cate', FILTER_SANITIZE_NUMBER_INT);
        $p_nomb = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $p_precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
        $p_cant = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT);
        $p_desc = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
        $p_cu = filter_input(INPUT_POST, 'codigoUnico', FILTER_SANITIZE_STRING);
        $p_des = isset($_POST['descuento']) ? filter_input(INPUT_POST, 'descuento', FILTER_VALIDATE_FLOAT) : null;
        $p_cost = filter_input(INPUT_POST, 'costo', FILTER_VALIDATE_FLOAT);
        $p_edo = ($_POST['activo'] === 'true') ? 1 : 0;

        // Validar campos obligatorios
        if ($p_cate && $p_nomb && $p_precio !== false && $p_cant !== false && $p_cu && $p_cost !== false) {
            // Preparar la consulta SQL para llamar al procedimiento almacenado
            $sql = $conn->prepare("CALL insertarProducto(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bindValue(1, $p_cate, PDO::PARAM_INT);
            $sql->bindValue(2, $p_nomb, PDO::PARAM_STR);
            $sql->bindValue(3, $p_precio, PDO::PARAM_STR);
            $sql->bindValue(4, $p_cant, PDO::PARAM_INT);
            $sql->bindValue(5, $p_desc, PDO::PARAM_STR);
            $sql->bindValue(6, $p_cu, PDO::PARAM_STR);
            $sql->bindValue(7, $p_des ?? 0, PDO::PARAM_STR); // Descuento opcional
            $sql->bindValue(8, $p_cost, PDO::PARAM_STR);
            $sql->bindValue(9, $p_edo, PDO::PARAM_BOOL);

            // Ejecutar el procedimiento almacenado
            if ($sql->execute()) {
                echo "<p>Producto registrado correctamente.</p>";
            } else {
                echo "<p>Error al registrar el producto: " . implode(", ", $sql->errorInfo()) . "</p>";
            }
        } else {
            echo "<p>Error: Por favor, completa todos los campos obligatorios correctamente.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error de conexión: " . $e->getMessage() . "</p>";
    } finally {
        // Cerrar la conexión si está abierta
        if (isset($conn)) {
            $conn = null;
        }
    }
}
?>