<?php
<<<<<<< HEAD
if(isset($_POST['idProducto'])){//|| isset($_POST['token'])    $productos = isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;
	$id = $_POST['idProducto'];//id
	$token = $_POST['token_tmp'];
	$token_tmp = hash_hmac('sha1',$id,"2014131176*$%_");//KEY_TOKEN);
	if($token === $token_tmp){
	    if( isset($_SESSION['carrito']['producto'][$id])? $_SESSION['carrito']['producto'][$id]+=1 : $_SESSION['carrito']['producto'][$id]=1 );//Solo habra una cantidad de producto
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
=======
if(isset($_POST['idProducto'])){
    echo 'tenemos id'; 
	$id=$_POST['idProducto'];//id
	$token=$_POST['token'];
	//echo 'tenemos token'.$token; 
	$token_tmp = hash_hmac('sha1',$id,"2014131176*$%_");
	//echo 'tenemos token_tmp'.$token_tmp; 
	if($token == $token_tmp){
		if(isset($_SESSION['carrito']['producto'][$id])){//Validar si se selecciono ya en carrito, si se vuelve a seleccionar incrementamos
			$_SESSION['carrito']['producto'][$id]+=1;
		}else{
		$_SESSION['carrito']['producto'][$id]=1;//Solo habra una cantidad de producto
		}
		$datos['numero']=count($_SESSION['carrito']['producto']);
		$datos['ok']=true;
		echo 'fallo en tercer if';
	}else{
		$datos['ok']=false;
		echo 'fallo en segundo if';
	}
}else{
	$datos['ok']=false;
	echo 'fallo en rimer if';
}
echo json_encode($datos);
?>
>>>>>>> 57f16565d94fc5722f6b7949232ee9399a0c284f
