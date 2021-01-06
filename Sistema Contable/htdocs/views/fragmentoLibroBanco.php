<?php
require_once("./config/db.php");
if (isset($_POST["mes"])) {
    $mesSeleccionado = $_POST["mes"];
    $mesAnterior = $conexion->query("SELECT valor FROM mesanterior");
    $dataMesAnterior = $mesAnterior->fetch_assoc();
    $pagosRecidentes = $conexion->query(" SELECT sum(valor) as totalPagosRecidentes FROM pagos WHERE MONTH(fecha)='$mesSeleccionado'");
    $datapagosRecidentes = $pagosRecidentes->fetch_assoc();
    $otrosIngresos = $conexion->query(" SELECT sum(valor) as totalOtrosIngresos FROM otrosingresos WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataOtrosIngresos = $otrosIngresos->fetch_assoc();
    $provedores = $conexion->query("SELECT sum(valor) as totalProvedores FROM provedores WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataProvedores = $provedores->fetch_assoc();
    $cotizaciones = $conexion->query(" SELECT sum(valor) as totalCotizaciones FROM cotizaciones WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataCotizaciones = $cotizaciones->fetch_assoc();
    $iva = $conexion->query(" SELECT sum(valor) as totalIva FROM impuestoiva WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataiva = $iva->fetch_assoc();
    $Remuneraciones = $conexion->query(" SELECT sum(valor) as totalRemuneraciones FROM remuneraciones WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataRemuneraciones = $Remuneraciones->fetch_assoc();
    $Honorarios = $conexion->query(" SELECT sum(valor) as totalHonorarios FROM honorarios WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataHonorarios = $Honorarios->fetch_assoc();
    $Arriendo = $conexion->query(" SELECT sum(valor) as totalArriendo FROM arriendo WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataArriendo = $Arriendo->fetch_assoc();
    $otrosGastos = $conexion->query(" SELECT sum(valor) as totalOtrosGastos FROM otrosgastos WHERE MONTH(fecha)='$mesSeleccionado'");
    $dataOtrosGastos = $otrosGastos->fetch_assoc();
    $totalIngresos = $dataMesAnterior["valor"] + $datapagosRecidentes["totalPagosRecidentes"] + $dataOtrosIngresos["totalOtrosIngresos"];
    $totalEgresos = $dataProvedores["totalProvedores"] + $dataCotizaciones["totalCotizaciones"] + $dataiva["totalIva"] + $dataRemuneraciones["totalRemuneraciones"] + $dataHonorarios["totalHonorarios"] + $dataArriendo["totalArriendo"] + $dataOtrosGastos["totalOtrosGastos"];
}








?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>LIBRO BANCO</h2>
            <div class="row">
                <div class="col cols-12 col-sm-12 col-md-4 mb-3">
                    <form action="" method="POST">
                        <select onchange="this.form.submit()" name="mes" class="form-control" placeholder="mes" id="mes">
                            <option value="" disabled selected>Seleccione Una Opcion</option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </form>
                </div>
            </div>
            <?php if (isset($_POST["mes"])) { ?>
                <table class="table">
                    <thead class="bg-success">
                        <tr>

                            <th class="text-white" scope="col">INGRESO</th>
                            <th class="text-white" scope="col">VALOR</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>SALDO MES ANTERIOR</th>
                            <th>$ <?php echo number_format($dataMesAnterior["valor"]); ?></th>

                        </tr>
                        <tr>
                            <th>PAGOS RESIDENTES</th>
                            <th>$ <?php echo number_format($datapagosRecidentes["totalPagosRecidentes"]); ?></th>

                        </tr>
                        <tr>
                            <th>OTROS INGRESOS</th>
                            <th>$ <?php echo number_format($dataOtrosIngresos["totalOtrosIngresos"]); ?></th>

                        </tr>
                        <tr>
                            <th>TOTAL INGRESOS</th>
                            <th>$ <?php echo number_format($totalIngresos); ?></th>

                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead class="bg-danger ">
                        <tr>

                            <th class="text-white" scope="col">EGRESOS</th>
                            <th class="text-white" scope="col">VALOR</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>PROVEEDORES</th>
                            <th>$ <?php echo number_format($dataProvedores["totalProvedores"]); ?></th>

                        </tr>
                        <tr>
                            <th>COTIZACIONES</th>
                            <th>$ <?php echo number_format($dataCotizaciones["totalCotizaciones"]); ?></th>

                        </tr>
                        <tr>
                            <th>IMPUESTO IVA </th>
                            <th>$ <?php echo number_format($dataiva["totalIva"]); ?></th>

                        </tr>
                        <tr>
                            <th>REMUNERACIONES </th>
                            <th>$ <?php echo number_format($dataRemuneraciones["totalRemuneraciones"]); ?></th>

                        </tr>
                        <tr>
                            <th>HONORARIOS </th>
                            <th>$ <?php echo number_format($dataHonorarios["totalHonorarios"]); ?></th>

                        </tr>
                        <tr>
                            <th>ARRIENDO </th>
                            <th>$ <?php echo number_format($dataArriendo["totalArriendo"]); ?></th>

                        </tr>
                        <tr>
                            <th>OTROS GASTOS </th>
                            <th>$ <?php echo number_format($dataOtrosGastos["totalOtrosGastos"]); ?></th>

                        </tr>
                        <tr>
                            <th>TOTAL EGRESOS </th>
                            <th>$ <?php echo number_format($totalEgresos); ?></th>

                        </tr>
                </table>
                <table class="table">
                    <thead class="bg-warning ">
                        <tr>

                            <th class="text-white" scope="col">SALDO PROXIMO MES</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>

                            <th class="text-white" scope="col">VALOR </th>
                            <th class="text-white" scope="col">$ <?php echo number_format($totalIngresos - $totalEgresos); ?></th>




                            </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    Seleccione Un Mes
                </div>
            <?php } ?>


        </div>
    </div>
</div>
