<?php
session_start();
require_once("../config/db.php");
$idLibroCaja=$_POST["idLibroCaja"];
$fecha=$_POST["fecha"];
$otros=$_POST["otros"];
$residentes=$_POST["residentes"];
$proveedores=$_POST["proveedores"];
$cotizaciones=$_POST["cotizaciones"];
$iva=$_POST["iva"];
$sueldos=$_POST["sueldos"];
$honorarios=$_POST["honorarios"];
$arriendos=$_POST["arriendos"];
$otrosgastos=$_POST["otrosgastos"];
$resultado=$conexion->query(" UPDATE librocaja SET fecha='$fecha',otros='$otros',residentes='$residentes',proveedores='$proveedores',cotizaciones='$cotizaciones',iva='$iva',sueldos='$sueldos',honorarios='$honorarios',arriendos='$arriendos',otrosgastos='$otrosgastos' WHERE idLibroCaja=$idLibroCaja");
header('Location: /home.php?frag=librocaja');

?>