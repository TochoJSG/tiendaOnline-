<?php
if(isset($_POST['idProducto'])){//|| isset($_POST['token'])    $productos = isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;
	$id = $_POST['idProducto'];//id
	$token = $_POST['token_tmp'];
	$token_tmp = hash_hmac('sha1',$id,"2014131176*$%_");//KEY_TOKEN);
	if($token === $token_tmp){
	    if( isset($_SESSION['carrito']['producto'][$id])? $_SESSION['carrito']['producto'][$id]+=1:$_SESSION['carrito']['producto'][$id]=1 );//Solo habra una cantidad de producto
		$datos['numero'] = count($_SESSION['carrito']['producto']);
		$datos['ok'] = true;
	}else{
		$datos['ok'] = false;
	}
}else{
	$datos['ok'] = false;
}
echo json_encode($datos);
?>
