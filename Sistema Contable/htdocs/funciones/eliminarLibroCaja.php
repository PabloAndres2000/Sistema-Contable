<?php
session_start();
require_once("../config/db.php");
$idLibroCaja=$_GET["idLibroCaja"];
$resultado=$conexion->query(" DELETE FROM librocaja WHERE idLibroCaja=$idLibroCaja");
header('Location: /home.php?frag=librocaja');

?>