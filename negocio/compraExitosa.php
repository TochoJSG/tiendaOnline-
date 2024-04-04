<?php
    require 'negocio/config.php';
    require 'negocio/database.php';
    $db = new Database();
    $con = $db->conectar();
    $id_transaccion = isset($_GET['key']) ? $_GET['key']:'0';
    $error = '';
    if($id_transaccion == ''){
        $error = 'Error al procesar la peticion';
    }else{
        $sql = $con->prepare("SELECT count(id) FROM compra WHERE  id_transaccion=? AND status=?");
        $sql->execute([$id_transaccion,'COMPLETED']);
        if($sql->fetchColumn()>0){
            $sql = $con->prepare("SELECT id,fecha,email,total FROM productos WHERE  id_transaccion=? AND status=? LIMIT 1");
            $sql->execute([$id_transaccion,'COMPLETED']);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
          
            $idCompra = $row['id'];
            $total = $row['total'];
            $fecha = $row['fecha'];

            $sqlDet = $con->prepare("SELECT nombre,precio,cantidad FROM detalle_compra WHERE id_compra=?");
            $sqlDet->execute([$idCompra]);
        }else{
            $error = 'Error al enviar Comprobante';
        }
    }
?>