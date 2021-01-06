<?php
session_start();
require_once("../config/db.php");
$fecha=$_POST["fecha"];
$documento=$_POST["documento"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query("INSERT INTO otrosingresosmarzo (fecha,documento,detalle,valor) values('$fecha','$documento','$detalle',$valor)");
header('Location: /home.php?frag=otrosingresosmarzo');

?>