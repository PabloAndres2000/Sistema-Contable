<?php
session_start();
require_once("../config/db.php");
$idCotizaciones=$_POST["idCotizaciones"];
$fecha=$_POST["fecha"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE cotizaciones SET valor=$valor,fecha='$fecha',detalle='$detalle' WHERE idCotizaciones=$idCotizaciones");
header('Location: /home.php?frag=cotizaciones');

?>