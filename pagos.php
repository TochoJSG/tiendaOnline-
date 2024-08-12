<?php
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
}*/

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
}
?>
<html>
<head>
    <meta charset="UTF-8"/> 
	<meta http-equiv="content-security-policy|Content-Type|default-style|refresh" content="text/html; width=device-width; charset=utf-8;" initial-scale="1.0"/>
		<title>Tocha | pagos</title>
	<script src="https://sdk.mercadopago.com/js/v2"></script><!--SDK MP API-->
	<script src="https://www.paypal.com/sdk/js?client-id=AfGJtKOoQTqFZWdiVkXFivK8DT5i6BZovHjw9q5pqHiF5LFo-JkwWEpJ1bhqmI2LgrAm80f6VFnbIGO4&currency=MXN"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css"/>

</head>
<body>
    <header id="main-header">
        <a href="index.html"><img class="logo" src="COORP (2).jpg" align="left" width="90px" height="90px"/></a>
        <a id="logo-header" target="_blank" href="index.html">
            <span class="site-name">Grupo Tocha</span>
            <span class="site-desc">Desechable / Bolsa / Insumos</span>
        </a>
        <nav>
            <ul>
                <li><a href="negocio/carrito.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a></li>
            </ul>
        </nav>
    </header>
<main>
	<div class="container">
	    <div class="row">
	    <div class="col-6">
    		<h4>Metodos de Pago</h4>
    		<div class="row">
    			<div class="col-12">
    				<div id="paypal-button-container" class="paypal-button-container"></div>
    			</div>
    		</div>
    		<br>
    		<div class="row">
    			<div class="mx-auto" style="width:333px;">
    				<div class="checkout-btn"></div>
    			</div>
    		</div>
    	</div>
		<div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito==null){
                        echo '<tr><td colspan="5" class="text-center"><b>Carrito de Compras Vacio</b></td></tr>';
                    }else{$total=0;
                        foreach($lista_carrito as $producto){
                            $_id = $producto['id'];
                            $nombre = $productp['nombre'];
                            $precio = $producto['precio'];
                            $descuento = $producto['descuento'];
                            $cantidad = $producto['cantidad'];
                            
                            $precio_desc = $producto - (($precio*$descuento)/100);
                            $subtotal = $cantidad * $precio_desc;
                            $total += $subtotal;
                            
                            $item = new MercadoPago\Item();
                            $item->id = $_id;
                            $item->title = $nombre;
                            $item->quantity = $cantidad;
                            $item->unit_price = $precio;
                            $item->currency_id = "MXN";
                            
                            array_push($productos_mp,$item);
                            unset($item);
                    ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo MONEDA . number_format($precio_desc,2,'.',','); ?></td>
                        <td><input type="number" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange=""></td>
                        <td><div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2,'.',','); ?></div></td>
                        <td><a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toogle="modal" data-bs-target="eliminaModal">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
        </div>
	</div>
</main>
<div class="container-fluid grid text-center">
	<div id="cardsBd" class="row">
		<?php foreach($productoss as $producto => $row){ ?> 
			<div id="<?php echo $row['idProducto'];?>" class="card cardBd ">
			    <div class="card-header">
    				<?php
    				$id=$row['idProducto'];
    				$imagen="imagenes/productos/".$id."/principal.jpg";
    				$carrito = array("id"=>$id, "nombre"=>$row['nombre'], "precio"=>$row['precio']);
    				if(!file_exists($imagen)){
    					$imagen="imagenes/sin-foto.jpg";
    				}   ?>
    				<img class="card-img-top" src="<?php echo $imagen; ?>" alt="cargando..." style="height:250px;" />
				</div>
				<div class="card-body col-6">
					<h5 id="tituloCard" class="card-title"><?php echo $row['nombre']; ?></h5>
					<h3 id="precioCard" class="card-text"><?php echo number_format($row['precio'],2,'.',','); ?></h3>						
					<a id="detalleCard" class="btn btn-secondary" type="button" target="_blank" href="detalles.php?id=<?php echo $row['idProducto'];?>&token=<?php echo hash_hmac('sha1',$row['idProducto'],KEY_TOKEN);?>">Detalles</a>
					<a id="<?php echo $row['idProducto'];?>" class="buyBtn btn btn-primary" type="button" onclick="addProduct('<?php echo  $row['idProducto'];?>','<?php echo hash_hmac('sha1',$row['idProducto'],KEY_TOKEN);?>' );">Agregar</a>			
				</div>
			</div>
		<?php }?>
	</div>
</div>
<?php
$preference->items = $productos_mp;
$preference->back_urls = array(
    "success"=>"file:///C:/xampp/htdocs/tiendaOnline", //url de hosting, aqui ira al concluir pago
    "fail"=>"file:///C:/xampp/htdocs/tiendaOnline/fallo.html"
);
$preference->auto_return = "approved";
$preference->binary_mode = true;//Solo transacciones aprovadas o canceladas, no incluir pendientes
$preference->save();
?>
<script src="pagos.js"></script>

</body>
</html>