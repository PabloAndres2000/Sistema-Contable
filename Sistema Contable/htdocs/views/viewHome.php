<?php
session_start();
require_once("./config/db.php");
if (isset($_SESSION["IDUSUARIO"])) {
    $idUsuario = $_SESSION["IDUSUARIO"];
    $resultado = $conexion->query("SELECT * FROM usuarios WHERE idUsuario=$idUsuario");
    $datoUsuario = mysqli_fetch_assoc($resultado);
} else {
    header('Location: /index.php');
}
$fragmento = $_GET["frag"];
$fragmento_Seleccionado = "";
switch ($fragmento) {
    case "tablero":
        $fragmento_Seleccionado = "fragmentoTablero.php";
        break;
    case "pagos":
        $fragmento_Seleccionado = "fragmentoPagos.php";
        break;
    case "otrosingresos":
        $fragmento_Seleccionado = "fragmentoOtrosIngresos.php";
        break;
    case "provedores":
        $fragmento_Seleccionado = "fragmentoProvedores.php";
        break;
    case "cotizaciones":
        $fragmento_Seleccionado = "fragmentoCotizaciones.php";
        break;
    case "impuestoiva":
        $fragmento_Seleccionado = "fragmentoIva.php";
        break;
    case "remuneraciones":
        $fragmento_Seleccionado = "fragmentoRemuneraciones.php";
        break;
    case "honorarios":
        $fragmento_Seleccionado = "fragmentoHonorarios.php";
        break;
    case "arriendo":
        $fragmento_Seleccionado = "fragmentoArriendo.php";
        break;
    case "otrosingresos":
        $fragmento_Seleccionado = "fragmentoOtrosIngresos.php";
        break;
    case "otrosgastos":
        $fragmento_Seleccionado = "fragmentoOtrosGastos.php";
        break;
    case "mesanterior":
        $fragmento_Seleccionado = "fragmentoMesAnterior.php";
        break;
    case "librocompra":
        $fragmento_Seleccionado = "fragmentoLibroCompras.php";
        break;
    case "librobanco":
        $fragmento_Seleccionado = "fragmentoLibroBanco.php";
        break;
    case "librocaja":
        $fragmento_Seleccionado= "fragmentoLibroCaja.php";
        break;    
    case "usuarios":
        $fragmento_Seleccionado= "fragmentoUsuarios.php";
        break;    
    case "librocajainforme":
        $fragmento_Seleccionado="fragmentoInformeLibroCaja.php";
        break;    
    case "librocajadetalles":
        $fragmento_Seleccionado="fragmentoLibroCajaDetalles.php";
        break;    

    default:
        $fragmento_Seleccionado = "fragmentoTablero.php";
        break;
}
?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<!-- Bootstrap NavBar -->
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="../assets/logo-blanco.png" width="100" class="d-inline-block align-top" alt="">

    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="../funciones/logout.php">CERRAR SESION</a>
            </li>
            <!-- This menu is hidden in bigger devices with d-sm-none. 
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
            <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Menu </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="../home.php?frag=tablero">Tablero</a>
                    <a class="dropdown-item" href="../home.php?frag=pagos">Ingresos Residentes</a>
                    <a class="dropdown-item" href="../home.php?frag=otrosingresos">Otros Ingresos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../home.php?frag=mesanterior">Mes Anterior</a>
                    <a class="dropdown-item" href="../home.php?frag=provedores">Proveedores</a>
                    <a class="dropdown-item" href="../home.php?frag=cotizaciones">Cotizaciones</a>
                    <a class="dropdown-item" href="../home.php?frag=impuestoiva">Impuesto Iva</a>
                    <a class="dropdown-item" href="../home.php?frag=remuneraciones">Remuneraciones</a>
                    <a class="dropdown-item" href="../home.php?frag=honorarios">Honorarios</a>
                    <a class="dropdown-item" href="../home.php?frag=arriendo">Arriendo</a>
                    <a class="dropdown-item" href="../home.php?frag=otrosgastos">Otros Gastos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../home.php?frag=librocompra">Libro Compra</a>
                    <a class="dropdown-item" href="../home.php?frag=librobanco">Libro Banco</a>
                    <a class="dropdown-item" href="../home.php?frag=librocaja">Libro Caja</a>
                    <a class="dropdown-item" href="../home.php?frag=librocajainforme">Libro Caja-Informe</a>
                    <a class="dropdown-item" href="../home.php?frag=librocajadetalles">Libro Caja-Detalles</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../home.php?frag=usuarios">Usuarios</a>
                   
                </div>
            </li><!-- Smaller devices menu END -->
        </ul>
    </div>
