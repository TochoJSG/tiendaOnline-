<?php
//Conexion con la BD y servidor
$link = mysql_connect("localhost","root",""); or die("<h2>No se encuentra el servidor</h2>");;//Servidor, Usuario, Contraseña
$db = mysql_select_db(""usuarios,$link) or die("<h2>Error de conexion</h2>");//Base de datos a conectar, link de conexioncon el servidor

//Variables traidas por metodo Post, valores del formulario
$nombre = $_POST['usuario'];//Info de etiquetas Input
$email = $_POST['correo'];
$pw = $_POST['pwusuario'];
$pw2 = $_POST['pwusuario2'];

//Obtiene la longitud de un String
$req = (strlen($nombre) * strlen($email) * strlen($pw) * strlen($pw2)) or die("No se llenaron todos los campos correctamente");

//Se confirma la contraseña
if($pw != $pw2){
	die('Las contraseñas no coinciden <br<br><a href="registro.html">Volver</a>')
	}
	
	//Se encripta la contraseña
	$contraseniaUsuario = md5($pw);
	
	//Funcion cachondona: Ingresa info a tabla de Datos
	mysql_query("INSERT INTO datos VALUES('','$nombre','$email','$contraseniaUsuario')",$link);

	echo '
		<h1>Registro Complete</h2>
		<h2>Gracias por registrarse, ya puedes comprar directo con nosotros online</h2>
		<a href="login.html">Logearse</a>
	';
?>