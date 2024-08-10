<?php
require 'negocio/config.php';
require 'negocio/database.php';
$db=new Database();
$con =$db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
	echo 'Error al procesar la peticion';
	exit;
}else{

	$token_tmp = hash_hmac('sha1',$id,KEY_TOKEN);

	if($token == $token_tmp){
	//$sql=$con->prepare("SELECT id,nombre,precio FROM productos WHERE activo=1");
	$sql=$con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
	$sql->execute([$id]);//$sql->execute();
	
	if($sql->fetchColumn()>0){
		$sql=$con->prepare("SELECT nombre,descripcion,precio,descuento FROM productos WHERE id=? AND acivo=1 LIMIT 1");
		$sql->execute([$id]);		
		$row=$sql->fetch(PDO::FETCH_ASSOC);//$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		$nombre=$row['nombre'];
		$descripcion=$row['descripcion'];
		$precio=$row['precio'];
		$descuento=$row['descuento'];
		$precio_desc=$precio - (($precio*$descuento) /100);
		$dir_images = 'imagenes/productos/'.$id.'/';
		$rutaImg = $dir_images.'principal.jpg';
		if(!file_exists($rutaImg)){
			$rutaImg='imagenes/sinFoto.jpg';
		}
		$imagenes= array();
		if(file_exists($dir_images)){
			$dir=dir($dir_images);
		while(($archivo=$dir->read())!=false){
			if($archivo!='principal.jpg'&&(strpos($archivo,'jpg')||strpos($archivo,'jpeg'))){//busca archivos con la extension
				$imagenes[]=$dir_images.$archivo;
			}
		}
		$dir->close();
		}
		}else{
			echo 'Error al procesar la peticion';
			exit;	
		}
	}else{
		echo 'Error al procesar la peticion';
		exit;
	}
}
?>