</nav><!-- NavBar END -->
<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <span class="menu-collapsed">Bienvenido <?php echo $datoUsuario["nombre"] ?></span>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="../home.php?frag=tablero" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-tachometer-alt-slowest fa-fw mr-3"></span>
                    <span class="menu-collapsed">Tablero</span>
                </div>
            </a>

            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-dollar-sign fa-fw mr-3"></span>
                    <span class="menu-collapsed">Ingresos</span>
                    <span class="fas fa-sort-down ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="../home.php?frag=pagos" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-users ml-auto"></span>
                    <span class="menu-collapsed">Ingresos Residentes</span>

                </a>
                <a href="../home.php?frag=otrosingresos" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-user-secret ml-auto"></span>
                    <span class="menu-collapsed">Otros Ingresos</span>

                </a>
                <a href="../home.php?frag=mesanterior" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-sack-dollar ml-auto"></span>
                    <span class="menu-collapsed">Saldo Mes Anterior</span>
                </a>

            </div>
            <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-file-invoice-dollar fa-fw mr-3"></span>
                    <span class="menu-collapsed">Egresos</span>
                    <span class="fas fa-sort-down ml-auto"></span>

                </div>
            </a>

            <!-- Submenu content -->
            <div id='submenu3' class="collapse sidebar-submenu">
                <a href="../home.php?frag=provedores" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <span class="fas fa-address-card ml-auto"></span>
                    <span class="menu-collapsed">Proveedores</span>
                </a>
                <a href="../home.php?frag=cotizaciones" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-file-chart-pie ml-auto"></span>
                    <span class="menu-collapsed">Cotizaciones</span>

                </a>
                <a href="../home.php?frag=impuestoiva" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-percentage ml-auto"></span>
                    <span class="menu-collapsed">Impuesto Iva</span>

                </a>
                <a href="../home.php?frag=remuneraciones" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-comment-alt-dollar ml-auto"></span>
                    <span class="menu-collapsed">Remuneraciones</span>
                </a>
                <a href="../home.php?frag=honorarios" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-pen ml-auto"></span>
                    <span class="menu-collapsed">Honorarios</span>

                </a>
                <a href="../home.php?frag=arriendo" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-home ml-auto"></span>
                    <span class="menu-collapsed">Arriendos</span>

                </a>
                <a href="../home.php?frag=otrosgastos" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-user-secret ml-auto"></span>
                    <span class="menu-collapsed">Otros Gastos</span>


                </a>
            </div>
            <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="far fa-file-chart-line fa-fw mr-3"></span>
                    <span class="menu-collapsed">Informe</span>
                    <span class="fas fa-sort-down ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu4' class="collapse sidebar-submenu">
                </a>
                <a href="../home.php?frag=librocompra" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-user-secret ml-auto"></span>
                    <span class="menu-collapsed">Libro Compras</span>
                </a>
                <a href="../home.php?frag=librobanco" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-user-secret ml-auto"></span>
                    <span class="menu-collapsed">Libro Banco</span>
                </a>
                <a href="../home.php?frag=librocaja" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-user-secret ml-auto"></span>
                    <span class="menu-collapsed">Libro Caja</span>
                </a>
                <a href="../home.php?frag=librocajainforme" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-user-secret ml-auto"></span>
                    <span class="menu-collapsed">Libro Caja-INFORME</span>
                </a>
                <a href="../home.php?frag=librocajadetalles" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="fas fa-user-secret ml-auto"></span>
                    <span class="menu-collapsed">Libro Caja-Detalles</span>
                </a>
            </div>
            <a href="../home.php?frag=usuarios" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-users fa-fw mr-3"></span>
                    <span class="menu-collapsed">Usuarios</span>
                </div>
            </a>










        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <!-- MAIN -->
    <!-- Earnings (Monthly) Card Example -->

    <?php
    include_once($fragmento_Seleccionado);
    ?>
