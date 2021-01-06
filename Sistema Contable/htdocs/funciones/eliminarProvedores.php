<?php
session_start();
require_once("../config/db.php");
$idProvedores=$_GET["idProvedores"];
$resultado=$conexion->query(" DELETE FROM provedores WHERE idProvedores=$idProvedores");
header('Location: /home.php?frag=provedores');

?>