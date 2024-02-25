<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');?>
<html lang="es">
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
    <?php include 'negocio/mercadoPagoIni.php';?>
	<script src="https://sdk.mercadopago.com/js/v2"></script><!--SDK MP API-->
	<script src="https://www.paypal.com/sdk/js?client-id=AfGJtKOoQTqFZWdiVkXFivK8DT5i6BZovHjw9q5pqHiF5LFo-JkwWEpJ1bhqmI2LgrAm80f6VFnbIGO4&currency=MXN"></script>
	<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&amp;version=v15.0" nonce="wzsUa4iV"></script>-->
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="imagenes/favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="negocio/push.min.js"></script>
</head>
<body>
	<a href="https://api.whatsapp.com/send/?phone=525610936170&text=Gracias%20por%20contactarnos,%20%C2%BFComo%20te%20podemos%20ayudar?"
	class="btn-wsp" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a>
<script>document.addEventListener('DOMContentLoaded',function(){Push.create('Bienvenido',{body:'Hola, da clic en el recuadro y compra con envio incluido !!!',icon:'imagenes/COORP (2).jpg',timeout:6666,onClick:function(){window.location='https://materiasprimastocha.mercadoshops.com.mx/';this.close();}});});
	</script>
<header id="main-header">
	<a href="index.html"><img class="logo" src="imagenes/COORP (2).jpg" align="left" width="90px" height="90px"/></a>
	<a id="logo-header" target="_blank" href="index.html">
		<span class="site-name">Grupo Tocha</span>
		<span class="site-desc">Desechable / Bolsa / Insumos</span>
	</a>
	<nav>
		<ul>
		    <li><a class="activo" target="_blank" href="https://materiasprimastocha.mercadoshops.com.mx/"><b>Mercado Libre</b>
		        </a></li>
<li><a target="_blank" href="https://www.google.com/maps/dir//materias+primas+tocha/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x85ce03c248d73bdb:0xef38793f1e73fa6e?sa=X&ved=2ahUKEwj5rJbYlNvuAhUCJKwKHYXhD1wQ9RcwFXoECB0QBA"><b>Google</b>
				</a></li>
			<li><a id="buttonUs"><b>Acerca de</b>
			    </a></li>
			<li><a target="_blank" href="contacto_tocha.html"><b>Contacto</b>
			    </a></li>
<li><a href="negocio/checkout.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span>
				</a></li>
		</ul>
	</nav>
</header>

<div class="navigation">
	<div class="toggle">
		<span></span></div>
	<div class="row" id="cardDrop"></div>
</div>
<template id="template-drop">
	<ul>
		<li></li>
	</ul>
</template>
<script src="negocio/dropdown.js"></script>

