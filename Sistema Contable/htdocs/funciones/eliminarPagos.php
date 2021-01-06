<?php
session_start();
require_once("../config/db.php");
$idPago=$_GET["idPago"];
$resultado=$conexion->query(" DELETE FROM pagos WHERE idPago=$idPago");
header('Location: /home.php?frag=pagos');

?>