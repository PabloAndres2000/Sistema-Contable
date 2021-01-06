<?php
session_start();
require_once("../config/db.php");
$fecha=$_POST["fecha"];
$factura=$_POST["factura"];
$provedor=$_POST["provedor"];
$rut=$_POST["rut"];
$exento=$_POST["exento"];
$neto=$_POST["neto"];
$iva=$_POST["iva"];
$total=$_POST["total"];
$resultado=$conexion->query("INSERT INTO notacredito (fecha,factura,provedor,rut,exento,neto,iva,total) values('$fecha','$factura','$provedor','$rut',$exento,$neto,$iva,$total)");
header('Location: /home.php?frag=librocompra');

?>