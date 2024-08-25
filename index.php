<?php
require 'negocio/config.php';
require 'negocio/constantes.php';
require 'negocio/database.php';
$db = new Database();
$con = $db->conectar();
$sqlDB = $con->prepare("CALL ObtenerListaProductos();");
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
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DZ16T2G5PD"></script>
    <script>
      window.dataLayer=window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js',new Date());
      gtag('config','G-DZ16T2G5PD');
    </script>
    <meta charset="UTF-8"/> 
	<meta http-equiv="content-security-policy|Content-Type|default-style|refresh" content="text/html; width=device-width; charset=utf-8;" initial-scale="1.0"/>
		<title>Tocha | Comercializadora</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="keywords" content="muebles, electronica, bolsas, materias primas, desechables"/>
	<meta name="description" content="muebles, electronica, desechables, bolsa, comercializadora con ventas online, envios al pais, materias primas tocha"/>
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="imagenes/favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $bootstrap;?>" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="<?php echo $swiper;?>" rel="stylesheet" />
    <script>
    window.onload=function(){const IMAGENES=["imagenes/carrusel0.png","imagenes/carrusel1.png","imagenes/carrusel2.png","imagenes/carrusel3.png"];const TIEMPO_INTERVALO_MILESIMAS_SEG=5000;let posicionActual=0;let $imagen=document.querySelector('#imagen');let intervalo;intervalo=setInterval(pasarFoto, TIEMPO_INTERVALO_MILESIMAS_SEG);function pasarFoto(){if(posicionActual>=IMAGENES.length-1){posicionActual=0;}else{posicionActual++;}renderizarImagen();}function renderizarImagen(){$imagen.style.background=`url(${IMAGENES[posicionActual]})`;}renderizarImagen();}
    </script>
	<style>
    .swiper{width:100%;padding-top:50px;padding-bottom:50px;height:666px;}
    .swiper-slide{background-position:center;background-size:cover;width:300px;height:300px;}
    .swiper-slide img{display:block;width:100%;}
    </style>
</head>
<body style="background:#fff;overflow-x:hidden;">
<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v15.0" nonce="wzsUa4iV"></script>

<a href="<?php echo $whatsapp;?>" class="btn-wsp" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a>  
<script>document.addEventListener('DOMContentLoaded',function(){Push.create('Bienvenido',{body:'Hola, te invitamos a ver nuestro inventario',icon:'COORP (2).jpg',timeout:6666,onClick:function(){window.location='https://materiasprimastocha.mercadoshops.com.mx/';this.close();}});});
</script>
<header>
	<a target="_blank" href="<?php echo $t_mercadoShops;?>" class="logo">Comercializadora Tocha</a>
	<div class="menuToggle"></div>
</header>
<ul class="navigation">
	<li><a data-text="Portada" target="_self" href="ventas.php" onclick="toggleMenu();">Principal</a></li>
	<li><a data-text="Quien escribe esto" id="buttonUs">Nosotros</a></li>
	<li><a data-text="Contacto" target="_self" href="contacto_tocha.php" onclick="toggleMenu();">Contacto</a></li>
</ul>
<div class="aletarga">
<section class="banner" id="home">
	<img class="cover" src="imagenes/main.png" />
	<div class="contentBx">
		<h4>Comercializadora Tocha
			</h4>
		<h1>Bienvenido al Sitio de Comercializadora Tocha. Envios Nacionales de diversos articulos por mayoreo y medio mayoreo, cotiza sin compromiso.
			</h1>
	<div class="grid-containerHead">
		<div class="itemZoomHead">
			<a href="desechables.php">
				<img class="zoom" src="imagenes/d.png"/>
			</a>
		</div>
		<div class="itemZoomHead">
			<a href="bioMas.php">
				<img class="zoom" src="imagenes/bio.png"/>
			</a>
		</div>
		<div class="itemZoomHead">
			<a href="equipos.php">
				<img class="zoom" src="imagenes/el.png"/>
			</a>
		</div>
	</div>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>" class="btn">Ver Tienda Online</a>
	</div>
</section>
</div>
<div class="swiper mySwiper">
	<div id="cardsBd" class="swiper-wrapper">
		<?php foreach($productoss as $producto => $row){ ?> 
			<div id="<?php echo $row['idProducto'];?>" class="swiper-slide cardBd">
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
					<a id="<?php echo $row['idProducto'];?>" class="buyBtn btn btn-primary" type="button" href="ventas.php">Ver</a>			
				</div>
			</div>
		<?php }?>
	</div>
	<div class="swiper-pagination"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
