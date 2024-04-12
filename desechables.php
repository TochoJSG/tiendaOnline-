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
} 
//print_r($_SESSION); //   php include 'negocio/clases/mercadoPagoIni.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DZ16T2G5PD"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-DZ16T2G5PD');
    </script>
    <meta charset="UTF-8">
	<meta http-equiv="content-security-policy|Content-Type|default-style|refresh" content="text/html; width=device-width; charset=utf-8;" initial-scale="1.0"/>
		<title>Tocha | Materias Primas</title>
	<meta name="keywords" content="fiestas, bolsas, desechables, materias primas, desechable, biodegradables"/>	
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="img/favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<link href="presentacion/estilos_tocha_tocha.css" rel="stylesheet" type="text/css"/>
	<link href="presentacion/estilo_car_E-Commerce.css" rel="stylesheet" type="text/css"/>
	<link href="presentacion/botones.css" rel="stylesheet" type="text/css"/>
	<link href="presentacion/estilo_foo_anima_tocha.css" rel="stylesheet" type="text/css"/>
	<script src="push.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo $swiper; ?>" />
	<link rel="stylesheet" href="<?php echo $swiper2;?>" />
	<link rel="stylesheet" href="<?php echo $bootstrap;?>" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<style>
        .swiper{width:100%;padding-top:50px;padding-bottom:50px;height:666px;}
        .swiper-slide{background-position:center;background-size:cover;width:300px;height:300px;}
        .swiper-slide img{display:block;width:100%;}
    </style>
	
</head>
<body>
<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat"></div>
<script src="presentacion/facebookJs.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&amp;version=v15.0" nonce="wzsUa4iV"></script>
<header id="main-header">
<a href="<?php echo $t_mercadoShops;?>">
<img class="logo" src="imagenes/COORP (2).jpg" align="left"/></a>
	<a id="logo-header" target="_self" href="index.php">
		<span class="site-name" target="_self" href="ventas.php">Grupo Tocha</span><br>
		<span class="site-desc">Desechable / Bolsa / Insumos</span>
	</a> <!-- / #logo-header -->
	<nav>
		<ul>
            <li><a target="_blank" class="activo" href="<?php echo $t_mercadoShops;?>">Mercado Libre</a></li>
			<li><a target="_blank" href="<?php echo $google;?>">Google</a></li>
			<li><a id="buttonUs">Acerca de</a></li>
			<li><a target="_self" href="contacto_tocha.php">Contacto</a></li>
		</ul>
	</nav>
</header>
<script>document.addEventListener('DOMContentLoaded',function(){Push.create('Bienvenido',{body:'Hola, te invitamos a ver nuestro inventario',icon:'COORP (2).jpg',timeout:6666,onClick:function(){window.location='https://tochamateriasprimas.com/ventas.php';this.close();}});});</script>
<a href="<?php echo $whatsapp;?>" class="btn-wsp" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a>
<section class="parallax hero_p">
	<div>
    <div class="swiper mySwiper"><!-- Swiper -->
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="imagenes/card1.jpg" alt="loading..."/></div>
        <div class="swiper-slide"><img src="imagenes/card2.jpg" alt="loading..."/></div>
        <div class="swiper-slide"><img src="imagenes/card3.jpg" alt="loading..."/></div>
        <div class="swiper-slide"><img src="imagenes/card4.jpg" alt="loading..."/></div>
        <div class="swiper-slide"><img src="imagenes/card5.jpg" alt="loading..."/></div>
        <div class="swiper-slide"><img src="imagenes/card6.jpg" alt="loading..."/></div>
        <div class="swiper-slide"><img src="imagenes/card7.jpg" alt="loading..."/></div>
        <div class="swiper-slide"><img src="imagenes/card9.jpg" alt="loading..."/></div>
      </div>
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script><!-- Swiper JS -->
	</div>
	</div>
	<div class="presentacion">
		<div>
		<h2>Bienvenido a la pagina de Materias Primas <span>Tocha</span></h2>
		<p>Mas de 30 años de experiencia a tu servicio te garantizan calidad y precio. Contacta sin compromiso para cotizar venta por cajas y bultos, (pregunta, probablemente tenemos). Visita nuestra tienda en linea.
			</p>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>"><button class="botones">Leer Mas</button></a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>"><button class="btnML">
		<div class="icono">
			<svg width="16" height="16" fill="currentcolor">
				<img src="imagenes/ml.png" width="25" height="25" />
			</svg>
		</div>
		<span>Mercado Libre</span>
		</button></a>
		</div>
	</div>
