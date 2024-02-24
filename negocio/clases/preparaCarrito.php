<?php

require 'negocio/clases/carrito.php';
require 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken("TEST-2981243273692847-042103-d5025d0d1cf6a6305874c380a43c7b4d-247812013");

$preference = new MercadoPago\Preference();
$productos_mp = array();

$db = new Database();//Creamos BD
$con = $db->conectar();//Asignamos a var conector ejecutando metodo conectar
$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;//productos contendra valor si existe para luego validar
print_r($_SESSION);
$lista_carrito = array();
if($productos!=null){//Si variable anteriormente asignada contiene producto
    foreach($productos as $clave => $cantidad ){//Arreglo de productos como clave, obtenemos cantidad de Arts cargados en carrito
        $sql = $con->prepare("SELECT id,nombre,precio,descuento, $cantidad as cantidad FROM producto WHERE idProducto=? AND activo=1");//Solo traera variable como resultado, sin tocar nada de la BD
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetchAll(PDO::FETCH_ASSOC);	
    }
}else{
    header("Location: departamentos.php");
    exit;
}

$preference->items = $productos_mp;
$preference->items = array($item);
$preference->back_urls = array(
    "success"=>"https://tochamateriasprimas.com/pagoExitoso.html", //url de hosting, aqui ira al concluir pago
    "fail"=>"https://tochamateriasprimas.com/compraExitosa.html"
);
$preference->auto_return = "approved";
$preference->binary_mode = true;//Solo transacciones aprovadas o canceladas, no incluir pendientes
$preference->save();
?>