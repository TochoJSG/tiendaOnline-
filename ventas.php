<?php
require 'negocio/config.php';
require 'negocio/constantes.php';
?>
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
  <meta name="description" content="electronica, computadora, laptop, audifonos, smartwatch, mouse, relojes, bocinas, desechables, Materias primas"/>
  <meta name="keywords" content="suministros para pymes, insumos para comercios, desechables al por mayor, bolsas para tiendas, terminales de pago, estantería para negocios, desinfectantes industriales, ecommerce de productos para pymes, productos para pequeños negocios"/>
  <meta name="description" content="Encuentra todo lo que necesitas para operar tu pequeño negocio: suministros y productos al por mayor para pymes, desde desechables hasta estanterías. Descubre ofertas en terminales de pago, desinfectantes, y más."/>
	  <title>Tocha | Productos</title>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css" />
	<script src="https://sdk.mercadopago.com/js/v2"></script><!--SDK MP API-->
	<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypalClientId;?>&currency=<?php echo $currency;?>"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&amp;version=v15.0" nonce="wzsUa4iV"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="<?php echo $fontAwesome;?>" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="<?php echo $bootstrap;?>" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="negocio/push.min.js"></script>
</head>
<body>
<a href="<?php echo $whatsapp;?>" class="btn-wsp" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a>
<script>document.addEventListener('DOMContentLoaded',function(){Push.create('Bienvenido',{body:'Hola, da clic en el recuadro y compra con envio incluido !!!',icon:'imagenes/COORP (2).jpg',timeout:6666,onClick:function(){window.location='https://materiasprimastocha.mercadoshops.com.mx/';this.close();}});});</script>
<header id="main-header">
	<a target="_self" href="index.php"><img class="logo" src="imagenes/COORP (2).jpg" align="left" width="90px" height="90px"/></a>
	<a id="logo-header" target="_self" href="index.php">
		<span class="site-name">Grupo Tocha</span>
		<span class="site-desc">Desechable / Bolsa / Insumos</span>
	</a>
	<nav>
		<ul>
		    <li><a class="activo" target="_blank" href="<?php echo $t_mercadoShops;?>"><b>Mercado Libre</b></a></li>
			<li><a target="_blank" href="<?php echo $google;?>"><b>Google</b></a></li>
			<li><a target="_blank" href="contacto_tocha.php"><b>Contacto</b></a></li>
            <li><a href="negocio/checkout.php" class="btn btn-primary">Carrito<span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span></a></li>
		</ul>
	</nav>
</header>
<main class="container containerPagos">
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
			<div class="mx-auto" style="width:666px;">
				<div class="checkout-btn"></div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="table-responsive">
		<table class="tabla">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Acción</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody id="items"></tbody>
            <tfoot>
              <tr id="footer">
                <th scope="row" colspan="5">Comienza a comprar!!! =D</th>
              </tr>
            </tfoot>
        </table>
        </div>
	</div>
</div>
</main>
<template id="template-carrito">
  <tr>
    <th scope="row">id</th>
        <td>Café</td>
        <td>1</td>
        <td><button id="increBtn" class="btn btn-warning btn-sm"> + </button><button id="decreBtn" class="btn btn-info btn-sm"> - </button> </td>
        <td>$<span>500</span></td>
  </tr>
</template>
<template id="template-footer">
    <th scope="row" colspan="2">Total productos</th>
        <td><button class="btn btn-danger btn-sm" id="vaciar-carrito">vaciar todo</button></td><!--		10		-->
        <td><!--<button id="comprar" class="btn btn-sm"> Comprar </button>--></td>
        <td>$<span>5000</span></td>
</template>
<div id="cardsFromBd" class="row"></div>
<template id="template-card-bd">
    <div class="card">
      <div class="card-body">
        <h5>Titulo</h5>
        <section id="myImg" class="item active"></section>
        $<span>precio</span>
        <p></p>
        <button id="buyBtn" class="btnCard btn btn-dark">Comprar en el Sitio</button>
      </div>
    </div>
</template>
<!--
<div class="menu_deptos align-items-xl-center">
    <h2 class="colores">Departamentos</h2>
    <div class="select_depto">
        <div>
        	<button id="a" class="boton3" onclick="matPrimas()">Comprar productos</button>
        </div>
        <div>
        	<button id="b" class="boton3" onclick="mascotas()">Bio+</button>
        </div>
        <div>
        	<button id="c" class="boton3" onclick="electronicos()">Electronica</button>
        </div>
    </div>
	
<div id="matPrima"><!- -Departamento Materia Prima- ->
    <div id="cardsJson" class="row"></div>
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
	
<div id="mascota"><!- -Departamento Mascotas- ->
    <div id="containerEco" class="row"></div>
	<template id="cardsBioJson">
		<div class="boxEco">
			<span></span>
		<div class="contentEco">
			<h2>Producto</h2>
			<p>Descripcion
				</p>
			<a href="#">enlace</a>
		</div>
		</div>
	</template>
</div><!- -Fin de Depto- ->
	
<div id="electronica"><!- -Departamento Electronica- ->
<div class="containerCardAmz"></div>
<template class="contCardAmz">
	<div class="coverLaCard">
		<img src="bocina.png" />
	</div>
	<div class="detailsLaCard">
		<div>
			<img id="amzGral" />
			<h3>Tronsmart Force Bocinas Bluetooth</h3>
			<p>Resistentes al agua sonido estéreo, altavoz</p>
			<a target="_blank" href="">Comprar en Amazon</a>
		</div>
	</div>
</template>
</div><!- -Fin de Departamento- ->
</div><!- -Cierra DIV contenedor de deptos general-->
<footer>
	<ul class="social_icon">
	    <li><a target="_blank" href="<?php echo $facebook;?>"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a target="_blank" href="<?php echo $google;?>"><ion-icon name="logo-google"></ion-icon></a></li>
		<li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
	</ul>
	<ul class="menu_f">
	    <li><a target="_blank" href="<?php echo $t_mercadoShops;?>">MercadoLibre</a></li>
		<li><a target="_self" href="index.php">Principal</a></li>
		<li><a target="_blank" href="<?php echo $t_mercadoShops;?>">Productos</a></li>
		<li><a target="_self" href="contacto_tocha.php">Contacto</a></li>
	</ul>
</footer>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="negocio/manipula_deptos.js"></script>
<script type="text/javascript" src="negocio/clases/carritoJS.js"></script>
<script type="text/javascript" src="negocio/clases/agregaProds.js"></script>
<script type="text/javascript" src="negocio/cardsJSON.js"></script>
</body>
</html>