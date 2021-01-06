<?php
session_start();
require_once("../config/db.php");
$idMesAnterior=$_POST["idMesAnterior"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE mesanterior SET valor=$valor WHERE idMesAnterior=$idMesAnterior");
header('Location: /home.php?frag=mesanterior');

?>