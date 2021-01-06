<?php
session_start();
require_once("../config/db.php");
$idUsuario=$_GET["idUsuario"];
$resultado=$conexion->query(" DELETE FROM usuarios WHERE idUsuario=$idUsuario");
header('Location: /home.php?frag=usuarios');

?>