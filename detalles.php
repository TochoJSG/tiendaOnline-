<<<<<<< HEAD
<?php require 'negocio/constantes.php';?>
=======
>>>>>>> 57f16565d94fc5722f6b7949232ee9399a0c284f
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
	<?php include 'negocio/clases/detalle.php';?>
	<?php include 'negocio\clases\generaCarrito.php';?>
	<script src="https://sdk.mercadopago.com/js/v2"></script><!--SDK MP API-->
<<<<<<< HEAD
	<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypalClientId;?>&currency=<?php echo $currency;?>"></script>
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $fontAwesome;?>" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="<?php echo $bootstrap;?>" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="negocio/push.min.js"></script>
=======
	<script src="https://www.paypal.com/sdk/js?client-id=AfGJtKOoQTqFZWdiVkXFivK8DT5i6BZovHjw9q5pqHiF5LFo-JkwWEpJ1bhqmI2LgrAm80f6VFnbIGO4&currency=MXN"></script>
	<link rel="shortcut icon|apple-touch-icon|apple-touch-icon-precomposed" href="favicon.ico" sizes="HeightxWidth|any" type="image/x-icon"/>
	<link href="presentacion/estilos_tocha.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="push.min.js"></script>
>>>>>>> 57f16565d94fc5722f6b7949232ee9399a0c284f
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
	
<<<<<<< HEAD
<script src="negocio/clases/actualizaMonto.js"></script>
<script src="negocio/clases/pagos.js"></script>
<script src="negocio/clases/agregaProds.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
=======
	
<script src="negocio\clases\actualizaMonto.js"></script>
<script src="negocio\clases\pagos.js"></script>
	
	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="negocio/clases/agregaProds.js"></script>
>>>>>>> 57f16565d94fc5722f6b7949232ee9399a0c284f
</body>
</html>