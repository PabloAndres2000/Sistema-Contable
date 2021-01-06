idHonorarios 
<?php
session_start();
require_once("../config/db.php");
$idHonorarios=$_POST["idHonorarios"];
$fecha=$_POST["fecha"];
$documento=$_POST["documento"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE honorarios SET valor=$valor,fecha='$fecha',detalle='$detalle',documento=$documento WHERE idHonorarios=$idHonorarios");
header('Location: /home.php?frag=honorarios');

?>