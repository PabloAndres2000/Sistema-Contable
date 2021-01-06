<?php
session_start();
require_once("../config/db.php");
$idPago=$_POST["idPago"];
$fecha=$_POST["fecha"];
$documento=$_POST["documento"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE pagos SET valor=$valor,fecha='$fecha',detalle='$detalle',documento=$documento WHERE idPago=$idPago");
header('Location: /home.php?frag=pagos');

?>