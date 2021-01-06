<?php
session_start();
require_once("../config/db.php");
$idOtroIngreso=$_POST["idOtroIngreso"];
$fecha=$_POST["fecha"];
$documento=$_POST["documento"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE otrosingresos SET valor=$valor,fecha='$fecha',detalle='$detalle',documento='$documento' WHERE idOtroIngreso=$idOtroIngreso");
header('Location: /home.php?frag=otrosingresos');

?>