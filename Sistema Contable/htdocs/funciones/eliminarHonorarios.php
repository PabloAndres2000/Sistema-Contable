<?php
session_start();
require_once("../config/db.php");
$idHonorarios=$_GET["idHonorarios"];
$resultado=$conexion->query(" DELETE FROM honorarios WHERE idHonorarios=$idHonorarios");
header('Location: /home.php?frag=honorarios');

?>
