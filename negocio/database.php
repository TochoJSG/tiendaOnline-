<?php
	class Database{
		private $hostname="127.0.0.1:3306";//127.0.0.1:3306
		private $database="u222091460_TTiendaWebBD";//u222091460_TTiendaWebBD
		private $username="u222091460_tochoOwner";//u222091460_tochoOwner   tochoOwner jjorgess081@gm
		private $password="131176Aredrace$%98";//aredrace$%98
		private $charset="utf8mb4";
		function conectar(){
			try{
			    $conexion="mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->charset;
    			$option=[
    				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    				PDO::ATTR_EMULATE_PREPARES => false
    			];
            $conn  = new PDO($conexion,$this->username,$this->password,$option);
			return $conn;
		}catch(PDOException $e){
			echo 'No-Conection::Error conexion: ' . $e->getMessage();
			exit;
		}
		
		}
	/*function __destruct() {
        $this->pdo = null;
      }*/
	}
?>