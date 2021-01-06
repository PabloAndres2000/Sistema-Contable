<?php
session_start();
require_once("../config/db.php");
$idRemuneraciones=$_POST["idRemuneraciones"];
$fecha=$_POST["fecha"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE remuneraciones SET valor=$valor,fecha='$fecha',detalle='$detalle' WHERE idRemuneraciones=$idRemuneraciones");
header('Location: /home.php?frag=remuneraciones');

?>