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
					<form> <!--method="POST" action= "buscaProducto.php">name="producto" -->
						<label for="consultas">Busca un Producto</label>
						<input id="consultas" type="text" placeholder="Escribe el nombre del producto">
						<input id="Consultar" type="submit" value="Consultar" disabled>

					<div class="listaProductos">
						<?php
							$inventario = new Database();
							$conexionInv = $inventario->conectar();
							$sqlCon = $conexionInv->prepare("CALL ConsultaProductos();");
							$sqlCon->execute();
							$prods = $sqlCon->fetchAll(PDO::FETCH_ASSOC);
							
							foreach ($prods as $producto):
								$idProducto = $producto['idProducto'];
								$idCategoria = $producto['idCategoria'];
								$nombre = $producto['nombreProducto'];
								$precio = $producto['precio'];
								$cantidad = $producto['cantidad'];
								$sku = $producto['SKU'];
								$descuento = $producto['descuento'];
								$estado = $producto['estado'];
								$costo = $producto['costo'];
							
								echo '<span value="' . htmlspecialchars($idProducto) . '">'
									. htmlspecialchars($idCategoria) . ' prod '
									. htmlspecialchars($nombre) . ' $'
									. htmlspecialchars($precio) . ' Cant '
									. htmlspecialchars($cantidad) . ' SKU '
									. htmlspecialchars($sku) . ' Desc '
									. htmlspecialchars($descuento) . ' Edo '
									. htmlspecialchars($estado) . ' costo '
									. htmlspecialchars($costo)
									. '</span><br>';
							endforeach;
							/*foreach ($prods as $categorias):
								echo '<span value="'.'id '.$idProducto['idProducto'].'">'.$categorias['idCategoria'].'prod '.$prod['nombre'].' $'.$precio['precio'].' Cant'.$cant['cantidad'].'SKU '.$sku['codigoUnico'].'Desc'.$desc['descuento'].' Edo '.$edo['activo'].'costo '.$cost['costo'].'</span>';
							endforeach;*/
						?>
					</div>
					</form>
				</div>
			
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					// Conexión a la base de datos
					$insertProduct = new Database();
					$conP = $insertProduct->conectar();

					// Validar y sanitizar los datos del formulario
					$p_cate = filter_input(INPUT_POST, 'categoriaU', FILTER_SANITIZE_STRING);
					$p_nomb = filter_input(INPUT_POST, 'buscarUpdate', FILTER_SANITIZE_STRING);
					$p_precio = filter_input(INPUT_POST, 'precioU', FILTER_VALIDATE_FLOAT);
					$p_cant = filter_input(INPUT_POST, 'cantidadU', FILTER_VALIDATE_INT);
					$p_desc = filter_input(INPUT_POST, 'descripcionU', FILTER_SANITIZE_STRING);
					$p_cu = $p_nomb; // Reutiliza el valor de buscarUpdate como código único
					$p_des = isset($_POST['descuentoU']) ? filter_input(INPUT_POST, 'descuentoU', FILTER_VALIDATE_FLOAT) : 0;
					$p_cost = filter_input(INPUT_POST, 'costoU', FILTER_VALIDATE_FLOAT);
					$p_edo = ($_POST['activo'] === 'true') ? 1 : 0;

					// Verificar que los datos requeridos no estén vacíos
					if ($p_cate && $p_nomb && $p_precio && $p_cant && $p_desc && $p_cost !== false) {
						// Preparar la llamada al procedimiento almacenado
						$sqlDBProd = $conP->prepare("CALL insertarProducto(?, ?, ?, ?, ?, ?, ?, ?, ?)");
						$sqlDBProd->bindValue(1, $p_cate, PDO::PARAM_STR);
						$sqlDBProd->bindValue(2, $p_nomb, PDO::PARAM_STR);
						$sqlDBProd->bindValue(3, $p_precio, PDO::PARAM_STR);
						$sqlDBProd->bindValue(4, $p_cant, PDO::PARAM_INT);
						$sqlDBProd->bindValue(5, $p_desc, PDO::PARAM_STR);
						$sqlDBProd->bindValue(6, $p_cu, PDO::PARAM_STR);
						$sqlDBProd->bindValue(7, $p_des, PDO::PARAM_STR);
						$sqlDBProd->bindValue(8, $p_cost, PDO::PARAM_STR);
						$sqlDBProd->bindValue(9, $p_edo, PDO::PARAM_BOOL);

						// Ejecutar el procedimiento
						if ($sqlDBProd->execute()) {
							echo "<p>Producto registrado correctamente.</p>";
						} else {
							echo "<p>Error al registrar el producto: " . $sqlDBProd->errorInfo()[2] . "</p>";
						}

						// Cerrar la conexión
						$sqlDBProd->closeCursor();
					} else {
						echo "<p>Error: Por favor, completa todos los campos obligatorios correctamente.</p>";
					}
				}
				?>
			<div class="form signupForm">
				<form method="POST">
				<h3>Hola, Captura los datos</h3>
					<input id="nombre" name="nombre" type="text" placeholder="nombre de Producto" max="66" required>
					<input id="precio" name="precio" type="number" placeholder="precio" min="1" required>
					<input id="codigoUnico" name="codigoUnico" type="number" placeholder="codigoUnico" required>
					<input id="descripcion" name="descripcion" type="text" placeholder="describe el producto" max="66">
					<label for="cantidad">Cuantas unidades tenemos para vender</label>
					<input id="cantidad" name="cantidad" type="quantity" placeholder="qué cantidad del producto tenemos" min="1" required>
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
	
	<form method="POST">
		<input id="buscarUpdate" type="text" placeholder="ingresa nombre o código unico" maxlength="66" required>
		<input id="buscarUpdateSubmit" type="submit" value="buscar">
			<br>
		<input class="updateForm" id="precioU" type="number" placeholder="precio"  step="0.01" required>
		
		<input class="updateForm" id="descripcionU" type="text" placeholder="describe el producto" onchange="upperCase();">
		
		<label for="cantidadU">Cuantas unidades tenemos para vender</label>
		<input class="updateForm" id="cantidadU" type="quantity" min="1">
		
		<input class="updateForm" id="costoU" type="number" placeholder="Cuanto pagamos en Total por esto?" min="10"  step="0.01">
		
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
		
		<input class="updateForm" id="descuentoU" type="number" placeholder="opcional, da un porcentaje de descuento" step="0.01">

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