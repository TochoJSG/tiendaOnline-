<?php
require 'negocio/database.php';
require 'negocio/clases/carrito.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare("SELECT idProducto,nombre,precio FROM producto WHERE activo=1");
$sql->execute();
$productos = $sql->fetchAll(PDO::FETCH_ASSOC);
//echo json_encode($productos);//Funciona de perlas la consulta

function agregar($id,$cantidad){
    $res = 0;
    if($id>0 && $cantidad>0 &&is_numeric($cantidad)){
        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] = $cantidad;
            $db = new Database();
            $con = $db->conectar();
            $sql = $con->prepare("SELECT precio,descuento FROM producto WHERE idProducto=? AND activo=1 LIMIT 1");
            $sql->execute([$id]);//Enviamos id para ejecutar
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio*$descuento)/100);
            $res = $cantidad * $precio_desc;
            return $res;
        }
    }else{
        return $res;
    }
}
function eliminar($id){
    if($id>0){
        if(isset($_SESSION['carrito']['producto'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);//elimina los indice
            return true;
        }
    }else{
        return false;
    }
}

?>