<?php
session_start();
require_once("../config/db.php");
$idProvedores=$_POST["idProvedores"];
$fecha=$_POST["fecha"];
$documento=$_POST["documento"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE provedores SET valor=$valor,fecha='$fecha',detalle='$detalle',documento=$documento WHERE idProvedores=$idProvedores");
header('Location: /home.php?frag=provedores');

?>