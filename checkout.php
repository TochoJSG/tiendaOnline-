<?php
require 'negocio/config.php';
require 'negocio/database.php';
require 'clases/carrito.php';

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
		
?>

<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics   APP_USR-2981243273692847-042103-3e2a9c7daab132fc88385c450800f21e-247812013 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DZ16T2G5PD"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-DZ16T2G5PD');
    </script>
    <meta charset="UTF-8"/> 
    <meta name="description" content="electronica, computadora, laptop, audifonos, bluetooth, Relog inteligente, smartwatch, mouse, relojes, bocinas, muebles, desechables, Materias primas"/>
	<meta name="keywords" content="electronica, computadora, laptop, audifonos, bluetooth, Relog inteligente, smartwatch, mouse, relojes, bocinas, muebles, desechables, Materias primas"/>
	<meta http-equiv="content-security-policy|Content-Type|default-style|refresh" content="text/html; width=device-width; charset=utf-8;" initial-scale="1.0"/>
		<title>Tocha | Productos</title>
	<script src="https://sdk.mercadopago.com/js/v2"></script><!--SDK MP API-->
	<script src="https://www.paypal.com/sdk/js?client-id=AfGJtKOoQTqFZWdiVkXFivK8DT5i6BZovHjw9q5pqHiF5LFo-JkwWEpJ1bhqmI2LgrAm80f6VFnbIGO4&currency=MXN"></script>
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="push.min.js"></script>
	<!--<script src="forma_pago.js" type="javascript"></script>
	<script src="seguridad_mp.js" type="javascript"></script>-->
	<style>td{height:auto;}</style>
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
                <li><a class="activo" target="_blank" href="https://materiasprimastocha.mercadoshops.com.mx/" style="color:#415;">Mercado Libre
                    </a></li>
    <li><a target="_blank" href="https://www.google.com/maps/dir//materias+primas+tocha/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x85ce03c248d73bdb:0xef38793f1e73fa6e?sa=X&ved=2ahUKEwj5rJbYlNvuAhUCJKwKHYXhD1wQ9RcwFXoECB0QBA" style="color:#415;">Google
                    </a></li>
                <li><a id="buttonUs" style="color:#415;">Acerca de
                    </a></li>
                <li><a target="_blank" href="contacto_tocha.html" style="color:#415;">Contacto
                    </a></li>
<li><a href="negocio/carrito.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
    </a></li>
            </ul>
        </nav>
    </header>
<main>
	<div class="container">
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
                            $precio_desc = $producto - (($precio*$descuento)/100);
                            $subtotal = $cantidad * $precio_desc;
                            $total += $subtotal;
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
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
	function  addProduct(id,token){//Actualizacion en tiempo real a paginma sin formulario AJAX
		let url='clases/carrito.php';
		let formData=new FormData();
		formData.append('id',id);
		formData.append('token',token);
		fetch(url,{
			method:'POST',
			body:formData,
			mode:'cors'
		}).then(response=>response.json()).then(data=>{
			if(data.ok){
				let elemento=document.getElementById("num_cart");//tag en header
				elemento.innerHTML=data.numero;
			}
		});
	}
</script>
</body>
</html>