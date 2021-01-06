<?php
session_start();
require_once("../config/db.php");
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$password=$_POST["password"];
$passwordEncriptada=password_hash($password,PASSWORD_DEFAULT);
$resultado=$conexion->query("INSERT INTO usuarios (nombre,correo,contrasena) values('$nombre','$correo','$passwordEncriptada')");
header('Location: /home.php?frag=usuarios');

?>