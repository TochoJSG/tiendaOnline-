<?php
	require '../negocio/config.php';
	require '../negocio/constantes.php';
	require '../negocio/database.php';
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="UTF-8"> 
	<title>Inventario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo_interfaz.css"/>
</head>
<body>

<div class="cuerpo">
<div class="container">
	<div clas="contenedor_logeo">
		<div class="blueBG">
			<div class="box signin">
				<h2>Busca un Producto</h2>	
				<button class="signinBtn">Consultar</button>
			</div>

			<div class="box signup">
				<h2>Registra un producto</h2>
				<button class="signupBtn">Registrar</button>
			</div>
			
		</div>
			
		<div class="formBx">
			<div class="form signinForm">
				<form method="POST" action= "./buscaProducto.php"><!--name="producto" -->
					<label for="consultas">Busca un Producto</label>
				
					<input name="nombreBusqueda" id="nombreBusqueda" type="text" placeholder="Escribe el nombre del producto" maxlength="66" required />
    				
					<input id="Consultar" type="submit" value="Consultar" />

				</form>
			<div class="listaProductos">
						<h3>Lista del invertario actual</h3>
					<?php
						$inventario = new Database();
						$conexionInv = $inventario->conectar();
						$sqlCon = $conexionInv->prepare("CALL ConsultaProductos();");
						$sqlCon->execute();
						$prods = $sqlCon->fetchAll(PDO::FETCH_ASSOC);
						
						foreach ($prods as $producto):
							$idProducto = $producto['idProducto'];
							$idCategoria = $producto['idCategoria'];
							$nombre = $producto['nombre'];
							$precio = $producto['precio'];
							$cantidad = $producto['cantidad'];
							$sku = $producto['codigoUnico'];
							$descuento = $producto['descuento'];
							$estado = $producto['activo'];
							$costo = $producto['costo'];
							
							echo '<br><span value="' . htmlspecialchars($idProducto) . '">'
								. htmlspecialchars($idCategoria) . '<-IdCatego   "'
								. htmlspecialchars($nombre) . '" <-Producto $'
								. htmlspecialchars($precio) . '  Cantidad->'
								. htmlspecialchars($cantidad) . '  SKU->'
								. htmlspecialchars($sku) . '  Desc(%)->'
								. htmlspecialchars($descuento) . '  Estado(1|0)->'
								. htmlspecialchars($estado) . '  Costo($)->'
								. htmlspecialchars($costo)
								. '</span><br>';
						endforeach;
					?>
				</div>
			</div>

			<div class="form signupForm">
				<h3>Captura los datos</h3>
				<form method="POST" action="./insertaProducto.php">
					<input id="nombre" name="nombre" type="text" placeholder="nombre de Producto" max="66" required onchange="this.value = this.value.toUpperCase();">

					<input id="precio" name="precio" type="number" placeholder="precio" min="1" required>

					<input id="codigoUnico" name="codigoUnico" type="number" placeholder="codigoUnico" required>

					<input id="descripcion" name="descripcion" type="text" placeholder="describe el producto" maxlength="66" onchange="this.value = this.value.toUpperCase();">

					<label for="cantidad">Cuantas unidades tenemos para vender</label>
					<input id="cantidad" name="cantidad" type="number" placeholder="qué cantidad del producto tenemos" min="1" required>

					<input id="costo" name="costo" type="number" placeholder="Cuanto pagamos en Total por esto?" min="10">

					<label for="activo">¿Activar publicación?</label>
					<input id="activo" name="activo" type="radio"  value="true">

					<label for="inactivo">¿NO Activar publicación?</label>
					<input id="inactivo" name="activo" type="radio"  value="false">

					<label for="categoria">A qué categoria pertenece el Producto</label>
					<select id="p_cate" name="p_cate">
					<?php
						$catalogo = new Database();
						$conCata = $catalogo->conectar();
						$sqlDB = $conCata->prepare("CALL ConsultaCataCategos();");
						$sqlDB->execute();
						$productos = $sqlDB->fetchAll(PDO::FETCH_ASSOC);
						foreach ($productos as $categorias):
							echo '<option value="'.$categorias['idCategoria'].'">'.$categorias['catego'].'</option>';
						endforeach;
					?>
					</select>
					<input id="descuento" name="descuento" type="number" placeholder="opcional, da un porcentaje de descuento" min="0" max="90">

					<input id="registrar" type="submit" value="registrar">
					<a id="update" onclick="alert('Porfavor Consulta antes los productos');">¿Quieres modificar registro un Existente?</a>
				</form>
			</div>
		</div>
		
	</div>
</div><!-- Cierra 'container' -->

</div><!-- Cierra 'cuerpo' -->

