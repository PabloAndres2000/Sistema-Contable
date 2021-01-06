<?php
session_start();
require_once("../config/db.php");
$fecha=$_POST["fecha"];
$factura=$_POST["factura"];
$notaCredito=$_POST["notacredito"];
$proveedor=$_POST["proveedor"];
$rut=$_POST["rut"];
$exento=$_POST["exento"];
$neto=$_POST["neto"];
$iva=$_POST["iva"];
$total=$_POST["total"];
$resultado=$conexion->query("INSERT INTO librocompra (fecha,factura,proveedor,rut,exento,neto,iva,total,notacredito) values('$fecha','$factura','$proveedor','$rut','$exento','$neto','$iva','$total','$notaCredito')");
header('Location: /home.php?frag=librocompra');

?>