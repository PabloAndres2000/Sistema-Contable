<?php
session_start();
require_once("../config/db.php");
$idLibroCajaDetalles=$_POST["idLibroCajaDetalles"];
$fecha=$_POST["fecha"];
$detalle=$_POST["detalle"];
$dcto=$_POST["dcto"];
$interno=$_POST["interno"];
$ingreso=$_POST["ingreso"];
$egreso=$_POST["egreso"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE librocajadetalles SET fecha='$fecha',detalle='$detalle',dcto='$dcto',interno='$interno',ingreso='$ingreso',egreso='$egreso',valor='$valor' WHERE idLibroCajaDetalles=$idLibroCajaDetalles");
header('Location: /home.php?frag=librocajadetalles');

?>