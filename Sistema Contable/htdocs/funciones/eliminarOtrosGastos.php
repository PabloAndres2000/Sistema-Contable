<?php
session_start();
require_once("../config/db.php");
$idOtrosGastos=$_GET["idOtrosGastos"];
$resultado=$conexion->query(" DELETE FROM otrosgastos WHERE idOtrosGastos=$idOtrosGastos");
header('Location: /home.php?frag=otrosgastos');

?>
