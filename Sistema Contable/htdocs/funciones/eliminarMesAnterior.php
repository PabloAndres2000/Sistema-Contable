<?php
session_start();
require_once("../config/db.php");
$idMesAnterior=$_GET["idMesAnterior"];
$resultado=$conexion->query(" DELETE FROM mesanterior WHERE idMesAnterior=$idMesAnterior");
header('Location: /home.php?frag=mesanterior');

?>