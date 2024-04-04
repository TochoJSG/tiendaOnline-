<?php 
define("CLIENTE_ID","AfGJtKOoQTqFZWdiVkXFivK8DT5i6BZovHjw9q5pqHiF5LFo-JkwWEpJ1bhqmI2LgrAm80f6VFnbIGO4");
define("TOKEN_MP","TEST-2981243273692847-042103-d5025d0d1cf6a6305874c380a43c7b4d-247812013");
define("PublicKey","TEST-1d3e68a5-0bc9-49e7-8a07-207b3c098846");
define("CURRENCY","MXN");
define("KEY_TOKEN","2014131176*$%_");
define("MONEDA","$");
$num_cart = 0;
session_start();//inicia sesion al entrar al portal
//$_SESSION['carrito']['producto'] = array();//$carrito = $_SESSION['carrito'] = array();
$_SESSION['carrito']['producto'] = array();
if(isset($_SESSION['carrito']['producto'])){//Validacion Variable esta definida?  $_SESSION['carrito']['producto']
	$num_cart = count($_SESSION['carrito']['producto']);//Si tiene producto, lo retiene para tag header 'Carrito'
}
?>