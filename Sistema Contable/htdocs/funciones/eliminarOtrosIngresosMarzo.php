<?php
session_start();
require_once("../config/db.php");
$idOtrosIngresoMarzo=$_GET["idOtrosIngresoMarzo"];
$resultado=$conexion->query(" DELETE FROM otrosingresosmarzo WHERE idOtrosIngresoMarzo=$idOtrosIngresoMarzo");
header('Location: /home.php?frag=otrosingresosmarzo');

?>