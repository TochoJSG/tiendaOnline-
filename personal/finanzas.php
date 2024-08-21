<?php
require '../negocio/config.php';
require '../negocio/constantes.php';
require '../negocio/database.php';
$db = new Database();
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
						$conexionA = $db->conectar();
						$listaProds = $conexionA->prepare("CALL ConsultaProductos();");
						$listaProds->execute();
						$productos = $listaProds->fetchAll(PDO::FETCH_ASSOC);
						foreach($productos as $producto):
							echo '<option value="'.$producto['idProducto'].'">'.$producto['nombre'].'</option>';
						endforeach;
					?>
					</select>
					<label for="plataforma">¿Por donde vendimos?</label>
					<select id="plataforma" name="plataforma">
					<?php
						$conexionB = $db->conectar();
						$listaPlataformas = $conexionB->prepare("CALL ConsultaPlataformas()");
						$listaPlataformas->execute();
						$plataformas = $listaPlataformas->fetchAll(PDO::FETCH_ASSOC);
						foreach($plataformas as $plataforma):
							echo '<option value="'.$plataforma['idPlataforma'].'">'.$plataforma['np'].'</option>';
						endforeach;
					?>
					</select>
					<label for="clase">¿Tipo de ingreso?</label>
					<select id="clase" name="clase">
					<?php
						$conexionF = $db->conectar();
						$listaIngresos = $conexionF->prepare("CALL ConsultarClaseIng();");
						$listaIngresos->execute();
						$ingresos = $listaIngresos->fetchAll(PDO::FETCH_ASSOC);
						foreach($ingresos as $clase):
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
						$conexionC = $db->conectar();
						$listaCobro = $conexionC->prepare("CALL ConsultaMetodosDinero();");
						$listaCobro->execute();
						$metodosC = $listaCobro->fetchAll(PDO::FETCH_ASSOC);
						foreach($metodosC as $cobro): 
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
					<?php
						$conexionD = $db->conectar();
						$listaGastos = $conexionD->prepare("CALL ConsultaGastosConceptos();");
						$listaGastos->execute();
						$gastos = $listaGastos->fetchAll(PDO::FETCH_ASSOC);
						foreach($gastos as $gasto):
							echo '<option value="'.$gasto['idGastoConcept'].'">'.$gasto['nombGasto'].'</option>';
						endforeach;
					?>
					</select>
					<input id="egreso" type="number" placeholder="¿cuanto pagamos?" min="1" required>
					<input id="comentarios" type="text" placeholder="algún comentario?" max="99">
						<hr>
					<label for="formaCobro">Metodo de cobro</label>
					<select id="formaCobro" name="producto">
					<?php
						$conexionE = $db->conectar();
						$listaPagos = $conexionE->prepare("CALL ConsultaMetodosDinero();");
						$listaPagos->execute();
						$metodosP = $listaPagos->fetchAll(PDO::FETCH_ASSOC);
						foreach($metodosP as $pago): 
							echo '<option value="'.$pago['idModo'].'">'.$pago['formaPago'].'</option>';
						endforeach;
					?>
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
	/*document.querySelector('#update').onclick=()=>{document.getElementById('nosotros').style.display='block';document.getElementsByTagName('body')[0].style.overflow='hidden';};
	document.querySelector('#closeModal').onclick=()=>{document.getElementById('nosotros').style.display='none';document.getElementsByTagName('body')[0].style.overflow='visible';}
	document.querySelectorAll('.updateForm').forEach(input=> input.disabled=true);*/
	const a = document.getElementById(producto).value;
	const b = document.getElementById(plataforma).value;
	const c = document.getElementById(clase).value;
	const d = document.getElementById(monto).value;
	const e = document.getElementById(costo).value;
	const f = document.getElementById(comentarios).value;
	const g = document.getElementById(formaCobro).value;
	const h = document.getElementById(cobro).value;
	const i = document.getElementById(fecha).value;
	const j = document.getElementById(nota).value;
	const k = document.getElementById(us).value;
	const l = document.getElementById(referencia).value;
	const m = document.getElementById(registrarIng).value;
	console.log(a,b,c,d,e,f,g,h,i,j,k,l,m);
</script>
</body>
</html>