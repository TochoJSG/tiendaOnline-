<?php 
require 'vendor/autoload.php';
require 'negocio/config.php';
MercadoPago\SDK::setAccessToken(TOKEN_MP);

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = '0001';
$item->title = 'Producto CNP';
$item->quantity = 1;
$item->unit_price = 100.00;
$item->currency_id = "MXN";

$preference->items = array($item);
$preference->back_urls = array(
    "success"=>"https://tochamateriasprimas.com/compraExitosa.html", //url de hosting, aqui ira al concluir pago
    "fail"=>"https://tochamateriasprimas.com/departamentos.php"
);
$preference->auto_return = "approved";
$preference->binary_mode = true;//Solo transacciones aprovadas o canceladas, no incluir pendientes
$preference->save();
?>