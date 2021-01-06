<?php
session_start();
require_once("../config/db.php");
$idRemuneraciones=$_GET["idRemuneraciones"];
$resultado=$conexion->query(" DELETE FROM remuneraciones WHERE idRemuneraciones=$idRemuneraciones");
header('Location: /home.php?frag=remuneraciones');

?>