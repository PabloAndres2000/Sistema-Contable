<?php
session_start();
require_once("../config/db.php");
$correoRecibido=$_POST["Correo"];
$contraseñaRecibida=$_POST["Contraseña"];
$resultado=$conexion->query("SELECT * FROM usuarios WHERE correo = '$correoRecibido'");
if(mysqli_num_rows($resultado) > 0){
    $datoUsuario=mysqli_fetch_assoc($resultado);
    if(password_verify($contraseñaRecibida,$datoUsuario["contrasena"])){
        $_SESSION["LOGUEADO"] = true;
        $_SESSION["IDUSUARIO"] = $datoUsuario["idUsuario"];
        header('Location: /home.php?frag=tablero');
    } else{
        $_SESSION['ERRORLOGIN']="contraseña incorrecta";
        header('Location: /index.php');
    }


    

} else{
    $_SESSION['ERRORLOGIN']="Usuario No Existe";
        header('Location: /index.php'); 
}
?>