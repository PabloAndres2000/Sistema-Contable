<?php
session_start();
require_once("../config/db.php");
$idNotaCredito=$_POST["idNotaCredito"];
$fecha=$_POST["fecha"];
$factura=$_POST["factura"];
$provedor=$_POST["provedor"];
$rut=$_POST["rut"];
$exento=$_POST["exento"];
$neto=$_POST["neto"];
$iva=$_POST["iva"];
$total=$_POST["total"];
$resultado=$conexion->query(" UPDATE notacredito SET fecha='$fecha',factura='$factura',provedor='$provedor',rut='$rut',exento='$exento',neto='$neto',iva='$iva',total='$total' WHERE idNotaCredito=$idNotaCredito");
header('Location: /home.php?frag=librocompra');

?>