<?php
session_start();
require_once("../config/db.php");
$idImpuestoIva=$_POST["idImpuestoIva"];
$fecha=$_POST["fecha"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE impuestoiva SET valor=$valor,fecha='$fecha' WHERE idImpuestoIva=$idImpuestoIva");
header('Location: /home.php?frag=impuestoiva');

?>