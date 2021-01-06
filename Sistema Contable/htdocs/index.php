<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/logo-vector.png">
    <meta http-equiv="refresh" content="300">
    <title>SISTEMA APOLO</title>
    <!-- IMPORTAR ESTILOS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- ESTILOS PROPIOS -->
<link rel="stylesheet" href="./assets/styles/style.css">
<link rel="stylesheet" href="./assets/styles/styleHome.css">
<link rel="stylesheet" href="./assets/styles/estilosBacanes.min.css">
<link rel="stylesheet" href="./assets/styles/estiloResidentes.css">



<!-- IMPORTAR JAVASCRIPT -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php 
session_start();
if(isset($_SESSION["LOGUEADO"]) ){
    header('Location: /home.php?frag=tablero');
} else{
    require_once("./views/viewLogin.php");
    require_once("./config/db.php");
}

?>
    
</body>
</html>


