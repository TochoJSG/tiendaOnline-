<?php
require 'negocio/config.php';
require 'negocio/constantes.php';
require 'negocio/database.php';
$db= new Database();
$con = $db->conectar();
$sqlDB = $con->prepare("SELECT idProducto,nombre,precio FROM producto WHERE activo=1");
$sqlDB->execute();
$productoss = $sqlDB->fetchAll(PDO::FETCH_ASSOC);

$productos = isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;//productos contendra valor si existe para luego validar $_SESSION['carrito']['producto']
$carrito = array();

if($productos != null){//Si se selecciono producto, no es nulo, por lo tanto consultamos BD para llenar carrito
    foreach($productos as $clave => $cantidad ){//or cada producto seleccionado, consultammos
        $sqlDB = $con->prepare("SELECT idProducto,nombre,precio,descuento,$cantidad AS cantidad FROM producto WHERE idProducto=? AND activo=1");//Solo traera variable como resultado, sin tocar nada de la BD
        $sqlDB->execute([$clave]);
        $carrito[] = $sqlDB->fetch(PDO::FETCH_ASSOC);	
    }
} //print_r($_SESSION); //   php include 'negocio/clases/mercadoPagoIni.php'; 
?>
<!doctype html>
<html>
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DZ16T2G5PD"></script><!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-DZ16T2G5PD');
    </script>
		<title>Muebles & Electronica</title>
	<meta charset="utf-8"/>
	<meta name="keywords" content="computadora, laptop, audifonos bluetooth, Relog inteligente, smartwatch, mouse, relojes, bocinas, muebles, electronica"/>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="<?php echo $swiper;?>"/>
    <link rel="stylesheet" href="<?php echo $bootstrap;?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="copyright" content="Grupo Tocha" />
	<link rel="stylesheet" type="text/css" href="presentacion/estilo_muebles.css"/>
	<link rel="stylesheet" type="text/css" href="presentacion/estilo_foo_anima_tocha.css"/>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&amp;version=v15.0" nonce="wzsUa4iV"></script>
<a href="<?php echo $whatsapp;?>" class="btn-wsp" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a>
<div id="fb-customer-chat" class="fb-customerchat"></div>
<script src="negocio/facebookJs.js"></script>

<div class="aletarga">
<section class="videoHeader">
	<header id="main-header" style="z-index:100;">
	<a target="_self" href="index.php"><img class="logo" src="imagenes/COORP (2).jpg" align="left" width="90px" height="90px"/>
		</a>
	<a id="logo-header" target="_self" href="index.php">
		</a>
	<nav>
		<ul>
			<li><a class="activo" target="_blank" href="<?php echo $t_mercadoShops;?>">Mercado Libre</a></li>
		</ul>
		</nav>
	</header>
		<video src="imagenes/videoHeader.mp4" autoplay="" muted="false" loop="">
			</video>
	<div class="blog">
	<p>Lee nuestro blog sobre Tecnologia, encontaras Posts que te ayudaran a decidir mejor que aparatos comprar, te explicamos los tecnisismos y sus cualidades,para comprar Electronica Inteligentemente.
		</p>
	<div class="btnWaves">
	<a target="_blank" href="<?php echo $t_mercadoShops;?>"><span>Ver Blog</span>
		<div class="liquid"></div></a>
	</div></div>
</section>
</div>
<script type="text/javascript">
	atOptions = {
		'key' : '616899c29662e51f5906c074fcc9478e',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	
</script>
<div id="productos">
    <div id="temp"></div>
</div>
<script type="text/javascript" src="negocio/insercion_fifi.js"></script>
<br>
<script type="text/javascript">
	atOptions = {
		'key' : '616899c29662e51f5906c074fcc9478e',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	
</script>
<div class="cont_caja">
<div id="box">
	<div class="top"></div>
		<div>
			<span></span>
			<span>
				<i class="tape"></i>
	        </span>
			<span></span>
			<span>
				<i class="tape"></i>
			</span>
		</div>
</div>
	<br>
<h2>Envios incluidos en muchos productos, da clic en los Enlaces
	</h2>
</div>
<footer>
<div class="waves">
	<div class="wave" id="wave1"></div>
</div>
<ul class="social_icon">
	<li><a target="_blank" href="<?php echo $facebook;;?>"><ion-icon name="logo-facebook"></ion-icon></a></li>
	<li><a target="_blank" href="<?php echo $google;?>"><ion-icon name="logo-google"></ion-icon>
		</a></li>
	<li><a href="#"><ion-icon name="logo-instagram"></ion-icon>
		</a></li>
</ul>
<ul class="menu_f">
    <li><a href="<?php echo $t_mercadoShops;?>">MercadoLibre</a></li>
	<li><a target="_self" href="index.php">Principal</a></li>
	<li><a id="buttonUs">Quienes Somos</a></li>
	<li><a target="_self" href="ventas.php">Productos</a></li>
	<li><a target="_self" href="contacto_tocha.php">Contacto</a></li>
</ul>
<div class="fb-comments" data-href="https://tochamateriasprimas.com/" data-width="100%" data-numposts="5"></div>
</footer>
<div class="footer_map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.788628418763!2d-99.06939878578389!3d19.29155605017614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce03c248d73bdb%3A0xef38793f1e73fa6e!2sMateriasPrimas%20Tocha!5e0!3m2!1ses-419!2smx!4v1636081671822!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<div class="copyrightText" style="background:#daff;">
	<div class="grid-container">
	<div>
	<a targeet="_blank" href="<?php echo $t_mercadoShops;?>"><img class="logo" src="imagenes\COORP (2).jpg" align="left" width=60px height=60px/>
		</a>
	</div>
	<div>
	<a traget="_blank" href="www.admingtutoriales.com"><p style="color:#040105;">Adming Desarrollos</p></a>
	<marquee width="60%" direction="left" scrollamount="6" style="color:#040105;">
		Sitios Web a la medida (Tan complejo o tan sencillo como lo necesites), economicos y profesionales, tambien Aplicaciones Web y Aplicaciones de escritorio, da clic en Adming Desarrollos arribita.
			</marquee>
	</div>
	<div>
	<a target="_blank" href="http://admingtutoriales.com/"><img class="logo" src="imagenes/adming.jpg" align="left" width=60px height=60px/>
		</a>
	</div>
	</div>
</div>
<div id="nosotros" class="modal"><!--Nosotros-->
	<div class="headerForm">
		<span><img class="logo" src="imagenes/COORP (2).jpg"/></span>
		<h2>Acerca de Nosotros</h2>
		<span id="closeMP" class="close" title="Close Modal">&times;</span>
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
	<a target="_self" href="ventas.php"><button class="botones">Observa nuestro Catalogo de Productos
		</button></a>		
	<a targeet="_blank" href="<?php echo $t_mercadoShops;?>"><button class="btnML btn-darkML">
		<div class="icono">
			<svg width="16" height="16" fill="currentcolor">
				<img src="imagenes/ml.png" width="25" height="25"/>
			</svg>
		</div>
		<span>Ve nuestra tienda en Mercado Libre</span>
	    </button></a>
	<img class="mamalon" src="imagenes/0.jpg" />
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="negocio/videoJS.js"></script>
<script type="text/javascript" src="negocio/aletarga.js"></script>
<script type="text/javascript" src="negocio/swiper.js"></script>
<script type="text/javascript" src="presentacion/tochaUs.js"></script>
</body>
</html>