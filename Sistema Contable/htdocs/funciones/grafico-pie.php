<?php 
require_once("./config/db.php");
$totalEnero=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-01-01')");
$dataEnero=$totalEnero->fetch_assoc();
$totalOtrosEnero=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-01-01')");
$dataOtrosEnero=$totalOtrosEnero->fetch_assoc();

$totalFebrero=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-02-01')");
$dataFebrero=$totalFebrero->fetch_assoc();
$totalOtrosFebrero=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-02-01')");
$dataOtrosFebrero=$totalOtrosFebrero->fetch_assoc();

$totalMarzo=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-03-01')");
$dataMarzo=$totalMarzo->fetch_assoc();
$totalOtrosMarzo=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-03-01')");
$dataOtrosMarzo=$totalOtrosMarzo->fetch_assoc();

$totalAbril=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-04-01')");
$dataAbril=$totalAbril->fetch_assoc();
$totalOtrosAbril=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-04-01')");
$dataOtrosAbril=$totalOtrosAbril->fetch_assoc();

$totalMayo=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-05-01')");
$dataMayo=$totalMayo->fetch_assoc();
$totalOtrosMayo=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-05-01')");
$dataOtrosMayo=$totalOtrosMayo->fetch_assoc();

$totalJunio=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-06-01')");
$dataJunio=$totalJunio->fetch_assoc();
$totalOtrosJunio=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-06-01')");
$dataOtrosJunio=$totalOtrosJunio->fetch_assoc();

$totalJulio=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-07-01')");
$dataJulio=$totalJulio->fetch_assoc();
$totalOtrosJulio=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-07-01')");
$dataOtrosJulio=$totalOtrosJulio->fetch_assoc();

$totalAgosto=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-08-01')");
$dataAgosto=$totalAgosto->fetch_assoc();
$totalOtrosAgosto=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-08-01')");
$dataOtrosAgosto=$totalOtrosAgosto->fetch_assoc();

$totalSeptiembre=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-09-01')");
$dataSeptiembre=$totalSeptiembre->fetch_assoc();
$totalOtrosSeptiembre=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-09-01')");
$dataOtrosSeptiembre=$totalOtrosSeptiembre->fetch_assoc();

$totalOctubre=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-10-01')");
$dataOctubre=$totalOctubre->fetch_assoc();
$totalOtrosOctubre=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-10-01')");
$dataOtrosOctubre=$totalOtrosOctubre->fetch_assoc();

$totalNoviembre=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-11-01')");
$dataNoviembre=$totalNoviembre->fetch_assoc();
$totalOtrosNoviembre=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-11-01')");
$dataOtrosNoviembre=$totalOtrosNoviembre->fetch_assoc();

$totalDiciembre=$conexion->query("SELECT SUM(VALOR) AS total FROM PAGOS WHERE MONTH(FECHA) = MONTH('2020-11-01')");
$dataDiciembre=$totalDiciembre->fetch_assoc();
$totalOtrosDiciembre=$conexion->query("SELECT SUM(VALOR) AS total FROM otrosingresos WHERE MONTH(FECHA) = MONTH('2020-11-01')");
$dataOtrosDiciembre=$totalOtrosDiciembre->fetch_assoc();

$ingresos=$dataEnero["total"]+$dataFebrero["total"]+$dataMarzo["total"]+$dataAbril["total"]+$dataMayo["total"]+$dataJunio["total"]+$dataJulio["total"]+$dataAgosto["total"]+$dataSeptiembre["total"]+$dataOctubre["total"]+$dataNoviembre["total"]+$dataDiciembre["total"];
$OtrosIngresos=$dataOtrosEnero["total"]+$dataOtrosFebrero["total"]+$dataOtrosMarzo["total"]+$dataOtrosAbril["total"]+$dataOtrosMayo["total"]+$dataOtrosJunio["total"]+$dataOtrosJulio["total"]+$dataOtrosAgosto["total"]+$dataOtrosSeptiembre["total"]+$dataOtrosOctubre["total"]+$dataOtrosNoviembre["total"]+$dataOtrosDiciembre["total"];



$data=array($ingresos,$OtrosIngresos);
?>
<script>
 // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: { 
    labels: ["Ingresos (ANUAL) $", "Otros Ingresos (ANUAL) $"],
    datasets: [{
      data: <?php echo json_encode($data);?>,
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


</script>