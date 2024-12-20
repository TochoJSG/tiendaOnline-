<?php
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si el campo 'producto' fue enviado
    if (!empty($_POST['producto'])) {
        $producto = $_POST['producto'];

        // Conexión a la base de datos
        $bd = new Database();
        $conect = $bd->conectar();

        try {
            // Preparar y ejecutar la consulta con el parámetro
            $sqlCon = $conect->prepare("CALL ConsultaProducto(?)");
            $sqlCon->bindParam(1, $producto, PDO::PARAM_STR);
            $sqlCon->execute();

            // Obtener resultados
            $resultados = $sqlCon->fetchAll(PDO::FETCH_ASSOC);

            // Mostrar resultados
            if (!empty($resultados)) {
                echo "<ul>";
                foreach ($resultados as $fila) {
                    echo '<script type="text/javascript">
                            alert("$fila[`nombre_producto`])");
                            </script>'
                    //echo "<li>" . htmlspecialchars($fila['nombre_producto']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "No se encontraron productos.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Por favor, ingresa el nombre de un producto.";
    }
}
*/
?>
