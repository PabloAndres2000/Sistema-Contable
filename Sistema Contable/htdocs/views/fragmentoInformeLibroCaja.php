<?php

if (isset($_POST["mes"])) {
    $mesSeleccionado = $_POST["mes"];
    $otros = $conexion->query("SELECT sum(otros) as TotalOtrosIngresos,sum(residentes) as TotalResidentes,sum(proveedores) as TotalProveedores,sum(cotizaciones) as TotalCotizaciones,sum(iva) as TotalIva,sum(sueldos) as TotalSueldos,sum(honorarios) as TotalHonorarios,sum(arriendos) as TotalArriendos,sum(otrosgastos) as TotalOtrosGastos FROM librocaja WHERE MONTH(fecha)='$mesSeleccionado' ");
    $dataOtros = $otros->fetch_assoc();
}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>INFORME LIBRO CAJA</h2>


        </div>
    </div>
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

                    <th class="text-white" scope="col">INGRESOS</th>
                    <th class="text-white" scope="col">VALOR</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>OTROS INGRESOS</th>
                    <th>$ <?php echo number_format($dataOtros["TotalOtrosIngresos"]); ?></th>

                </tr>
                <tr>
                    <th>RESIDENTES</th>
                    <th>$ <?php echo number_format($dataOtros["TotalResidentes"]); ?></th>

                </tr>
                <tr>
                    <th>TOTALES INGRESOS</th>
                    <th>$ <?php echo number_format($dataOtros["TotalResidentes"] + $dataOtros["TotalOtrosIngresos"]); ?></th>

                </tr>
                <tr>
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
                    <th>$ <?php echo number_format($dataOtros["TotalProveedores"]); ?></th>

                </tr>
                <tr>
                    <th>COTIZACIONES</th>
                    <th>$ <?php echo number_format($dataOtros["TotalCotizaciones"]); ?></th>

                </tr>
                <tr>
                    <th>IVA</th>
                    <th>$ <?php echo number_format($dataOtros["TotalIva"]); ?></th>
                </tr>
                <tr>
                    <th>SUELDOS</th>
                    <th>$ <?php echo number_format($dataOtros["TotalSueldos"]); ?></th>
                </tr>
                <tr>
                    <th>HONORARIOS</th>
                    <th>$ <?php echo number_format($dataOtros["TotalHonorarios"]); ?></th>
                </tr>
                <tr>
                    <th>ARRIENDOS</th>
                    <th>$ <?php echo number_format($dataOtros["TotalArriendos"]); ?></th>
                </tr>
                <tr>
                    <th>OTROS GASTOS</th>
                    <th>$ <?php echo number_format($dataOtros["TotalOtrosGastos"]); ?></th>
                </tr>
                <th>TOTAL EGRESOS</th>
                <th>$ <?php echo number_format($dataOtros["TotalProveedores"] + $dataOtros["TotalCotizaciones"] + $dataOtros["TotalIva"] + $dataOtros["TotalSueldos"] + $dataOtros["TotalHonorarios"] + $dataOtros["TotalArriendos"] + $dataOtros["TotalOtrosGastos"]); ?></th>
                </tr>
        </table>
        <table class="table">
            <thead class="bg-warning ">
                <tr>

                    <th class="text-white" scope="col">SALDO PROXIMO MES </th>
                    <th class="text-white" scope="col">$ <?php echo number_format($dataOtros["TotalProveedores"] + $dataOtros["TotalCotizaciones"] + $dataOtros["TotalIva"] + $dataOtros["TotalSueldos"] + $dataOtros["TotalHonorarios"] + $dataOtros["TotalArriendos"] + $dataOtros["TotalOtrosGastos"] - $dataOtros["TotalResidentes"] - $dataOtros["TotalOtrosIngresos"]); ?></th>
                </tr>
            </thead>
        </table>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            Seleccione Un Mes
        </div>
    <?php } ?>