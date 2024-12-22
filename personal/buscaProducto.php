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
								. htmlspecialchars($fila['idProducto']) . '<-IdCatego   "'
								. htmlspecialchars($fila['nombre']) . '" <-Producto $'
								. htmlspecialchars($fila['precio']) . '  Cantidad->'
								. htmlspecialchars($fila['cantidad']) . '  SKU->'
								. htmlspecialchars($fila['nombre']) . '  Desc(%)->'
								. htmlspecialchars($fila['codigoUnico']) . '  Estado(1|0)->'
								. htmlspecialchars($fila['activo']) . '  Costo($)->'
								. htmlspecialchars($fila['costo'])
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