</section>
<div class="main aletarga">
    <br>
    <script type="text/javascript">
	atOptions = {
		'key' : '616899c29662e51f5906c074fcc9478e',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/616899c29662e51f5906c074fcc9478e/invoke.js"></scr' + 'ipt>');
</script>
	<div class="texto_car">
		<h2>Estamos en <span>Mercadolibre</span>, envios incluidos en muchos Productos a todo Mexico			</h2>
	</div>
	<header>
		<p>
			<span class="left"><button class="botones" style="height:auto;background:#323232;color:#fff;" onclick="left_mover();"> &#139 </button></span>
			<span class="right"><button class="botones" style="height:auto;background:#323232;color:#fff;" onclick="right_mover();"> &#155 </button></span>
			</p>
	</header>
	<section id="carrusel-gral"></section>
	<script type="text/javascript" src="presentacion/car_commerce.js"></script>
</div>
<section class="parallax extra">
    <script type="text/javascript">
	atOptions = {
		'key' : '616899c29662e51f5906c074fcc9478e',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaynetwork.com/616899c29662e51f5906c074fcc9478e/invoke.js"></scr' + 'ipt>');
</script>
</section>
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
<div class="amz">
<h2>Haz Clic en el Boton para ver la publicacion Completa en <span>Amazon</span></h2>
    <div class="containerCardAmz"></div>
<div id="desplegarMas" class="contBtnLuz">
	<a><span>Desplegar mas Productos</span></a><br>
</div>
<div class="btnAnimaLuz" style="width:90%;margin:0 5%;">
	<a target="_blank" href="<?php echo $t_mercadoShops;?>"><span>Ver Mas</span></a>
	<br>
</div>

</div>
<div class="aletarga">
    <a href="<?php echo $t_mercadoShops;?>"><button class="botones_sayayin">Observa mas Productos que tenemos para ti</button></a>
	<div class="catalogo">
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/i.png" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/b.png" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/c.png" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/d.png" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/e.png" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/f.jpg" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/j.jpg" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/h.jpg" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/a.jpg" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/k.png" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/g.png" alt="loading..."/>
			</a>
		<a target="_blank" href="<?php echo $t_mercadoShops;?>">
			<img class="img_cont" src="imagenes/l.png" alt="loading..."/>
			</a>
    </div>
</div>
<footer>
<ul class="social_icon">
	<li><a href="<?php echo $facebook;?>"><ion-icon name="logo-facebook"></ion-icon></a></li>
	<li><a href="https://www.google.com/maps/dir//materias+primas+tocha/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x85ce03c248d73bdb:0xef38793f1e73fa6e?sa=X&amp;ved=2ahUKEwj5rJbYlNvuAhUCJKwKHYXhD1wQ9RcwFXoECB0QBA"><ion-icon name="logo-google"></ion-icon>
		</a></li>
	<li><a href="#"><ion-icon name="logo-instagram"></ion-icon>
		</a></li>
</ul>
<ul class="menu_f">
    <li><a target= "_blank" href="<?php echo $t_mercadoShops;?>">MercadoLibre</a></li>
	<li><a target="_self" href="index.php">Principal</a></li>
	<li><a id="buttonUs">Quienes Somos</a></li>
	<li><a target="_self" href="ventas.php">Productos</a></li>
	<li><a target="_self" href="contacto_tocha.php">Contacto</a></li>
</ul>
</footer>
<div class="fb-comments" data-href="https://tochamateriasprimas.com/" data-width="100%" data-numposts="5"></div>
<div class="footer_map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.788628418763!2d-99.06939878578389!3d19.29155605017614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce03c248d73bdb%3A0xef38793f1e73fa6e!2sMateriasPrimas%20Tocha!5e0!3m2!1ses-419!2smx!4v1636081671822!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<div class="copyrightText">
<div class="grid-container">
<div>
<a href="<?php echo $t_mercadoShops;?>"><img class="logo" src="imagenes/COORP (2).jpg" />
	</a>
</div>
<div>
<a target="_blank" href="www.admingtutoriales.com"><p>Adming Desarrollos</p></a>
<marquee width="60%" direction="left" scrollamount="6">
	Sitios Web a la medida (Tan complejo o tan sencillo como lo necesites), economicos y profesionales, tambien Aplicaciones Web y Aplicaciones de escritorio, da clic en Adming Desarrollos arribita.
		</marquee>
</div>
<div>
<a target="_blank" href="http://admingtutoriales.com/"><img class="logo" src="imagenes/adming.jpg" />
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
	<a target="_blank" href="<?php echo $t_mercadoShops;?>"><button class="btnML btn-darkML">
		<div class="icono">
			<svg width="16" height="16" fill="currentcolor">
				<img src="imagenes/ml.png" width="25" height="25" />
			</svg>
		</div>
		<span>Ve nuestra tienda en Mercado Libre</span>
	    </button></a>
	<img class="mamalon" src="imagenes/0.jpg"/>
</div>
<script type="text/javascript" src="presentacion/tochaUs.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="presentacion/aletarga.js"></script>
<script type="text/javascript" src="negocio/extiende.js"></script>
<script type="text/javascript" src="negocio/clases/carritoJS.js"></script>
<script type="text/javascript" src="presentacion/insercionTocha.js"></script>
</body>
</html>