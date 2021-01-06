<?php
session_start();
require_once("../config/db.php");
$idLibroCompra=$_POST["idLibroCompra"];
$fecha=$_POST["fecha"];
$factura=$_POST["factura"];
$notacredito=$_POST["notacredito"];
$proveedor=$_POST["proveedor"];
$rut=$_POST["rut"];
$exento=$_POST["exento"];
$neto=$_POST["neto"];
$iva=$_POST["iva"];
$total=$_POST["total"];
$resultado=$conexion->query(" UPDATE librocompra SET fecha='$fecha',factura='$factura',proveedor='$proveedor',rut='$rut',exento='$exento',neto='$neto',iva='$iva',total='$total',notacredito='$notacredito' WHERE idLibroCompra=$idLibroCompra");
header('Location: /home.php?frag=librocompra');

?>