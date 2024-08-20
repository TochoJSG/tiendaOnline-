<?php
require 'negocio/config.php';
require 'negocio/constantes.php';
require 'negocio/database.php';
$db= new Database();
$con = $db->conectar();
$sqlDB = $con->prepare("CALL ObtenerListaProductos();");
$sqlDB->execute();
$productos = $sqlDB->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="UTF-8"> 
	<title>Personal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo_interfaz.css"/>
</head>
<body>

<div class="cuerpo">
	<div class="container">
	<div clas="contenedor_logeo">
		<div class="blueBG">
			<div class="box signin">
				<h2>Consulta la Base para Información</h2>	
				<button class="signinBtn">Consultar</button>
			</div>
			
			<div class="box signup">
				<h2>Registra un producto</h2>
				<button class="signupBtn">Registrar</button>
			</div>
			
		</div>
			
			<div class="formBx">
				<div class="form signinForm">
				<form>
					<label for="consultas">Consulta informacion de la Base de Datos</label>
					<input id="consultas" type="text" placeholder="Escribe que deseas saber del sistema">
					<input id="Consultar" type="submit" value="Consultar">
				</form>
			</div>
			
			<div class="form signupForm">
				<form>
				<h3>Hola, Captura los datos</h3>
					<input id="nombre" type="text" placeholder="nombre de Producto" max="66" required>
					<input id="precio" type="number" placeholder="precio" min="1" required>
					<input id="codigoUnico" type="number" placeholder="codigoUnico" required>
					<input id="descripcion" type="text" placeholder="describe el producto">
					<label for="cantidad">Cuantas unidades tenemos para vender</label>
					<input id="cantidad" type="quantity" placeholder="qué cantidad del producto tenemos" min="1" required>
					<input id="costo" type="number" placeholder="Cuanto pagamos en Total por esto?" min="10">
					<label for="activo">¿Activar publicación?</label>
					<input id="activo" type="radio" name="activo" value="true">
					<label for="inactivo">¿NO Activar publicación?</label>
					<input id="inactivo" type="radio" name="activo" value="false">
					<label for="categoria">A qué categoria pertenece el Producto</label>
					<?php
						$catalogo= new Database();
						$conCata = $catalogo->conectar();
						$sqlDB = $conCata->prepare("CALL ObtenerCategorias();");
						$sqlDB->execute();
						$productos = $sqlDB->fetchAll(PDO::FETCH_ASSOC);
						
					<select id="categoria" name="categorias">
						foreach($data as $categorias):
						echo `<option value=" ´.$categorias[idCategoria]´">`.$categorias[catego].`</option>`;
						endforeach;
						?>
					</select>
					<input id="descuento" type="number" placeholder="opcional, da un porcentaje de descuento" min="0">
					<input id="registrar" type="submit" value="registrar">
					<a id="update">¿Quieres modificar registro un Existente?
					</a>
				</form>
			</div>
			</div>
		
	</div>
</div>

</div>

<div id="nosotros" class="modal"><!--Nosotros-->
	<div class="headerForm">
		<h3>Hola, Captura los datos</h3>
		<span id="closeModal" class="close" title="Close Modal">&times;</span>
	</div>
	
	<form>
		<input id="buscarUpdate" type="text" placeholder="ingresa nombre o código unico" max="66" required>
		<input id="buscarUpdateSubmit" type="submit" value="buscar">
			<br>
		<input class="updateForm" id="precioU" type="number" placeholder="precio">
		
		<input class="updateForm" id="descripcionU" type="text" placeholder="describe el producto">
		
		<label for="cantidadU">Cuantas unidades tenemos para vender</label>
		<input class="updateForm" id="cantidadU" type="quantity" min="1">
		
		<input class="updateForm" id="costoU" type="number" placeholder="Cuanto pagamos en Total por esto?" min="10">
		
		<label for="activo">¿Activar publicación?</label>
		<input class="updateForm" id="activoU" type="radio" name="activo" value="true">
		
		<label for="activo">¿NO Activar publicación?</label>
		<input class="updateForm" id="inactivoU" type="radio" name="activo" value="false">
		
		<label for="categoria">A qué categoria pertenece el Producto</label>
		<select class="updateForm" id="categoriaU" name="categorias">
			<option value="catego1">Catego 1</option>
			<option value="catego2">Catego 2</option>
			<option value="catego3">Catego 3</option>
			<option value="catego4">Catego 4</option>
		</select>
		
		<input class="updateForm" id="descuentoU" type="number" placeholder="opcional, da un porcentaje de descuento">
		
		<input class="updateForm" type="submit" value="registrar">
	</form>
	
</div>

<script>
	const signinBtn = document.querySelector('.signinBtn');
	const signupBtn = document.querySelector('.signupBtn');
	const formBx = document.querySelector('.formBx');
	const cuerpo = document.querySelector('.cuerpo');
	
	signupBtn.onclick = function(){
		formBx.classList.add('active');
		cuerpo.classList.add('active');
	}
	signinBtn.onclick = function(){
		formBx.classList.remove('active');
		cuerpo.classList.remove('active');
	}
	document.querySelector('#update').onclick=()=>{document.getElementById('nosotros').style.display='block';document.getElementsByTagName('body')[0].style.overflow='hidden';};
	document.querySelector('#closeModal').onclick=()=>{document.getElementById('nosotros').style.display='none';document.getElementsByTagName('body')[0].style.overflow='visible';}
	
	document.querySelectorAll('.updateForm').forEach(input=> input.disabled=true);
</script>

</body>
</html>