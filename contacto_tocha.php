<?php require 'negocio/constantes.php';?>
<!doctype html>
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
	<title>Tocha | Contactanos</title>
	<meta charset="UTF-8"> 
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="imagenes/favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<script src="negocio/push.min.js"></script>
	<link href="presentacion/estilo_contacto.css"  rel="stylesheet" type="text/css"/>
	<link href="presentacion/botones.css"  rel="stylesheet" type="text/css"/>
	<link href="<?php echo $bootstrap;?>" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1191139725994904" crossorigin="anonymous"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&amp;version=v15.0" nonce="wzsUa4iV"></script>
</head>
<body>
<div id="fb-root"></div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVV756S" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script>
	document.addEventListener('DOMContentLoaded', function(){
		Push.create('Bienvenido',{
		body:'Hola, te invitamos a ver nuestro inventario',
		icon:'COORP (2).jpg',
		timeout:6666,
		onClick: function(){
			window.location='https://materiasprimastocha.mercadoshops.com.mx/';
			this.close();
			}
		});
	});
</script>
<header id="main-header">
	<a id="logo-header" target="_self" href="index.php">
	<img class="logo" src="imagenes/COORP (2).jpg" align="left" width=90px height=90px/></a>
	<a id="logo-header" target="_self" href="index.php">
		<span class="site-name">Grupo Tocha</span><br>
		<span class="site-desc" style="color:#fff;">Desechable / Bolsa / Insumos</span>
	</a> <!-- / #logo-header -->
	<nav>
		<ul>
			<li><a class="activeH" target="_self" href="index.php">Principal</a></li>
			<li><a target="_blank" href="<?php echo $google;?>">Google</a></li>
			<li><a data-text="Quien escribe esto" id="buttonUs">Nosotros</a></li>
			<li><a target="_self" href="ventas.php">Productos</a></li>
		</ul>
	</nav>
</header>
<a href="<?php echo $whatsapp;?>" class="btn-wsp" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a>
<div id="fb-root"></div><!-- Messenger plugin de chat Code -->
<div id="fb-customer-chat" class="fb-customerchat"></div>
<div class="contactUs">
	<div class="title">	
	<div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100064943526728" data-tabs="timeline" data-width="500" data-height="80" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/profile.php?id=100064943526728" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100064943526728">Tocha</a></blockquote></div>
	<button class="collapsible">Que te ofrecemos</button><!--Codigo 2-->
	<div class="content__">
		<ul class="menu">
			<li class="lista">Desechables Reyma Biodegradable</li>
			<li>Desechable Dart Biodegradable</li>
			<li>Desechable Biodegradable</li>
			<li>Desechable Jaguar Biodegradable</li>
			<li>Bolsa de asa Bio y Bolsa negra para Basura con material Reciclado</li>
			<li>Variedad de Papel Estraza</li>
			<li>Palos de madera varios</li>
			<li>Acessorios Electronicos</li>
			<li>Acessorios para Disposivos</li>
			<li>Articulos para Mascota</li>
		</ul>	
    	<div class="d-grid gap-3 col-10 mx-auto">
    	    <a class="btn btn-primary" type="button" href="<?php echo $t_mercadoShops;?>"Ve nuestra tienda en Mercado Libre</a>
    	</div>
	</div>
	</div>
	<div class="contactBox">
		<div class="contact form">
			<h3>Envianos un Mensaje</h3>
		<form class="contactoGMAIL">
			<div class="formBox">
				<div class="row50">
				<div class="inputBox">
					<span>Como te llamas</span>
					<input class="name" type="text" placeholder="Como te llamas" required/>
				</div>
				<div class="inputBox">
					<span>Apellido</span>
					<input class="lname" type="text" placeholder="Como te apellidas(Opcional)"/>
				</div>
				</div>
				
				<div class="row50">
    				<div class="inputBox">
    					<span>Email</span>
    					<input class="mail" type="email" placeholder="tuu@algo.com" required/>
    				</div>
    				<div class="inputBox">
    					<span>Telefono</span>
    					<input class="tel" type="number" placeholder="Numero para seguimiento (opcional)"/>
    				</div>
				</div>
				<div class="row100">
    				<div class="inputBox">
    					<span>Tu Mensaje</span>
    					<textarea class="msg" placeholder="Como te podemos ayudar" required></textarea>
    				</div>
				</div>
				<div class="row100">
    				<div class="inputBox">
    					<input type="submit" value="ENVIAR"/>
    				</div>
				</div>
			</div>
		</form>
		</div>
		<div class="contact info">
			<h3>Contact Info</h3>
			<div class="infoBox">
			<div>
			<span><ion-icon name="location-outline"></ion-icon></span>
			<p>Iztapalapa, col. El molino, Damiana, Huacepil<br>CDMX
				</p>
			</div>
			<div>
			<span><ion-icon name="mail-outline"></ion-icon></span>
			<a href="mailto:matprimas.tocha.loc33@gmail.com">matprimas.tocha.loc33@gmail.com
				</a>
			</div>
			<div>
			<span><ion-icon name="call-outline"></ion-icon></span>
			<a href="tel:+525535143631">+52 55 35 14 36 31
				</a>
			</div>
			<ul class="socialesContact">
				<li><a target="_blank" href="<?php echo $facebook;?>"><ion-icon name="logo-facebook"></ion-icon></a></li>
				<li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
				<li><a target="_blank" href="<?php echo $t_mercadoShops;?>"><ion-icon name="logo-mercadolibre"></ion-icon></a></li>
			</ul>
			</div>
		</div>
		<div class="contact map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.788628418763!2d-99.06939878578389!3d19.29155605017614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce03c248d73bdb%3A0xef38793f1e73fa6e!2sMateriasPrimas%20Tocha!5e0!3m2!1ses-419!2smx!4v1636081671822!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div>
