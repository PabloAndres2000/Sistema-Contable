<?php
session_start();
require_once("../config/db.php");
$idArriendo=$_GET["idArriendo"];
$resultado=$conexion->query(" DELETE FROM arriendo WHERE idArriendo=$idArriendo");
header('Location: /home.php?frag=arriendo');

?>