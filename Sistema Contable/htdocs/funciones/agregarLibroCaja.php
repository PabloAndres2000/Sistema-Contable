<?php
session_start();
require_once("../config/db.php");
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
$resultado=$conexion->query("INSERT INTO librocaja (fecha,otros,residentes,proveedores,cotizaciones,iva,sueldos,honorarios,arriendos,otrosgastos) values('$fecha','$otros','$residentes','$proveedores','$cotizaciones','$iva','$sueldos','$honorarios','$arriendos','$otrosgastos')");
header('Location: /home.php?frag=librocaja');

?>