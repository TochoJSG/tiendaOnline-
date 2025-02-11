<?php
	class Database{
		private $hostname="45.90.220.70";
		private $database="tochamateriasprimas";//u222091460_TTiendaWebBD
		private $username="tochoDBA";//u222091460_tochoOwner   tochoOwner jjorgess081@gm
		private $password="Danna$@$$";//aredrace$%98
		private $charset="utf8mb4";
		
		function conectar(){
			try{
			    $conexion="mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->charset;
    			$option = [
    				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    				PDO::ATTR_EMULATE_PREPARES => false
    			];
            $conn = new PDO($conexion, $this->username, $this->password, $option);
			return $conn;
			}catch(PDOException $e){
				echo 'No-Conection::Error conexion: ' . $e->getMessage();
				exit;
			}
		}
	/*function __destruct() {
        $this->pdo = null;
      }*/

	  /*
	 	const mysql = require('mysql2');
		const connection = mysql.createConnection({
			host: '45.90.220.70',
			user: 'tocha_user',
			password: 'Danna$@$$',
			database: 'tochamateriasprimas'
		});

		connection.connect(err => {
			if (err) {
				console.error('Error de conexión a MySQL:', err);
				return;
			}
			console.log('Conectado a la base de datos');
		}); */
	}
?>