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

$preference->$items = array($item);
$preference->back_urls = array(
    "success"=>"file:///C:/xampp/htdocs/tiendaOnline", //url de hosting, aqui ira al concluir pago
    "fail"=>"file:///C:/xampp/htdocs/tiendaOnline/fallo.html"
);
$preference->auto_return = "approved";
$preference->binary_mode = true;//Solo transacciones aprovadas o canceladas, no incluir pendientes
$preference->save();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercadoPago</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script><!--Posible error con version, agregar 1-->
</head>
<body>
    <h3>Mercado Pago</h3>
    <div class="checkout-btn">

    </div>
    <script>
        const mp=new MercadoPago('TEST-1d3e68a5-0bc9-49e7-8a07-207b3c098846',{
            locale:'es-MX'
        });//Public key
        mp.checkout({
            preference:{
                id:'<?php echo $preference->id;?>'
            },
            render:{
                container:'.checkout-btn',
                label:'pagar con MP'
            }
        });
    </script>
</body>
</html>











