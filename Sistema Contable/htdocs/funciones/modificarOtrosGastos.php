<?php
session_start();
require_once("../config/db.php");
$idOtrosGastos=$_POST["idOtrosGastos"];
$fecha=$_POST["fecha"];
$detalle=$_POST["detalle"];
$valor=$_POST["valor"];
$resultado=$conexion->query(" UPDATE otrosgastos SET valor=$valor,fecha='$fecha',detalle='$detalle' WHERE idOtrosGastos=$idOtrosGastos");
header('Location: /home.php?frag=otrosgastos');

?>