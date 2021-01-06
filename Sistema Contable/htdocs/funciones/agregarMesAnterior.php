<?php
session_start();
require_once("../config/db.php");
$valor=$_POST["valor"];
$resultado=$conexion->query("INSERT INTO mesanterior (valor) values('$valor')");
header('Location: /home.php?frag=mesanterior');

?>