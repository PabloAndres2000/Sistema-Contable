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
					<h1>LIBRO CAJA</h1>
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
					<form action="../funciones/agregarLibroCaja.php" method="POST">
						<div class="row">
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="date" name="fecha" class="form-control" placeholder="fecha">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="otros" class="form-control" placeholder="otros">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="residentes" class="form-control" placeholder="residentes">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="proveedores" class="form-control" placeholder="proveedores">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="cotizaciones" class="form-control" placeholder="cotizaciones">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="iva" class="form-control" placeholder="iva">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">

								<input type="text" name="sueldos" class="form-control" placeholder="sueldos">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">

								<input type="text" name="honorarios" class="form-control" placeholder="honorarios">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">

								<input type="text" name="arriendos" class="form-control" placeholder="arriendos">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">

								<input type="text" name="otrosgastos" class="form-control" placeholder="otrosgastos">
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
			$pagos = $conexion->query("SELECT * FROM librocaja");

			?>

			<div class="table-responsive">
				<table style="margin-top:10px;" class="table table-hover">
					<thead class="thead-dark text-uppercase">
						<tr>
							<th scope="col">fecha</th>

							<th scope="col">otros Ingresos</th>
							<th scope="col">residentes</th>
							<th scope="col">proveedores</th>
							<th scope="col">cotizaciones</th>
							<th scope="col">iva</th>
							<th scope="col">sueldos</th>
							<th scope="col">honorarios</th>
							<th scope="col">arriendos</th>
							<th scope="col">otrosgastos</th>



							<th scope="col">opciones</th>

						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
							$totalOtros = $conexion->query(" SELECT sum(otros) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosOtros = $totalOtros->fetch_assoc();
							$totalResidentes = $conexion->query(" SELECT sum(residentes) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosResidentes = $totalResidentes->fetch_assoc();
							$totalProveedores = $conexion->query(" SELECT sum(proveedores) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosProveedores = $totalProveedores->fetch_assoc();
							$totalCotizaciones = $conexion->query(" SELECT sum(cotizaciones) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosCotizaciones = $totalCotizaciones->fetch_assoc();
							$totalIva = $conexion->query(" SELECT sum(iva) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosIva = $totalIva->fetch_assoc();
							$totalSueldos = $conexion->query(" SELECT sum(sueldos) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosSueldos = $totalSueldos->fetch_assoc();
							$totalHonorarios = $conexion->query(" SELECT sum(honorarios) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosHonorarios = $totalHonorarios->fetch_assoc();
							$totalArriendos = $conexion->query(" SELECT sum(arriendos) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosArriendos = $totalArriendos->fetch_assoc();
							$totalOtrosGastos = $conexion->query(" SELECT sum(otrosgastos) as TotalValor FROM librocaja WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosOtrosGastos = $totalOtrosGastos->fetch_assoc();

							while ($datos = $pagos->fetch_assoc()) {

								if (date('Y-m-d', strtotime($datos['fecha'])) >= $dateFrom && date('Y-m-d', strtotime($datos['fecha'])) <= $dateTo) {


						?>
									<tr>
										<th scope="row"> <?php echo $datos["fecha"]; ?> </th>

										<td>$<?php echo ($datos["otros"]); ?></td>
										<td>$<?php echo ($datos["residentes"]); ?></td>
										<td>$<?php echo ($datos["proveedores"]); ?></td>
										<td>$<?php echo ($datos["cotizaciones"]); ?></td>
										<td>$<?php echo ($datos["iva"]); ?></td>
										<td>$<?php echo number_format($datos["sueldos"]); ?></td>

										<td>$<?php echo number_format($datos["honorarios"]); ?></td>
										<td>$<?php echo number_format($datos["arriendos"]); ?></td>
										<td>$<?php echo number_format($datos["otrosgastos"]); ?></td>



										<td><a href="../funciones/eliminarLibroCaja.php?idLibroCaja=<?php echo $datos["idLibroCaja"]; ?>"><button type="button" class="btn btn-danger"><i class="far fa-trash"></i></button></a>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEditar-<?php echo $datos["idLibroCaja"]; ?>">
												<i class="far fa-edit"></i>
											</button>

											<div class="modal fade" id="ModalEditar-<?php echo $datos["idLibroCaja"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">MODO EDICION</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form id="editar-<?php echo $datos["idLibroCaja"]; ?>" action="../funciones/modificarLibroCaja.php" method="POST">
																<div class="row">
																	<div class="col col-12 col-md-12 col-sm-12 mt-2">

																		<input type="date" name="fecha" class="form-control" placeholder=" fecha">
																	</div>


																	<div class="col col-12 col-md-6 col-sm-12 mt-2 ">

																		<input type="text" name="otros" class="form-control" placeholder=" otros">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="residentes" class="form-control" placeholder="residentes">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="proveedores" class="form-control" placeholder="proveedores">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="cotizaciones" class="form-control" placeholder="cotizaciones">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="iva" class="form-control" placeholder="iva">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="sueldos" class="form-control" placeholder="sueldos">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="honorarios" class="form-control" placeholder="honorarios">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="arriendos" class="form-control" placeholder="arriendos">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="otrosgastos" class="form-control" placeholder="otrosgastos">
																	</div>





																	<div class="col col-12 col-md-6 col-sm-12 mt-2">
																		<input type="hidden" name="idLibroCaja" value="<?php echo $datos["idLibroCaja"]; ?>">

																	</div>


																</div>
															</form>
														</div>
														<div class="modal-footer">
															<button form="editar-<?php echo $datos["idLibroCaja"]; ?>" type="submit" class="btn btn-warning"><i class="far fa-save"></i> ACTUALIZAR</button>
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

							<th>TOTAL OTROS INGRESOS: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
															echo number_format($datosOtros["TotalValor"]);
														} ?></th>
							<th>TOTAL RESIDENTES: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
														echo number_format($datosResidentes["TotalValor"]);
													} ?></th>
							<th>TOTAL PROVEEDORES: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
														echo number_format($datosProveedores["TotalValor"]);
													} ?></th>
							<th>TOTAL COTIZACIONES: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
															echo number_format($datosCotizaciones["TotalValor"]);
														} ?></th>
							<th>TOTAL IVA: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
												echo number_format($datosIva["TotalValor"]);
											} ?></th>
							<th>TOTAL SUELDOS: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
													echo number_format($datosSueldos["TotalValor"]);
												} ?></th>
							<th>TOTAL HONORARIOS: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
														echo number_format($datosHonorarios["TotalValor"]);
													} ?></th>
							<th>TOTAL ARRIENDOS: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
														echo number_format($datosArriendos["TotalValor"]);
													} ?></th>
							<th>TOTAL OTROS GASTOS: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
														echo number_format($datosOtrosGastos["TotalValor"]);
													} ?></th>
							</th>
						</tr>


					</tbody>
				</table>
			</div>



			</tr>


			</tbody>
		</div>
	</div>
</div>