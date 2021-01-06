<?php
session_start();
require_once("../config/db.php");
$idLibroCompra=$_GET["idLibroCompra"];
$resultado=$conexion->query(" DELETE FROM librocompra WHERE idLibroCompra=$idLibroCompra");
header('Location: /home.php?frag=librocompra');

?>