<?php
//require 'negocio/config.php';
//require 'negocio/database.php';
//require 'negocio/clases/carrito.php';
//$db = new Database();//Creamos BD
//$con = $db->conectar();//Asignamos a var conector ejecutando metodo conectar
require 'negocio/database.php';
require 'negocio/clases/carrito.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare("SELECT idProducto,nombre,precio FROM producto WHERE activo=1");
$sql->execute();

$productoss = $sql->fetchAll(PDO::FETCH_ASSOC);
//echo json_encode($productoss);//Funciona de perlas la consulta

$productos = isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;//productos contendra valor si existe para luego validar
print_r($_SESSION);
$lista_carrito = array();
if($productos!=null){//Si variable anteriormente asignada contiene producto
    echo 'resultado=>'.json_encode($productos);
    foreach($productos as $clave => $cantidad ){//Arreglo de productos como clave, obtenemos cantidad de Arts cargados en carrito
        $sql2 = $con->prepare("SELECT idProducto,nombre,precio,descuento, $cantidad as cantidad FROM producto WHERE idProducto=? AND activo=1");//Solo traera variable como resultado, sin tocar nada de la BD
        $sql2->execute([$clave]);
        $lista_carrito[] = $sql2->fetch(PDO::FETCH_ASSOC);
    }
}else{echo 'resultadoCarrito=>'.json_encode($productos);}
?>