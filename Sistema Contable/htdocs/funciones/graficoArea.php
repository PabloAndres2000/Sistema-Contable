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

$ingresosEnero=$dataEnero["total"]+$dataOtrosEnero["total"];
$ingresosFebrero=$dataFebrero["total"]+$dataOtrosFebrero["total"];
$ingresosMarzo=$dataMarzo["total"]+$dataOtrosMarzo["total"];
$ingresosAbril=$dataAbril["total"]+$dataOtrosAbril["total"];
$ingresosMayo=$dataMayo["total"]+$dataOtrosMayo["total"];
$ingresosJunio=$dataJunio["total"]+$dataOtrosJunio["total"];
$ingresosJulio=$dataJulio["total"]+$dataOtrosJulio["total"];
$ingresosAgosto=$dataAgosto["total"]+$dataOtrosAgosto["total"];
$ingresosSeptiembre=$dataSeptiembre["total"]+$dataOtrosSeptiembre["total"];
$ingresosOctubre=$dataOctubre["total"]+$dataOtrosOctubre["total"];
$ingresosNoviembre=$dataNoviembre["total"]+$dataOtrosNoviembre["total"];
$ingresosDiciembre=$dataDiciembre["total"]+$dataOtrosDiciembre["total"];




$data=array($ingresosEnero,$ingresosFebrero,$ingresosMarzo,$ingresosAbril,$ingresosMayo,$ingresosJunio,$ingresosJulio,$ingresosAgosto,$ingresosSeptiembre,$ingresosOctubre,$ingresosNoviembre,$ingresosDiciembre);
?>
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    datasets: [{
      label: "GANANCIAS",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo json_encode($data); ?>
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>