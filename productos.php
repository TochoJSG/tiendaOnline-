<?php
require 'negocio/config.php';
require 'negocio/clases/consulta.php';
/*require 'negocio/config.php';
require 'negocio/database.php';
require 'negocio/clases/carrito.php';

$db = new Database();//Creamos BD
$con = $db->conectar();//Asignamos a var conector ejecutando metodo conectar
$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;//productos contendra valor si existe para luego validar
print_r($_SESSION);
$lista_carrito = array();
if($productos!=null){//Si variable anteriormente asignada contiene producto
    foreach($productos as $clave => $cantidad ){//Arreglo de productos como clave, obtenemos cantidad de Arts cargados en carrito
        $sql = $con->prepare("SELECT id,nombre,precio,descuento, $cantidad as cantidad FROM productos WHERE id=? AND activo=1");//Solo traera variable como resultado, sin tocar nada de la BD
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetchAll(PDO::FETCH_ASSOC);	
    }
}

require 'negocio/config.php';
require 'negocio/database.php';
require 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken(TOKEN_MP);

$preference = new MercadoPago\Preference();
$productos_mp = array();

$db = new Database();
$con = $db->conectar();
$productos = isset($_SESSION['carrito']['productos'])? $_SESSION['carrito']['productos'] : null;
print_r($_SESSION);
$lista_carrito = array();
if($productos != null){
	foreach($productos as $clave => $cantidad){
		$sql = $con->prepare("SELECT id,nombre,precio,descuento,$cantidad AS cantidad FROM ");
		$sql->execute([$clave]);
		$lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
	}
}else{
	header("Location: ventas.php");
	exit;
}*/
?>