var swiper=new Swiper(".mySwiper",{
effect:"coverflow",grabCursor:true,centeredSlides:true,slidesPerView:"auto",
coverflowEffect:{rotate:50,stretch:0,depth:100,modifier:1,slideShadows:true,},
pagination:{el:".swiper-pagination",},
loop:true,
autoplay:{delay:6666,disableOnInteraction:false,},
});
</script>
<div id="ventas" class="main aletarga">
<script type="text/javascript">
	atOptions={'key':'616899c29662e51f5906c074fcc9478e','format':'iframe','height':90,'width':728,'params':{}};
	document.write('<scr'+'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/616899c29662e51f5906c074fcc9478e/invoke.js"></scr' + 'ipt>');
</script>
	<div class="texto_car">
		<h2>Estamos en <span>Mercadolibre</span>, envios incluidos en muchos Productos a todo Mexico
			</h2>
	<a target="_blank" href="<?php echo $t_mercadoShops;?>"><button class="btnML">
	<div class="icono">
		<svg width="16" height="16" fill="currentcolor">
			<img src="imagenes/ml.png" width="25" height="25"/>
		</svg>
	</div><span>Ver Tienda MercadoLibre</span></button></a>
	<h2>Tambien ofrecemos variedad de Productos por <span>Amazon</span>, Compra Segura con envios incluidos en muchos Productos
			</h2>
	</div>
	<div class="cabecera">
		<p>
			<span class="car_mov"><button class="boton_personalizado" onclick="left_mover()">&#139
				</button></span>
			<span class="car_mov"><button class="boton_personalizado" onclick="right_mover()">&#155 
				</button></span>
		</p>
	</div>
	<section id="carrusel-gral"></section>
	<div class="aletarga contBtnLuz">
	<a target="_blank" href="ventas.php"><span>Compra Seguro paga con MercadoPago</span></a>
    </div>
