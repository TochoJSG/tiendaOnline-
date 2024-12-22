<?php 
require '../negocio/config.php';
require '../negocio/constantes.php';
require '../negocio/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $database = new Database();
        $conn = $database->conectar();

        $nombre = filter_input(INPUT_POST, 'nombres', FILTER_SANITIZE_STRING);
        $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
        $sueldo = filter_input(INPUT_POST, 'sueldo', FILTER_VALIDATE_FLOAT);
        $telefono = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $rfc = filter_input(INPUT_POST, 'rfc', FILTER_SANITIZE_STRING);
        $fecha_ingreso = filter_input(INPUT_POST, 'fechaIngreso', FILTER_SANITIZE_STRING);
        $departamento = filter_input(INPUT_POST, 'departamento', FILTER_VALIDATE_INT);
        $rol = filter_input(INPUT_POST, 'rol', FILTER_VALIDATE_INT);
        $contrato = filter_input(INPUT_POST, 'contrato', FILTER_VALIDATE_INT);

        if ($nombre && $apellidos && $sueldo && $telefono && $rfc && $fecha_ingreso && $departamento && $rol && $contrato) {
            $sql = $conn->prepare("CALL insertarEmpleado(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $sql->execute([$nombre, $apellidos, $sueldo, $telefono, $email, $rfc, $fecha_ingreso, $departamento, $rol, $contrato]);

            echo '<script>alert("Empleado registrado exitosamente."); window.location.href="./";</script>';
        } else {
            echo '<script>alert("Por favor, completa todos los campos obligatorios.");</script>';
        }
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    } finally {
        $conn = null;
    }
}
?>
