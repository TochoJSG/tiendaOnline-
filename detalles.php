<?php require 'negocio/constantes.php';?>
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <meta name="description" content="electronica, computadora, laptop, audifonos, bluetooth, Relog inteligente, smartwatch, mouse, relojes, bocinas, muebles, desechables, Materias primas"/>
	<meta name="keywords" content="electronica, computadora, laptop, audifonos, bluetooth, Relog inteligente, smartwatch, mouse, relojes, bocinas, muebles, desechables, Materias primas"/>
		<title>Tocha | Productos</title>
		<link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon"/>
		<link rel="apple-touch-icon" href="imagenes/apple-touch-icon.png" sizes="180x180"/>
		<link rel="apple-touch-icon" href="imagenes/apple-touch-icon-precomposed.png" sizes="180x180"/>
	<?php include 'negocio/clases/detalle.php';?>
	<?php include 'negocio\clases\generaCarrito.php';?>
	<script src="https://sdk.mercadopago.com/js/v2"></script><!--SDK MP API-->
	<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypalClientId;?>&currency=<?php echo $currency;?>"></script>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $fontAwesome;?>" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="<?php echo $bootstrap;?>" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="negocio/push.min.js"></script>
	<?php include 'negocio/mercadoPagoIni.php';?>
	<?php include 'negocio/clases/preparaCarrito.js';?>
</head>
<body>
<div class="d-flex align-content-sm-start">
	<!--window.history.go(-1);-->
	<a onclick="window.history.back();">
		<img class="card-img-top" src="imagenes\back.jpg" alt="Regresar a pagina anterior" style="width:333px;">
	</a>
</div>
<main class="container">
<div class="row">
    <div class="col-5">
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
		<!--<div class="container">-->
			<div class="row">
				<div class="col-md-12 order-md-1">
					<div id="carouselImages" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="<?php echo $rutaImg; ?>" class="d-block w-100" alt="cargando...">
							</div>
							<?php foreach($imagenes as $img) { ?>
							<div class="carousel-item">
								<img src="<?php echo $img; ?>" class="d-block w-100" alt="cargando...">
							</div>
							<?php } ?>
						</div>
						<a class="carousel-control-prev" href="#carouselImages" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselImages" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>					

						<div class="col-md-6 order-md-2">
							<h2><?php echo $nombre; ?></h2>
							<!--<h5 class="card-title">< php echo $row['nombre']; ?></h5>-->
							<?php if($descuento>0){ ?>
								<p><del><?php echo MONEDA . number_format($precio,2,'.',','); ?></del></p>
								<h2>
									<?php echo MONEDA . number_format($precio_tmp,2,'.',','); ?>
									<small class="text-success"><?php echo $descuento; ?>% descuento</small>
								</h2>
							<?php } else {?>
								<h2><?php echo MONEDA . number_format(precio,2,'.',','); ?></h2>
								<?php } ?>
							<p class="lead">
								<?php echo $descripcion; ?>							
							</p>
							<div class="btn-group">
									<button class="btn btn-primary" type="button">Comprar</button>
									<button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id;?>,<?php echo $token_tmp;?>)">Agregar</a>
								<!--<a href="#" class="btn btn-success">Agregar</a>-->
							</div>
						</div>
				</div>
			</div>
		<!--</div>-->
	</div>
</div>
</main>
	
<script src="negocio/clases/actualizaMonto.js"></script>
<script src="negocio/clases/pagos.js"></script>
<script src="negocio/clases/agregaProds.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>