<?php
session_start();
require_once("../config/db.php");
$idUsuario=$_POST["idUsuario"];
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$password=$_POST["password"];
$passwordEncriptada=password_hash($password,PASSWORD_DEFAULT);
$resultado=$conexion->query(" UPDATE usuarios SET nombre='$nombre',correo='$correo',contrasena='$passwordEncriptada' WHERE idUsuario=$idUsuario");
header('Location: /home.php?frag=usuarios');

?>