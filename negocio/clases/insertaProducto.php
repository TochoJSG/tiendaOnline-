<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexión a la base de datos
        $insertProduct = new Database();
        $conP = $insertProduct->conectar();

        // Validar y sanitizar los datos del formulario
        $p_cate = filter_input(INPUT_POST, 'p_cate', FILTER_SANITIZE_STRING);
        $p_nomb = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $p_precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
        $p_cant = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT);
        $p_desc = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING);
        $p_cu = filter_input(INPUT_POST, 'codigoUnico', FILTER_SANITIZE_STRING); // Código único proporcionado en el formulario
        $p_des = isset($_POST['descuento']) ? filter_input(INPUT_POST, 'descuento', FILTER_VALIDATE_FLOAT) : 0;
        $p_cost = filter_input(INPUT_POST, 'costo', FILTER_VALIDATE_FLOAT);
        $p_edo = ($_POST['activo'] === 'true') ? 1 : 0;

        // Verificar que los datos requeridos no estén vacíos
        if ($p_cate && $p_nomb && $p_precio && $p_cant && $p_desc && $p_cu && $p_cost !== false) {
            // Preparar la llamada al procedimiento almacenado
            $sqlDBProd = $conP->prepare("CALL insertarProducto(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sqlDBProd->bindValue(1, $p_cate, PDO::PARAM_STR);
            $sqlDBProd->bindValue(2, $p_nomb, PDO::PARAM_STR);
            $sqlDBProd->bindValue(3, $p_precio, PDO::PARAM_STR);
            $sqlDBProd->bindValue(4, $p_cant, PDO::PARAM_INT);
            $sqlDBProd->bindValue(5, $p_desc, PDO::PARAM_STR);
            $sqlDBProd->bindValue(6, $p_cu, PDO::PARAM_STR);
            $sqlDBProd->bindValue(7, $p_des, PDO::PARAM_STR);
            $sqlDBProd->bindValue(8, $p_cost, PDO::PARAM_STR);
            $sqlDBProd->bindValue(9, $p_edo, PDO::PARAM_BOOL);

            // Ejecutar el procedimiento
            if ($sqlDBProd->execute()) {
                echo "<p>Producto registrado correctamente.</p>";
            } else {
                echo "<p>Error al registrar el producto: " . $sqlDBProd->errorInfo()[2] . "</p>";
            }

            // Cerrar la conexión
            $sqlDBProd->closeCursor();
        } else {
            echo "<p>Error: Por favor, completa todos los campos obligatorios correctamente.</p>";
        }
    }
?>