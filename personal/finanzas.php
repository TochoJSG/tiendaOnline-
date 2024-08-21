<?php
require '../negocio/config.php';
require '../negocio/constantes.php';
require '../negocio/database.php';
$db = new Database();
$con = $db->conectar();
$conIngreso = $con->prepare("CALL ConsultaIngreso();");
$conIngreso->execute();
$cataIngresos = $conIngreso->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="UTF-8"> 
	<title>Finanzas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo_interfaz.css"/>
</head>
<body>

<div class="cuerpo">
	<div class="container">
	<div clas="contenedor_logeo">
		<div class="blueBG">
			<div class="box signin">
				<h2>Capturar Ingreso</h2>	
				<button class="signinBtn">Ingreso</button>
			</div>
			
			<div class="box signup">
				<h2>Captura Egreso</h2>
				<button class="signupBtn">Egreso</button>
			</div>
			
		</div>
			
			<div class="formBx">
				<div class="form signinForm">
				<form>
					<h3>Hola, Captura el ingreso</h3>
					<label for="producto">Selecciona el producto</label>
					<select id="producto" name="producto">
					<?php
						foreach($cataIngresos as $producto):
							echo '<option value="'.$producto['idProducto'].'">'.$producto['np'].'</option>';
						endforeach;
					?>
					</select>
					<label for="plataforma">¿Por donde vendimos?</label>
					<select id="plataforma" name="plataforma">
					<?php
						foreach($cataIngresos as $plataforma):
							echo '<option value="'.$plataforma['idPlataforma'].'">'.$plataforma['nombre'].'</option>';
						endforeach;
					?>
					</select>
					<label for="clase">¿Tipo de ingreso?</label>
					<select id="clase" name="clase">
					<?php
						foreach($cataIngresos as $clase):
							echo '<option value="'.$clase['idIngreso'].'">'.$clase['ingreso'].'</option>';
						endforeach;
					?>
					</select>
					<input id="monto" type="number" placeholder="¿cuanto ingreso?" min="1" required>
					<input id="costo" type="number" placeholder="¿Hubo algun costo de la venta?" min="1">
					<input id="comentarios" type="text" placeholder="algún comentario?" max="99">
						<hr>
					<label for="formaCobro">Metodo de cobro</label>
					<select id="formaCobro" name="producto">
					<?php
						foreach($cataIngresos as $cobro): 
							echo '<option value="'.$cobro['idModo'].'">'.$cobro['formaPago'].'</option>';
						endforeach;
					?>
					</select>
					<input id="cobro" type="number" placeholder="¿cuanto coobramos?" min="1" required>
					<input id="fecha" type="date">
					<input id="nota" type="text" placeholder="algún comentario?" max="99">
					<input id="us" type="text" value="JORGE ARTURO SALGADO GARCIA" style="display:none;">
					<input id="referencia" type="text" placeholder="numero de referencia Ticket" max="99" required>
					<input id="registrarIng" type="submit" value="registrar">
				</form>
			</div>
			
			<div class="form signupForm">
				<form>
					<h3>Hola, Captura el Egreso</h3>
					<label for="gasto">Selecciona el concepto del gasto</label>
					<select id="gasto" name="gasto">
						<option value="catego1">Catego 1</option>
						<option value="catego2">Catego 2</option>
						<option value="catego3">Catego 3</option>
						<option value="catego4">Catego 4</option>
					</select>
					<input id="egreso" type="number" placeholder="¿cuanto pagamos?" min="1" required>
					<input id="comentarios" type="text" placeholder="algún comentario?" max="99">
						<hr>
					<label for="formaCobro">Metodo de cobro</label>
					<select id="formaCobro" name="producto">
						<option value="catego1">Catego 1</option>
						<option value="catego2">Catego 2</option>
						<option value="catego3">Catego 3</option>
						<option value="catego4">Catego 4</option>
					</select>
					<input id="cobro" type="number" placeholder="¿cuanto pagamos?" min="1" required>
					<input id="fecha" type="date">
					<input id="notaEg" type="text" placeholder="algún comentario?" max="99">
					<input id="tienda" type="text" placeholder="¿da el nombre de la tienda?" required>
					<input id="ticket" type="text" placeholder="numero de referencia Ticket" max="99" required>
					<input id="registrarEg" type="submit" value="registrar">
				</form>
			</div>
			</div>
		
	</div>
</div>
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