</div>
<script type="text/javascript">
	atOptions={'key':'616899c29662e51f5906c074fcc9478e','format':'iframe','height':90,'width':728,'params':{}};
	document.write('<scr'+'ipt type="text/javascript" src="http'+(location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/616899c29662e51f5906c074fcc9478e/invoke.js"></scr' + 'ipt>');
</script>
<div class="amz">
<h2>Haz Clic en el Boton para ver la publicacion Completa en <span>Amazon</span></h2>
    <div class="containerCardAmz"></div>
    <br>
<div id="desplegarMas" class="contBtnLuz">
	<a><span>Desplegar mas Productos</span></a>
	<br>
</div>
<div class="btnAnimaLuz" style="width:90%;margin:0 5%;">
	<a href="<?php echo $t_mercadoShops;?>"><span>Ver Mas</span></a>
	<br>
</div>
</div>
<script type="text/javascript">
	atOptions={'key':'616899c29662e51f5906c074fcc9478e','format':'iframe','height':90,'width':728,'params':{}};
	document.write('<scr'+'ipt type="text/javascript" src="http' + (location.protocol === 'https:'?'s':'')+'://www.profitabledisplaynetwork.com/616899c29662e51f5906c074fcc9478e/invoke.js"></scr' + 'ipt>');
</script>
<div class="aletarga" style="display:fixed;">

	<a target="_blank" href="<?php echo $t_mercadoShops;?>"><button class="boton4" style="color:aqua;">Visita nuestra tienda Mercado Libre
        </button></a>
		
	<div class="cont_caja">
		<div id="box">
			<div class="top"></div>
				<div>
					<span></span>
					<span><i class="tape"></i></span>
					<span></span>
					<span><i class="tape"></i></span>
				</div>
		</div>
		<br><h2>Envios incluidos en muchos productos, da clic en los Enlaces</h2>
	</div>

	<div class="grid-containerD">
	<div class="itemZoom">
	<div class="contNoti">
		<div class="contentNoti">
			<h2>Materias Primas</h2>
			<p>Amplia oferta de desechables, dulceria, ingredientes de reposteria y mas al mayoreo y menudeo
			</p>
		</div>
	</div>
		<span>Materias Primas</span>
			<a target="_self" href="desechables.php"><img class="zoom" src="imagenes/MATERIA_PRIMA.jpg" /></a>
	</div>
	<div class="itemZoom">
		<div class="contNoti">
    		<div class="contentNoti">
    			<h2>Productos para Huerto Urbano</h2>
    			<p>Comercio de fertilizantes y otros articulos para huerto urbano</p>
    		</div>
    	</div>
		<span>BioMas</span>
			<a target="_self" href="bioMas.php"><img class="zoom" src="imagenes/MASCOTAS.jpg" /></a>
	</div>
	<div class="itemZoom">
    	<div class="contNoti">
    		<div class="contentNoti">
    			<h2>Lo Mejor en Electronica</h2>
    			<p>Una seleccion de los mejores articulos de electronica en Amazon con la mejor relacion precio calidad</p>
    		</div>
    	</div>
		<span>Electronica y Muebles</span>
			<a target="_self" href="equipos.php"><img class="zoom" src="imagenes/ACCESORIOSyELECTRONICA.jpg" /></a>
	</div>
	</div>
</div>

<div class="carousel">
    <script type="text/javascript">
    	atOptions={'key':'616899c29662e51f5906c074fcc9478e','format':'iframe','height':90,'width':728,'params':{}};
    	document.write('<scr'+'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/616899c29662e51f5906c074fcc9478e/invoke.js"></scr' + 'ipt>');
    </script>
	<div id="imagen"></div>
</div>
<footer>
<ul class="social_icon">
	<li><a href="<?php echo $facebook;?>"><ion-icon name="logo-facebook"></ion-icon></a></li>
	<li><a href="<?php echo $t_mercadoShops;?>"><ion-icon name="logo-google"></ion-icon>
		</a></li>
	<li><a href="#"><ion-icon name="logo-instagram"></ion-icon>
		</a></li>
</ul>
<ul class="menu_f">
    <li><a target="_blank" href="<?php echo $t_mercadoShops;?>">MercadoLibre</a></li>
	<li><a target="_self" href="index.php">Principal</a></li>
	<li><a id="buttonUs" style="color:#fff;">Quienes Somos</a></li>
	<li><a target="_self" href="ventas.php">Productos</a></li>
	<li><a target="_self" href="contacto_tocha.php">Contacto</a></li>
</ul>
<div class="fb-comments" data-href="https://tochamateriasprimas.com/" data-width="100%" data-numposts="5"></div>
</footer>
<div class="footer_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.788628418763!2d-99.06939878578389!3d19.29155605017614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce03c248d73bdb%3A0xef38793f1e73fa6e!2sMateriasPrimas%20Tocha!5e0!3m2!1ses-419!2smx!4v1636081671822!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<div class="copyrightText">
	<div class="grid-container">
	<div>
		<a href="<?php echo $t_mercadoShops;?>"><img class="logo" src="imagenes/COORP (2).jpg" align="left"/></a>
	</div>
	<div>
		<a href="www.admingtutoriales.com"><p>Adming Desarrollos
			</p>
	<marquee width="60%" direction="left" scrollamount="6">
		Sitios Web a la medida (Tan complejo o tan sencillo como lo necesites), economicos y profesionales, tambien Aplicaciones Web y Aplicaciones de escritorio, da clic en Adming Desarrollos arribita.
			</marquee></a>
	</div>
	<div>
		<a href="http://admingtutoriales.com/"><img class="logo" src="imagenes/adming.jpg" align="right"/></a>
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
    <div class="contentCola">
		<p class="texto_nosotros">Somos un negocio con variedad en mercancias y ramas, ofreciendo asi un trato serio y formal, con presencia en plataformas de comercio, buscanos.
			</p>
		<p class="texto_nosotros">Le ofrecemos tratar con gente seria en un local bien establecido, estamos abiertos a negociar con usted acuerdos que nos beneficien a ambos, contactenos y conozcanos. Haga la Prueba.
			</p>
    </div>
    <button class="collapsible">Mision</button>
    <div class="contentCola">
      <p class="texto_nosotros">Ofrecer productos de materiales ecológicos de la mejor calidad para evitar el rápido desecho y contribuir así a minimizar el impacto ambiental.
		</p>
      <p class="texto_nosotros">Ofrecer productos de utilidad y calidad a precios accesibles para cualquier persona contribuyendo asi al ahorro.
		</p>
    </div>
    <button class="collapsible">Vision</button>
    <div class="contentCola">
      <p class="texto_nosotros">Consolidar la tienda en linea, a traves de las buenas practicas comerciales con productos de calidad y cuidando el precio.</p>
      <p class="texto_nosotros">Facilitar la compra online a las personas y tener alcance nacional con tiendas fisicas.</p>
      <p class="texto_nosotros">Contribuir al cuidado del ambiente con productos con materiales amigables y durareros.</p>
    </div>	
	<a href="<?php echo $t_mercadoShops;?>"><button class="btnML btn-darkML">
		<div class="icono">
			<svg width="16" height="16" fill="currentcolor">
				<img src="imagenes/ml.png" width="25" height="25"/>
			</svg>
		</div>
		<span>Ve nuestra tienda en Mercado Libre</span>
	    </button></a>
	<img class="mamalon" src="imagenes/0.jpg" />
</div>
<script src="negocio\push.min.js"></script>
<script type="text/javascript" src="negocio/insercionIndex.js"></script>
<script type="text/javascript" src="presentacion/menuToggle.js"></script>
<script type="text/javascript" src="presentacion/aletarga.js"></script>
<script type="text/javascript" src="presentacion/car_commerce.js"></script>
<script type="text/javascript" src="presentacion/efecto_header.js"></script>
<script type="text/javascript" src="presentacion/tochaUs.js"></script>
<script type="text/javascript" src="presentacion/extiende.js"></script>
<script type="text/javascript" src="negocio/facebookJs.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&amp;version=v15.0" nonce="jfx8ZnYd"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>	
</html>