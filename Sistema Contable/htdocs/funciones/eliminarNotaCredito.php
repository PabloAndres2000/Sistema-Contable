<?php
session_start();
require_once("../config/db.php");
$idNotaCredito=$_GET["idNotaCredito"];
$resultado=$conexion->query(" DELETE FROM notacredito WHERE idNotaCredito=$idNotaCredito");
header('Location: /home.php?frag=librocompra');

?>