<div id="nosotros" class="modal"><!--Nosotros-->
	<div class="headerForm">
		<h3>Hola, Captura los datos</h3>
		<span id="closeModal" class="close" title="Close Modal">&times;</span>
	</div>
	
	<form id="formBuscar" method="POST" action="BuscarProducto.php">
		<input id="buscarUpdate" type="text" placeholder="ingresa nombre o código unico" maxlength="66" required onchange="this.value = this.value.toUpperCase();">
		<input id="buscarUpdateSubmit" type="submit" value="buscar">
			
			<br>
		<input type="hidden" id="idProducto" name="idProducto">
		
		<input class="updateForm" id="nombreU" type="text" placeholder="nombre" maxlength="33" required disabled>
		
		<input class="updateForm" id="precioU" type="number" placeholder="precio"  step="0.01" required disabled>
		
		<input class="updateForm" id="descripcionU" type="text" placeholder="describe el producto" onchange="this.value = this.value.toUpperCase();" disabled>
		
		<label for="cantidadU">Cuantas unidades tenemos para vender</label>
		<input class="updateForm" id="cantidadU" type="quantity" min="1" disabled>
		
		<input class="updateForm" id="costoU" type="number" placeholder="Cuanto pagamos en Total por esto?" min="10"  step="0.01" disabled>
		
		<label for="activo">¿Activar publicación?</label>
		<input class="updateForm" id="activoU" type="radio" name="activo" value="true" disabled>
		
		<label for="activo">¿NO Activar publicación?</label>
		<input class="updateForm" id="inactivoU" type="radio" name="activo" value="false" disabled>
		
		<label for="categoria">A qué categoria pertenece el Producto</label>
		<select id="categoU" name="categoU" disabled>
			<?php
				$catalogo = new Database();
				$conCata = $catalogo->conectar();
				$sqlDB = $conCata->prepare("CALL ConsultaCataCategos();");
				$sqlDB->execute();
				$productos = $sqlDB->fetchAll(PDO::FETCH_ASSOC);
				foreach ($productos as $categorias):
					echo '<option value="'.$categorias['idCategoria'].'">'.$categorias['catego'].'</option>';
				endforeach;
			?>
		</select>
		
		<input class="updateForm" id="descuentoU" type="number" placeholder="opcional, da un porcentaje de descuento" step="0.01" disabled>

		<input class="updateForm" id="submitUpdate" type="submit" value="Actualizar" disabled>
	</form>
	<script>
		// Habilitar campos si se encuentra el producto
		document.getElementById('formBuscar').addEventListener('submit', async function (e) {
			e.preventDefault(); // Prevenir el envío del formulario para manejarlo con fetch

			const codigo = document.getElementById('buscarUpdate').value;

			// Enviar petición al servidor
			const response = await fetch('../negocio/BuscarProducto.php', {//Atencion a esta linea
				method: 'POST',
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
				body: `buscarUpdate=${encodeURIComponent(codigo)}`
			});

			if (response.ok) {
				const data = await response.json();
				if (data.exito) {
					// Habilitar y llenar los campos con los datos del producto
					
					document.querySelectorAll('.updateForm').forEach(input => input.disabled = false);
					document.getElementById('idProducto').value = data.idProducto;
					document.getElementById('precioU').value = data.precio;
					document.getElementById('descripcionU').value = data.descripcion;
					document.getElementById('cantidadU').value = data.cantidad;
					document.getElementById('costoU').value = data.costo;
					document.getElementById(data.activo ? 'activoU' : 'inactivoU').checked = true;
					document.getElementById('categoriaU').value = data.categoria;
					document.getElementById('descuentoU').value = data.descuento;
				} else {
					alert('Producto no encontrado.');
				}
			} else {
				alert('Error en la búsqueda. Intenta nuevamente.');
			}
		});
	</script>
	
</div>

<script>
	const signinBtn = document.querySelector('.signinBtn');
	const signupBtn = document.querySelector('.signupBtn');
	const formBx = document.querySelector('.formBx');
	const cuerpo = document.querySelector('.cuerpo');

	const updateButton = document.querySelector('#update');
	const updateDisplay = document.querySelector('#nosotros');
	const closeUpdateButton = document.querySelector('#closeModal');

	signupBtn.onclick = function(){
		formBx.classList.add('active');
		cuerpo.classList.add('active');
	}
	signinBtn.onclick = function(){
		formBx.classList.remove('active');
		cuerpo.classList.remove('active');
	}

	updateButton.addEventListener('click', function(){
		console.log("Hola Danna");
		updateDisplay.style.display = 'block';
		document.getElementsByTagName('body')[0].style.overflow = 'hidden';
	});
	
	closeUpdateButton.addEventListener('click',function(){
		updateDisplay.style.display='none';
		document.getElementsByTagName('body')[0].style.overflow = 'visible';
	});
	//document.querySelectorAll('.updateForm').forEach(input=> input.disabled=true);
</script>

</body>
</html>