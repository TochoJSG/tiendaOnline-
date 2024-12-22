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
	<title>Personal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo_interfaz.css"/>
</head>
<body style="background:#daf;">

<div class="controlesRH">
	<button id="addEmploye" class="HRbutton">Registra Empleado</button>
	<button id="seeEmploye" class="HRbutton">Ver Empleados</button>
	<button id="updateEmploye" class="HRbutton">Edita Empleado</button>
</div>

<div class="procesosRH">

<div id="nosotros" class="modal"><!--REGISTRO

idEmpleado	sueldo	nombres	apellidos	tel	mail rfc	seguro	fechaIngreso	


-->
	<div class="headerForm">
		<h3>Hola, Captura los datos del Empleado</h3>
	</div>
	<form method="POST" action= "./registraEmpleado.php">
		<input id="nombres" name="nombres" type="text" placeholder="Ingresa los nombres del empleado" maxlength="66" required onchange="this.value = this.value.toUpperCase();">
		
		<input id="apellidos" name="apellidos" type="text" placeholder="Ingresa los apellidos" maxlength="66" required onchange="this.value = this.value.toUpperCase();">
		
		<label for="sueldo">Ingresa el sueldo semanal</label>
		<input id="sueldo" name="sueldo" type="number" placeholder="Pago semanal" min="600" required>
		
		<input id="tel" name="tel" type="tel" placeholder="Ingresa el teléfono del trabajador" required>
		
		<input id="mail" name="mail" type="email" placeholder="Ingresa el correo electrónico">
		
		<input id="rfc" name="rfc" type="text" placeholder="Ingresa el RFC" onchange="this.value = this.value.toUpperCase();">
		
		<label for="fechaIngreso">Fecha de ingreso</label>
		<input id="fechaIngreso" name="fechaIngreso" type="date" required>

		<!--<input id="seguro" type="text" name="seguro" placeholder="Ingresa el número de Seguro" onchange="upperCase();"> alter-->
		<label for="departamento">Departamento</label>
		<select id="departamento" name="departamento">
		<?php
			$deptos = new Database();
			$conDeptos = $deptos->conectar();
			$sqlDepto = $conDeptos->prepare("CALL ConsultaCataEmpDepto();");
			$sqlDepto->execute();
			$departamentos = $sqlDepto->fetchAll(PDO::FETCH_ASSOC);
			foreach ($departamentos as $d):
				echo '<option value="'.$d['idDepto'].'">'.$d['departamento'].'</option>';
			endforeach;
		?>
		</select>
		
		<label for="rol">Cargo</label>
		<select id="rol" name="rol">
		<?php
			$rol = new Database();
			$conRol = $rol->conectar();
			$sqlRol = $conRol->prepare("CALL ConsultaCataEmpRoles();");
			$sqlRol->execute();
			$roles = $sqlRol->fetchAll(PDO::FETCH_ASSOC);
			foreach ($roles as $r):
				echo '<option value="'.$r['idRol'].'">'.$r['rol'].'</option>';
			endforeach;
		?>
		</select>
		<label for="tipoContrato">Tipo de Contrato</label>
		<select id="tipoContrato" name="tipoContrato">
		<?php
			$contrat = new Database();
			$conContrat = $contrat->conectar();
			$sqlContrat = $conContrat->prepare("CALL ConsultaCataEmpContrat();");
			$sqlContrat->execute();
			$contratos = $sqlContrat->fetchAll(PDO::FETCH_ASSOC);
			foreach ($contratos as $c):
				echo '<option value="'.$c['idContrato'].'">'.$c['tipo'].'</option>';
			endforeach;
		?>
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
		<?php
			$deptosUD = new Database();
			$conDeptosUD = $deptosUD->conectar();
			$sqlDeptoUD = $conDeptosUD->prepare("CALL ConsultaCataEmpDepto();");
			$sqlDeptoUD->execute();
			$departamentosUD = $sqlDeptoUD->fetchAll(PDO::FETCH_ASSOC);
			foreach ($departamentosUD as $d):
				echo '<option value="'.$d['idDepto'].'">'.$d['departamento'].'</option>';
			endforeach;
		?>
		</select>
		
		<label for="rol">Cargo</label>
		<select id="rol" name="rol" disabled>
		<?php
			$rolUD = new Database();
			$conRolUD = $rolUD->conectar();
			$sqlRolUD = $conRolUD->prepare("CALL ConsultaCataEmpRoles();");
			$sqlRolUD->execute();
			$rolesUD = $sqlRolUD->fetchAll(PDO::FETCH_ASSOC);
			foreach ($rolesUD as $r):
				echo '<option value="'.$r['idRol'].'">'.$r['rol'].'</option>';
			endforeach;
		?>
		</select>
		<label for="contrato">Tipo de Contrato</label>
		<select id="contrato" name="contrato" disabled>
		<?php
			$contratUD = new Database();
			$conContratUD = $contratUD->conectar();
			$sqlContratUD = $conContratUD->prepare("CALL ConsultaCataEmpContrat();");
			$sqlContratUD->execute();
			$contratosUD = $sqlContratUD->fetchAll(PDO::FETCH_ASSOC);
			foreach ($contratosUD as $c):
				echo '<option value="'.$c['idContrato'].'">'.$c['tipo'].'</option>';
			endforeach;
		?>
		</select>
		
		<input id="altaEmpleado" type="submit" value="A C T U A L I Z A  R" disabled>
	</form>
</div>



<div id="seeRH" class="modal"><!--Ver Colaboradores-->
	<div class="headerForm">
		<h3>Lista de Colaboradores</h3>
	</div>
	<div class="listaProductos">
		<?php
			$nomina = new Database();
			$conexionNom = $nomina->conectar();
			$sqlNom = $conexionNom->prepare("CALL ConsultAllEmployes();");
			$sqlNom->execute();
			$empleados = $sqlNom->fetchAll(PDO::FETCH_ASSOC);
			
			foreach ($empleados as $e):
				$nombre = $e['nombres'];
				$apellido = $e['apellidos'];
				$sueldo = $e['sueldo'];
				$tel = $e['tel'];
				$mail = $e['mail'];
				$rfc =  $e['rfc'];
				$rol =  $e['rol'];
				$fechaIng =  $e['fechaIngreso'];

				echo '<br><span value="' . htmlspecialchars($idEmpleado) . '" style="color:#fff;padding:33px 17px;">'
					. htmlspecialchars($nombre) . '<-apellido   "'
					. htmlspecialchars($apellido) . '" <-sueldo '
					. htmlspecialchars($sueldo) . '  tel->'
					. htmlspecialchars($tel) . '  mail->'
					. htmlspecialchars($mail) . '  rfc->'
					. htmlspecialchars($rfc) . '  rol->'
					. htmlspecialchars($rol) . '  fechaIng->'
					. htmlspecialchars($fechaIng)
					. '</span><br>';
			endforeach;
		?>
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