<main class="container">
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
	
	<div class="col-6">
		<div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito==null):
                        echo '<tr><td colspan="5" class="text-center"><b>Carrito de Compras Vacio</b></td></tr>';
                    else:
                        $total=0;
                        foreach($lista_carrito as $producto){
                            $_id = $producto['idProducto'];
                            $nombre = $productp['nombre'];
                            $precio = $producto['precio'];
                            $descuento = $producto['descuento'];
                            $cantidad = $producto['cantidad'];
                            $precio_desc = $producto - (($precio*$descuento)/100);
                            $subtotal = $cantidad * $precio_desc;
                            $total += $subtotal;
                            $item = new MercadoPago\Item();
                            $item->$id = $_id;
                            $item->$title = $nombre;
                            $item->$quantity = $cantidad;
                            $item->$unit_price = $precio_desc;
                            $item->$currency = "MXN";
                            array_push($productos_mp,$item);
                            unset($item);
                    ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><div id="subtotal_<?php echo $_id;?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2,'.',',');?></div></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2"><p class="h3 text-end" id="total"><?php MONEDA.number_format($total,2,'.',',');?></p></td>
                    </tr>
                </tbody>
                <?php endif ?>
            </table>
        </div>
	</div>
</div>
</main>

<!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminaModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        ¿Desea bajar <php? echo $nombre; ?> de su Carrito de compras?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
    </div>
</div>
</div>

<div class="container-fluid grid text-center">
	<div class="row">
		<?php foreach($productoss as $producto => $row){ ?> 
			<div class="card">
			    <div class="card-header">
				<?php
				$id=$row['idProducto'];
				$imagen="imagenes/productos/".$id."/principal.jpg";
				if(!file_exists($imagen)){
					$imagen="imagenes/sin-foto.jpg";
				}
				?>
				<img class="card-img-top" src="<?php echo $imagen; ?>" alt="cargando..." style="height:250px;">
				</div>
			<div class="card-body">
				<h5 class="card-title"><?php echo $row['nombre']; ?></h5>
				<h3 class="card-text"><?php echo number_format($row['precio'],2,'.',','); ?></h3>
				<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group align-items-center" role="group">
						<a class="btn btn-secondary" target="_blank" href="detalles.php?id=<?php echo $row['idProducto'];?>&tocken=<?php echo hash_hmac('sha1',$row['idProducto'],KEY_TOKEN);?>" class="btn btn-primary">Detalles</a>
						<a class="btn btn-primary" onclick="addProduct('<?php echo  $row['idProducto'];?>','<?php echo hash_hmac('sha1',$row['idProducto'],KEY_TOKEN);?>' );">Agregar</a>
					</div>
				</div>
			</div>
			</div>
		<?php }?>
	</div>
</div>

<div class="align-items-xl-center">
<div class="menu_deptos">
<h2 class="colores">Departamentos
	</h2>
<div class="select_depto">
<div>
	<button id="a" class="boton3" onclick="matPrimas()">Comprar productos
		</button>
</div>
<div>
	<button id="b" class="boton3" onclick="mascotas()">Bio+
		</button>
</div>
<div>
	<button id="c" class="boton3" onclick="electronicos()">Electronica
	    </button>
</div>
</div>
	
<div id="matPrima"><!--Departamento Materia Prima-->
    <div class="row" id="cards"></div>
    <template id="template-card">
        <div class="card">
          <div class="card-body">
            <h5>Titulo</h5>
            $<span>precio</span>
            <p></p>
            <section></section>
            <a></a>
            <button class="btn btn-dark">Comprar en el Sitio</button>
          </div>
        </div>
    </template>
</div>
	
<div id="mascota"><!--Departamento Mascotas-->
	<div class="containerEco">
		<div class="boxEco">
			<span></span>
		<div class="contentEco">
			<h2>Producto</h2>
			<p>Descripcion
				</p>
			<a href="#">enlace</a>
		</div>
		</div>
		<div class="boxEco">
			<span></span>
		<div class="contentEco">
			<h2>Producto</h2>
			<p>Descripcion
				</p>
			<a href="#">enlace</a>
		</div>
		</div>
		<div class="boxEco">
			<span></span>
		<div class="contentEco">
			<h2>Producto</h2>
			<p>Descripcion
				</p>
			<a href="#">enlace</a>
		</div>
		</div>
	</div>
</div><!--Fin de Depto-->
	
<div id="electronica"><!--Departamento Electronica-->
<div class="containerCardAmz">
</div>
</div><!--Fin de Departamento-->

</div><!--Cierra DIV contenedor de deptos. general-->
</div>
<!--<div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100064943526728" data-tabs="timeline" data-width="500" data-height="80" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/profile.php?id=100064943526728" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100064943526728">Tocha</a></blockquote></div>-->

<!--<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat"></div>
<script src="negocio/facebookJs.js"></script>-->

<!--<div id="fb-root"></div>-->

<footer>
	<ul class="social_icon">
	<li><a href="https://www.facebook.com/Tocha-106771524802265"><ion-icon name="logo-facebook"></ion-icon></a></li>
<li><a href="https://www.google.com/maps/dir//materias+primas+tocha/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x85ce03c248d73bdb:0xef38793f1e73fa6e?sa=X&ved=2ahUKEwj5rJbYlNvuAhUCJKwKHYXhD1wQ9RcwFXoECB0QBA"><ion-icon name="logo-google"></ion-icon>
			</a></li>
		<li><a href="#"><ion-icon name="logo-instagram"></ion-icon>
			</a></li>
	</ul>
	<ul class="menu_f">
	    <li><a href="https://materiasprimastocha.mercadoshops.com.mx/">MercadoLibre</a></li>
		<li><a href="index.html">Principal</a></li>
		<li><a id="buttonUs">Quienes Somos</a></li>
		<li><a href="departamentos.html">Productos</a></li>
		<li><a href="contacto_tocha.html">Contacto</a></li>
	</ul>
</footer>
<div id="nosotros" class="modal"><!--Nosotros-->
	<div class="headerForm">
		<span><img class="logo" src="imagenes/COORP (2).jpg"/></span>
		<h2>Acerca de Nosotros</h2>
		<span id="closeUs" class="close" title="Close Modal">&times;</span>
	</div>
		<p class="texto_nosotros">Tocha es una comerciliazadora miembro del Mercado Cananea A.C. siendo unos de los locales fundadores del marcado te ofrecemos 30 años de experiencia.
			</p>
	<button class="collapsible">Nosotros</button>
    <div class="content__">
		<p class="texto_nosotros">Somos un negocio con variedad en mercancias y ramas, ofreciendo asi un trato serio y formal, con presencia en plataformas de comercio, buscanos.
			</p>
		<p class="texto_nosotros">Le ofrecemos tratar con gente seria en un local bien establecido, estamos abiertos a negociar con usted acuerdos que nos beneficien a ambos, contactenos y conozcanos. Haga la Prueba.
			</p>
    </div>
    <button class="collapsible">Mision</button>
    <div class="content__">
      <p class="texto_nosotros">Ofrecer productos de materiales ecológicos de la mejor calidad para evitar el rápido desecho y contribuir así a minimizar el impacto ambiental.
		</p>
      <p class="texto_nosotros">Ofrecer productos de utilidad y calidad a precios accesibles para cualquier persona contribuyendo asi al ahorro.
		</p>
    </div>
    <button class="collapsible">Vision</button>
    <div class="content__">
      <p class="texto_nosotros">Consolidar la tienda en linea, a traves de las buenas practicas comerciales con productos de calidad y cuidando el precio.</p>
      <p class="texto_nosotros">Facilitar la compra online a las personas y tener alcance nacional con tiendas fisicas.</p>
      <p class="texto_nosotros">Contribuir al cuidado del ambiente con productos con materiales amigables y durareros.</p>
    </div>
		<br>
	<a href="departamentos.html"><button class="botones">Observa nuestro Catalogo de Productos
		</button></a>		
	<a href="https://materiasprimastocha.mercadoshops.com.mx/"><button class="btnML btn-darkML">
		<div class="icono">
			<svg width="16" height="16" fill="currentcolor">
				<img src="imagenes\ml.png" width="25" height="25"/>
			</svg>
		</div>
		<span>Ve nuestra tienda en Mercado Libre</span>
	    </button></a>
	<img class="mamalon" src="imagenes/0.jpg"/>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="negocio/manipula_deptos.js"></script>
<script type="text/javascript" src="negocio/clases/pagos.js"></script>
<script type="text/javascript" src="negocio/clases/actualizaMonto.js"></script>
<!--<script type="text/javascript" src="car_commerce.js"></script>-->
<script type="text/javascript" src="presentacion/tochaUs.js"></script>
<script src="negocio/clases/agregaProds.js"></script>
<script type="text/javascript" src="negocio/app_compras.js"></script>
</body>
</html>