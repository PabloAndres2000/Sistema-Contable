<?php
session_start();
require_once("../config/db.php");
$idOtroIngresoFebrero=$_GET["idOtroIngresoFebrero"];
$resultado=$conexion->query(" DELETE FROM otrosingresosfebrero WHERE idOtroIngresoFebrero=$idOtroIngresoFebrero");
header('Location: /home.php?frag=otrosingresosfebrero');

?>