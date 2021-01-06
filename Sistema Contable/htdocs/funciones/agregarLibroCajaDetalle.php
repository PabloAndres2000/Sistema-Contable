<?php
session_start();
require_once("../config/db.php");
$fecha=$_POST["fecha"];
$detalle=$_POST["detalle"];
$dcto=$_POST["dcto"];
$interno=$_POST["interno"];
$ingreso=$_POST["ingreso"];
$egreso=$_POST["egreso"];
$valor=$_POST["valor"];
$resultado=$conexion->query("INSERT INTO librocajadetalles (fecha,detalle,dcto,interno,ingreso,egreso,valor) values('$fecha','$detalle','$dcto','$interno','$ingreso','$egreso',$valor)");
header('Location: /home.php?frag=librocajadetalles');

?>