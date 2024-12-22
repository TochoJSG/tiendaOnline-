<?php
require '../negocio/config.php';
require '../negocio/constantes.php';
require '../negocio/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si el campo 'nombreBusqueda' fue enviado
    $nombreBusqueda = filter_input(INPUT_POST, 'nombreBusqueda', FILTER_SANITIZE_STRING);

    if (!empty($nombreBusqueda)) {
        // Conexión a la base de datos
        $bd = new Database();
        $conect = $bd->conectar();

        try {
            // Preparar y ejecutar la consulta con el parámetro
            $sqlCon = $conect->prepare("CALL ConsultaProducto(?)");
            $sqlCon->bindParam(1, $nombreBusqueda, PDO::PARAM_STR);
            $sqlCon->execute();

            // Obtener resultados
            $resultados = $sqlCon->fetchAll(PDO::FETCH_ASSOC);

            // Mostrar resultados
            if (!empty($resultados)) {
                echo "<ul>";
                foreach ($resultados as $fila) {
                    /*echo "<li>" . htmlspecialchars($fila['nombre'], ENT_QUOTES, 'UTF-8') . "</li>";*/
                    echo '<li value="' . htmlspecialchars($idProducto) . '">'
								. htmlspecialchars($idCategoria) . '<-IdCatego   "'
								. htmlspecialchars($nombre) . '" <-Producto $'
								. htmlspecialchars($precio) . '  Cantidad->'
								. htmlspecialchars($cantidad) . '  SKU->'
								. htmlspecialchars($sku) . '  Desc(%)->'
								. htmlspecialchars($descuento) . '  Estado(1|0)->'
								. htmlspecialchars($estado) . '  Costo($)->'
								. htmlspecialchars($costo)
								. '</li><br>';
                }
                echo "</ul>";
            } else {
                echo "<p>No se encontraron productos con ese nombre.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
        } finally {
            // Cerrar la conexión
            if ($conect) {
                $conect = null;
            }
        }
    } else {
        echo "<p>Por favor, ingresa el nombre de un producto.</p>";
    }
}
?>
