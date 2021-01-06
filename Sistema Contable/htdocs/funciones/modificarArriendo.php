<?php
session_start();
require_once("../config/db.php");
$idArriendo=$_POST["idArriendo"];
$fecha=$_POST["fecha"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE arriendo SET valor=$valor,fecha='$fecha',detalle='$detalle' WHERE idArriendo=$idArriendo");
header('Location: /home.php?frag=arriendo');

?>