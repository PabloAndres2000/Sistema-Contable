<?php
session_start();
require_once("../config/db.php");
$idCotizaciones=$_GET["idCotizaciones"];
$resultado=$conexion->query(" DELETE FROM cotizaciones WHERE idCotizaciones=$idCotizaciones");
header('Location: /home.php?frag=cotizaciones');

?>