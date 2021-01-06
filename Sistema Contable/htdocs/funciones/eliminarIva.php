<?php
session_start();
require_once("../config/db.php");
$idImpuestoIva=$_GET["idImpuestoIva"];
$resultado=$conexion->query(" DELETE FROM impuestoiva WHERE idImpuestoIva=$idImpuestoIva");
header('Location: /home.php?frag=impuestoiva');

?>