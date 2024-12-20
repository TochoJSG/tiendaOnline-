<?php
	require '../negocio/config.php';
	require '../negocio/constantes.php';
	require '../negocio/database.php';
		$db = new Database();
		$conexionA = $db->conectar();
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
<body style="background:#daf;">

<div class="controlesRH">
	<button id="addEmploye" class="HRbutton">Registra Empleado</button>
	<button id="updateEmploye" class="HRbutton">Edita Empleado</button>
	<button id="seeEmploye" class="HRbutton">Ver Empleados</button>
</div>

<div class="procesosRH">

<div id="nosotros" class="modal"><!--REGISTRO

idEmpleado	sueldo	nombres	apellidos	tel	mail rfc	seguro	fechaIngreso	


-->
	<div class="headerForm">
		<h3>Hola, Captura los datos del Empleado</h3>
	</div>
	<form>
		<input id="nombre" type="text" placeholder="ingresa los nombres del Empleado" max="66" required onchange="upperCase();">

		<input id="apellidos" type="text" placeholder="ingresa los apellidos" max="66" required onchange="upperCase();">
		
		<label for="sueldo">Ingresa el sueldo semanal</label>
		<input id="sueldo" type="number" placeholder="Pago semanal" min="600" required>
		
		<input id="telefono" type="tel" placeholder="ingresa el telefono del trabajador" required>
		
		<input id="email" type="email" placeholder="Ingresa el correo electronico">
		
		<input id="rfc" type="text" name="rfc" placeholder="Ingresa el RFC" onchange="upperCase();">
		
		<input id="seguro" type="text" name="seguro" placeholder="Ingresa el número de Seguro" onchange="upperCase();">
		
		<label for="ingreso">Fecha de ingreso</label>
		<input id="ingreso" type="date" name="ingreso">
		
		<label for="departamento">Departamento</label>
		<select id="departamento" name="departamento">



		</select>
		
		<label for="rol">Cargo</label>
		<select id="rol" name="rol">



		</select>
		<label for="contrato">Tipo de Contrato</label>
		<select id="contrato" name="contrato">



		</select>
		
		<input id="altaEmpleado" type="submit" value="R E G I S T R A R">
	</form>
</div>




<div id="upDateRH" class="modal"><!--EDITAR REGISTRO-->
	<div class="headerForm">
		<h3>Hola, Edita los Datos de un Colaborador</h3>
	</div>
	<form>
		<input id="nombre" type="text" placeholder="ingresa los nombres del Empleado a Editar" max="66" required onchange="upperCase();">

		<input id="apellidos" type="text" placeholder="ingresa los apellidos" max="66" required onchange="upperCase();">
		
		<input id="busquedaPersonal" type="submit" value="B U S C A R">
		
		<label for="sueldo">Ingresa el sueldo semanal</label>
		<input id="sueldo" type="number" placeholder="Pago semanal" min="600" disabled>
		
		<input id="telefono" type="tel" placeholder="ingresa el telefono del trabajador" disabled>
		
		<input id="email" type="email" placeholder="Ingresa el correo electronico" disabled>
		
		<label for="departamento">Departamento</label>
		<select id="departamento" name="departamento" disabled>



		</select>
		
		<label for="rol">Cargo</label>
		<select id="rol" name="rol" disabled>



		</select>
		<label for="contrato">Tipo de Contrato</label>
		<select id="contrato" name="contrato" disabled>



		</select>
		
		<input id="altaEmpleado" type="submit" value="A C T U A L I Z A  R" disabled>
	</form>
</div>



<div id="seeRH" class="modal"><!--Ver Colaboradores-->
	<div class="headerForm">
		<h3>Lista de Colaboradores</h3>
	</div>
	<div>
		
	</div>
</div>

</div><!--Cierra procesos RH-->

<script>
	const ud = document.getElementById('updateEmploye');
	const add = document.getElementById('addEmploye');
	const see = document.getElementById('seeEmploye');
	
	const displayUD = document.getElementById('upDateRH');
	const displayADD = document.getElementById('nosotros');
	const displaySEE = document.getElementById('seeRH');
	
	ud.addEventListener('click',function(){
		displayUD.style.display = 'block';
		displayADD.style.display = 'none';
		displaySEE.style.display = 'none';
		ud.style.background = '#000';
		add.style.background = '#fad';
		see.style.background = '#fad';
	});
	add.addEventListener('click',function(){
		displayADD.style.display = 'block';
		displayUD.style.display = 'none';
		displaySEE.style.display = 'none';
		ud.style.background = '#fad';
		see.style.background = '#fad';
		add.style.background = '#000';
	});
	see.addEventListener('click',function(){
		displayADD.style.display = 'none';
		displayUD.style.display = 'none';
		displaySEE.style.display = 'block';
		see.style.background = '#000';
		add.style.background = '#fad';
		ud.style.background = '#fad';
	});
</script>

</body>
</html>