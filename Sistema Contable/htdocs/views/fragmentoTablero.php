<?php 
require_once("./config/db.php");
$dateFrom=date('Y-m-01');
$dateTo=date('Y-m-t');

$mesAnterior=$conexion->query("SELECT valor FROM mesanterior");
$dataMesAnterior=$mesAnterior->fetch_assoc();
$pagosRecidentes=$conexion->query(" SELECT sum(valor) as totalPagosRecidentes FROM pagos WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$datapagosRecidentes=$pagosRecidentes->fetch_assoc();
$otrosIngresos=$conexion->query(" SELECT sum(valor) as totalOtrosIngresos FROM otrosingresos WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataOtrosIngresos=$otrosIngresos->fetch_assoc();
$totalIngresos=$dataMesAnterior["valor"]+$datapagosRecidentes["totalPagosRecidentes"]+$dataOtrosIngresos["totalOtrosIngresos"];
$provedores=$conexion->query("SELECT sum(valor) as totalProvedores FROM provedores WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataProvedores=$provedores->fetch_assoc();
$cotizaciones=$conexion->query(" SELECT sum(valor) as totalCotizaciones FROM cotizaciones WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataCotizaciones=$cotizaciones->fetch_assoc();
$iva=$conexion->query(" SELECT sum(valor) as totalIva FROM impuestoiva WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataiva=$iva->fetch_assoc();
$Remuneraciones=$conexion->query(" SELECT sum(valor) as totalRemuneraciones FROM remuneraciones WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataRemuneraciones=$Remuneraciones->fetch_assoc();
$Honorarios=$conexion->query(" SELECT sum(valor) as totalHonorarios FROM honorarios WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataHonorarios=$Honorarios->fetch_assoc();
$Arriendo=$conexion->query(" SELECT sum(valor) as totalArriendo FROM arriendo WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataArriendo=$Arriendo->fetch_assoc();
$otrosGastos=$conexion->query(" SELECT sum(valor) as totalOtrosGastos FROM otrosgastos WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
$dataOtrosGastos=$otrosGastos->fetch_assoc();
$totalIngresos=$dataMesAnterior["valor"]+$datapagosRecidentes["totalPagosRecidentes"]+$dataOtrosIngresos["totalOtrosIngresos"];
$totalEgresos=$dataProvedores["totalProvedores"]+$dataCotizaciones["totalCotizaciones"]+$dataiva["totalIva"]+$dataRemuneraciones["totalRemuneraciones"]+$dataHonorarios["totalHonorarios"]+$dataArriendo["totalArriendo"]+$dataOtrosGastos["totalOtrosGastos"];
setlocale(LC_TIME,"es_CL");
date_default_timezone_set('America/Santiago');
?> 

<div class="container mt-4">
  <div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ingresos (MES ACTUAL)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo number_format($totalIngresos);?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Egresos (MES ACTUAL)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo number_format($totalEgresos);?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    

  </div>
  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Resumen De Ganancias</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Comparacion Ingresos Anuales</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-primary"></i> Ingresos
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-success"></i> Otros ingresos
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="./assets/js/chart.js/Chart.min.js"></script>
<?php  
require_once("./funciones/graficoArea.php");
require_once("./funciones/grafico-pie.php");
?>