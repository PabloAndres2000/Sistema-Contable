<?php
session_start();
require_once("../config/db.php");
$fecha=$_POST["fecha"];
$valor=$_POST["valor"];
$resultado=$conexion->query("INSERT INTO impuestoiva (fecha,valor) values('$fecha',$valor)");
header('Location: /home.php?frag=impuestoiva');

?>