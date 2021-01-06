<?php
if (isset($_POST['dateFrom'])) {
    $dateFrom = date('Y-m-d', strtotime($_POST['dateFrom']));
    $dateTo = date('Y-m-d', strtotime($_POST['dateTo']));
}
?>
<div class="container mt-4">
    <div class="row">
        <div class="col">

            <div class="row">
                <div class="col col-12 col-md-6">
                    <h1>LIBRO CAJA DETALLES</h1>
                </div>
                <div class="col col-12 col-md-6 text-right">
                    <a class="btn btn-success " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-plus-circle"></i> NUEVO
                    </a>
                </div>
            </div>
            <div class="dropdown-divider mt-3 mb-5"></div>
            <form action="" method="POST">
                <div class="row">
                    <div class="col col-12 col-md-5 col-sm-12">
                        <input class="form-control" type="date" placeholder="Fecha Desde" name="dateFrom" value="<?php echo date('Y-m-01');  ?>">
                    </div>
                    <div class="col col-12 col-md-5 col-sm-12">
                        <input class="form-control" type="date" placeholder="Fecha Hasta" name="dateTo" value="<?php echo date('Y-m-t');  ?>">
                    </div>
                    <div class="col col-12 col-md-2 col-sm-12">
                        <button type="submit" class="btn btn-info btn-block"><i class="far fa-search"></i> BUSCAR</button>
                    </div>
                </div>
            </form>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form action="../funciones/agregarLibroCajaDetalle.php" method="POST">
                        <div class="row">
                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <input type="date" name="fecha" class="form-control" placeholder="fecha">
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <input type="text" name="detalle" class="form-control" placeholder="detalle">
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <input type="text" name="dcto" class="form-control" placeholder="dcto">
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <input type="text" name="interno" class="form-control" placeholder="interno">
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <input type="text" name="ingreso" class="form-control" placeholder="ingreso">
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <input type="text" name="egreso" class="form-control" placeholder="egreso">
                            </div>
                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <input type="text" name="valor" class="form-control" placeholder="valor">

                            </div>


                            <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                <button type="submit" class="btn btn-success btn-block"><i class="far fa-save"></i> GUARDAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            require_once("./config/db.php");
            $pagos = $conexion->query("SELECT * FROM librocajadetalles");

            ?>

            <div class="table-responsive">
                <table style="margin-top:10px;" class="table table-hover">
                    <thead class="thead-dark text-uppercase">
                        <tr>
                            <th scope="col">fecha</th>
                            <th scope="col">detalle</th>
                            <th scope="col">dcto</th>
                            <th scope="col">interno</th>
                            <th scope="col">ingreso</th>
                            <th scope="col">egreso</th>
                            <th scope="col">saldo</th>

                            <th scope="col">opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
                            $total = $conexion->query(" SELECT sum(ingreso) as TotalValor FROM librocajadetalles WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
                            $datosTotal = $total->fetch_assoc();
                            $total = $conexion->query(" SELECT sum(egreso) as TotalValor FROM librocajadetalles WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
                            $datosEgreso = $total->fetch_assoc();
                            while ($datos = $pagos->fetch_assoc()) {

                                if (date('Y-m-d', strtotime($datos['fecha'])) >= $dateFrom && date('Y-m-d', strtotime($datos['fecha'])) <= $dateTo) {


                        ?>
                                    <tr>
                                        <th scope="row"> <?php echo $datos["fecha"]; ?> </th>
                                        <td><?php echo ($datos["detalle"]); ?></td>
                                        <td><?php echo ($datos["dcto"]); ?></td>
                                        <td><?php echo ($datos["interno"]); ?></td>
                                        <td>$ <?php echo ($datos["ingreso"]); ?></td>
                                        <td>$ <?php echo ($datos["egreso"]); ?></td>

                                        <td>$<?php echo number_format($datos["valor"]); ?></td>


                                        <td><a href="../funciones/eliminarLibroCajaDetalle.php?idLibroCajaDetalles=<?php echo $datos["idLibroCajaDetalles"]; ?>"><button type="button" class="btn btn-danger"><i class="far fa-trash"></i></button></a>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEditar-<?php echo $datos["idLibroCajaDetalles"]; ?>">
                                                <i class="far fa-edit"></i>
                                            </button>

                                            <div class="modal fade" id="ModalEditar-<?php echo $datos["idLibroCajaDetalles"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">MODO EDICION</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="editar-<?php echo $datos["idLibroCajaDetalles"]; ?>" action="../funciones/modificarLibroCajaDetalle.php" method="POST">
                                                                <div class="row">
                                                                    <div class="col col-12 col-md-12 col-sm-12 mt-2">

                                                                        <input type="date" name="fecha" class="form-control" placeholder=" fecha">
                                                                    </div>
                                                                    <div class="col col-12 col-md-12 col-sm-12 mt-2">

                                                                        <input type="text" name="detalle" class="form-control" placeholder=" detalle">
                                                                    </div>

                                                                    <div class="col col-12 col-md-6 col-sm-12 mt-2">

                                                                        <input type="text" name="dcto" class="form-control" placeholder="dcto">
                                                                    </div>
                                                                    <div class="col col-12 col-md-6 col-sm-12 mt-2">

                                                                        <input type="text" name="interno" class="form-control" placeholder="interno">
                                                                    </div>
                                                                    <div class="col col-12 col-md-6 col-sm-12 mt-2">

                                                                        <input type="text" name="ingreso" class="form-control" placeholder="ingreso">
                                                                    </div>
                                                                    <div class="col col-12 col-md-6 col-sm-12 mt-2">

                                                                        <input type="text" name="egreso" class="form-control" placeholder="egreso">
                                                                    </div>

                                                                    <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                                                        <input type="text" name="valor" class="form-control" placeholder="valor">
                                                                    </div>


                                                                    <div class="col col-12 col-md-6 col-sm-12 mt-2">
                                                                        <input type="hidden" name="idLibroCajaDetalles" value="<?php echo $datos["idLibroCajaDetalles"]; ?>">

                                                                    </div>


                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button form="editar-<?php echo $datos["idLibroCajaDetalles"]; ?>" type="submit" class="btn btn-warning"><i class="far fa-save"></i> ACTUALIZAR</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo '<div class="alert alert-warning mt-2" role="alert">Selecciona un rango de fechas y presiona el botón buscar</div>';
                        }
                        ?>

                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>

                            <th>TOTAL Ingreso: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
                                                    echo number_format($datosTotal["TotalValor"]);
                                                } ?></th>
                            <th>TOTAL Egreso: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
                                                    echo number_format($datosEgreso["TotalValor"]);
                                                } ?></th>
                            <th>TOTAL Saldo: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
                                                    echo number_format($datosTotal["TotalValor"]-$datosEgreso["TotalValor"]);
                                                } ?></th>
                        </tr>


                    </tbody>
                </table>
            </div>



            </tr>


            </tbody>
        </div>
    </div>
</div>