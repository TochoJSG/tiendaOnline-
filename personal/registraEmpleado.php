<?php
    require '../negocio/config.php';
    require '../negocio/constantes.php';
    require '../negocio/database.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            // Habilitar la visualización de errores para depuración
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // Conexión a la base de datos
            $database = new Database();
            $conn = $database->conectar();

            // Validar y sanitizar los datos del formulario
            $nombre = filter_input(INPUT_POST, 'nombres', FILTER_SANITIZE_STRING);
            $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
            $sueldo = filter_input(INPUT_POST, 'sueldo', FILTER_VALIDATE_FLOAT);
            $telefono = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
            $rfc = filter_input(INPUT_POST, 'rfc', FILTER_SANITIZE_STRING);
            $fecha_ingreso = filter_input(INPUT_POST, 'ingreso', FILTER_SANITIZE_STRING);
            $departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_NUMBER_INT);
            $rol = filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_NUMBER_INT);
            $contrato = filter_input(INPUT_POST, 'contrato', FILTER_SANITIZE_NUMBER_INT);

            // Validar campos obligatorios
            if (
                $nombre !== null && 
                $apellidos !== null && 
                $sueldo !== false && 
                $telefono !== null && 
                $rfc !== null && 
                $fecha_ingreso !== null && 
                $departamento !== null && 
                $rol !== null && 
                $contrato !== null
            ) {
                // Preparar la consulta SQL para llamar al procedimiento almacenado
                $sql = $conn->prepare("CALL insertarEmpleado(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                $sql->bindValue(1, $nombre, PDO::PARAM_STR);
                $sql->bindValue(2, $apellidos, PDO::PARAM_STR);
                $sql->bindValue(3, $sueldo, PDO::PARAM_STR);
                $sql->bindValue(4, $telefono, PDO::PARAM_STR);
                $sql->bindValue(5, $email, PDO::PARAM_STR);
                $sql->bindValue(6, $rfc, PDO::PARAM_STR);
                $sql->bindValue(7, $fecha_ingreso, PDO::PARAM_STR);
                $sql->bindValue(8, $departamento, PDO::PARAM_INT);
                $sql->bindValue(9, $rol, PDO::PARAM_INT);
                $sql->bindValue(10, $contrato, PDO::PARAM_INT);

                // Ejecutar el procedimiento almacenado
                if ($sql->execute()) {
                    echo '<script type="text/javascript">
                            alert("Empleado registrado exitosamente.");
                          </script>';
                } else {
                    echo "<p>Error al registrar el empleado: " . implode(", ", $sql->errorInfo()) . "</p>";
                }
            } else {
                echo "<p>Error: Por favor, completa todos los campos obligatorios correctamente.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Error de conexión o consulta: " . $e->getMessage() . "</p>";
        } finally {
            // Cerrar la conexión si está abierta
            if (isset($conn)) {
                $conn = null;
            }
        }
    }
?>