</div>
<footer>
	<div class="waves">
		<div class="wave" id="wave1"></div>
	</div>
	<ul class="social_icon">
		<li><a target="_blank" href="<?php echo $facebook;?>"><ion-icon name="logo-facebook"></ion-icon></a></li>
		<li><a target="_blank" href="<?php echo $google;?>"><ion-icon name="logo-google"></ion-icon>
			</a></li>
		<li><a href="#"><ion-icon name="logo-instagram"></ion-icon>
			</a></li>
	</ul>
	<ul class="menu_f">
		<li><a target="_self" href="index.php">Principal</a></li>
		<li><a data-text="Quien escribe esto" id="buttonUs">Quienes Somos</a></li>
		<li><a target="_self" href="ventas.php">Productos</a></li>
		<li><a target="_self" href="contacto_tocha.php">Contacto</a></li>
	</ul>
	<div class="fb-comments" data-href="https://tochamateriasprimas.com/" data-width="100%" data-numposts="5"></div>
</footer>
<div class="copyrightText">
	<div class="grid-container">
	<div>
	    <a target="_blank" href="<?php echo $t_mercadoShops;?>"><img class="logo" src="imagenes/COORP (2).jpg" align="left"/></a>
	</div>
	<div>
	    <a target="_blank" href="www.admingtutoriales.com"><p>Adming Desarrollos</p></a>
	    <marquee width="60%" direction="left" scrollamount="6">Sitios Web a la medida (Tan complejo o tan sencillo como lo necesites), economicos y profesionales, tambien Aplicaciones Web y Aplicaciones de escritorio, da clic en Adming Desarrollos arribita.</marquee>
	</div>
	<div>
	    <a target="_blank" href="http://admingtutoriales.com/"><img class="logo" src="imagenes/adming.jpg" align="right"/></a>
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
	<div class="mx-auto" style="width:666px;">
	<div class="btn-group">
	<a class="btn btn-primary" type="button" target="_blank" href="electronica-inteligente.com/index.html">Visita Nuestro Blog Sobre Tecnologia
		</a>		
	<a class="btn btn-dark" type="button" href="<?php echo $t_mercadoShops;?>">
		<div class="icono">
			<svg width="16" height="16" fill="currentcolor">
				<img src="imagenes/ml.png" width="25" height="25">
			</svg>
		</div>
		<span>Ve nuestra tienda en Mercado Libre</span>
	    </a>
	</div>
	</div>
	<div class="d-flex justify-content-center" style="padding:3px 0;">
	    <img src="imagenes/0.jpg" alt="cargando..." style="border-radius:17px;width:100%;"/>
	</div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="presentacion/tochaUs.js"></script>
<script type="text/javascript" src="negocio/mailTocha.js"></script>
<script type="text/javascript" src="negocio/facebookJs.js"></script>
</body>
</html>
