<?php
session_start();
require_once("../config/db.php");
$idOtroIngreso=$_GET["idOtroIngreso"];
$resultado=$conexion->query(" DELETE FROM otrosingresos WHERE idOtroIngreso=$idOtroIngreso");
header('Location: /home.php?frag=otrosingresos');

?>