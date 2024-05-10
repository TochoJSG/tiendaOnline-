<?php
require 'negocio/database.php';
$db= new Database();
$con = $db->conectar();
if(!$con){
    die("Error al conectar la Base de Datos");
}
$sqlDB = $con->prepare("SELECT idProducto,nombre,precio,descripcion FROM producto WHERE activo=1");
$sqlDB->execute();
$productos = $sqlDB->fetchAll(PDO::FETCH_ASSOC);

$con = null;

$productosJSON = json_encode($productos);

header('Content-Type: application/json');

echo $productosJSON;
?>