<?php
session_start();
require_once("../config/db.php");
$idLibroCajaDetalles=$_GET["idLibroCajaDetalles"];
$resultado=$conexion->query(" DELETE FROM librocajadetalles WHERE idLibroCajaDetalles=$idLibroCajaDetalles");
header('Location: /home.php?frag=librocajadetalles');

?>