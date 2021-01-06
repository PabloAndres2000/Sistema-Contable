<?php 
$baseDeDatos="sistema";
$servidor="localhost";
$usuario="root";
$contraseña="";
//Crear Una Conexion
setlocale(LC_ALL, 'es_CL');

$conexion=new mysqli($servidor,$usuario,$contraseña,$baseDeDatos);
if($conexion->connect_error){
    

} else{
    return $conexion;
}
?>