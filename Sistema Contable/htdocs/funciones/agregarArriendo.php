<?php
session_start();
require_once("../config/db.php");
$fecha=$_POST["fecha"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query("INSERT INTO arriendo (fecha,detalle,valor) values('$fecha','$detalle',$valor)");
header('Location: /home.php?frag=arriendo');

?>