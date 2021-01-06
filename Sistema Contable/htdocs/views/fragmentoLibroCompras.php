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
					<h1>LIBRO COMPRA</h1>
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
					<form action="../funciones/agregarLibroCompra.php" method="POST">
						<div class="row">
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="date" name="fecha" class="form-control" placeholder="fecha">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="factura" class="form-control" placeholder="factura">
							</div>

							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="proveedor" class="form-control" placeholder="proveedor">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="rut" class="form-control" placeholder="rut">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="exento" class="form-control" placeholder="exento">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="neto" class="form-control" placeholder="neto">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="iva" class="form-control" placeholder="iva">
							</div>

							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="total" class="form-control" placeholder="total">
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
			$pagos = $conexion->query("SELECT * FROM librocompra");

			?>

			<div class="table-responsive">
				<table style="margin-top:10px;" class="table table-hover">
					<thead class="thead-dark text-uppercase">
						<tr>
							<th scope="col">fecha</th>

							<th scope="col">factura</th>

							<th scope="col">proveedor</th>
							<th scope="col">rut</th>
							<th scope="col">exento</th>
							<th scope="col">neto</th>
							<th scope="col">iva</th>

							<th scope="col">total</th>
							<th scope="col">opciones</th>

						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
							$total = $conexion->query(" SELECT sum(total) as TotalValor FROM librocompra WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
							$datosTotal = $total->fetch_assoc();

							while ($datos = $pagos->fetch_assoc()) {

								if (date('Y-m-d', strtotime($datos['fecha'])) >= $dateFrom && date('Y-m-d', strtotime($datos['fecha'])) <= $dateTo) {


						?>
									<tr>
										<th scope="row"> <?php echo $datos["fecha"]; ?> </th>

										<td><?php echo ($datos["factura"]); ?></td>

										<td><?php echo ($datos["proveedor"]); ?></td>
										<td><?php echo ($datos["rut"]); ?></td>
										<td>$<?php echo number_format($datos["exento"]); ?></td>
										<td>$<?php echo number_format($datos["neto"]); ?></td>
										<td>$<?php echo number_format($datos["iva"]); ?></td>

										<td>$<?php echo number_format($datos["total"]); ?></td>

										<td><a href="../funciones/eliminarLibroCompra.php?idLibroCompra=<?php echo $datos["idLibroCompra"]; ?>"><button type="button" class="btn btn-danger"><i class="far fa-trash"></i></button></a>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEditar-<?php echo $datos["idLibroCompra"]; ?>">
												<i class="far fa-edit"></i>
											</button>

											<div class="modal fade" id="ModalEditar-<?php echo $datos["idLibroCompra"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">MODO EDICION</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form id="editar-<?php echo $datos["idLibroCompra"]; ?>" action="../funciones/modificarLibroCompra.php" method="POST">
																<div class="row">
																	<div class="col col-12 col-md-12 col-sm-12 mt-2">

																		<input type="date" name="fecha" class="form-control" placeholder=" fecha">
																	</div>


																	<div class="col col-12 col-md-6 col-sm-12 mt-2 ">

																		<input type="text" name="factura" class="form-control" placeholder=" factura">
																	</div>

																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="proveedor" class="form-control" placeholder="proveedor">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="rut" class="form-control" placeholder="rut">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="exento" class="form-control" placeholder="exento">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="neto" class="form-control" placeholder="neto">
																	</div>
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="iva" class="form-control" placeholder=" iva">
																	</div>

																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="total" class="form-control" placeholder="total">
																	</div>

																	<div class="col col-12 col-md-6 col-sm-12 mt-2">
																		<input type="hidden" name="idLibroCompra" value="<?php echo $datos["idLibroCompra"]; ?>">

																	</div>


																</div>
															</form>
														</div>
														<div class="modal-footer">
															<button form="editar-<?php echo $datos["idLibroCompra"]; ?>" type="submit" class="btn btn-warning"><i class="far fa-save"></i> ACTUALIZAR</button>
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

							<th>TOTAL FACTURAS: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
														echo number_format($datosTotal["TotalValor"]);
													} ?></th>

						</tr>


					</tbody>
				</table>
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
									<h1>NOTAS CREDITOS</h1>
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
									<form action="../funciones/agregarNotaCredito.php" method="POST">
										<div class="row">
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="date" name="fecha" class="form-control" placeholder="fecha">
											</div>
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="text" name="factura" class="form-control" placeholder="factura">
											</div>
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="text" name="provedor" class="form-control" placeholder="provedor">
											</div>
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="text" name="rut" class="form-control" placeholder="rut">
											</div>
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="text" name="exento" class="form-control" placeholder="exento">
											</div>
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="text" name="neto" class="form-control" placeholder="neto">

											</div>
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="text" name="iva" class="form-control" placeholder="iva">
											</div>
											<div class="col col-12 col-md-6 col-sm-12 mt-2">
												<input type="text" name="total" class="form-control" placeholder="total">
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
							$pagos = $conexion->query("SELECT * FROM notacredito");

							?>

							<div class="table-responsive">
								<table style="margin-top:10px;" class="table table-hover">
									<thead class="thead-dark text-uppercase">
										<tr>
											<th scope="col">fecha</th>

											<th scope="col">factura</th>

											<th scope="col">proveedor</th>
											<th scope="col">rut</th>
											<th scope="col">exento</th>
											<th scope="col">neto</th>
											<th scope="col">iva</th>

											<th scope="col">total</th>
											<th scope="col">opciones</th>

										</tr>
									</thead>
									<tbody>
										<?php
										if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {

											$totalNotaCredito = $conexion->query(" SELECT sum(total) as TotalValor FROM notacredito WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
											$datosNotaCredito = $totalNotaCredito->fetch_assoc();
											$totalCredito = $conexion->query(" SELECT sum(total) as TotalValor FROM notacredito WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
											$datosNota = $totalCredito->fetch_assoc();
											while ($datos = $pagos->fetch_assoc()) {

												if (date('Y-m-d', strtotime($datos['fecha'])) >= $dateFrom && date('Y-m-d', strtotime($datos['fecha'])) <= $dateTo) {


										?>
													<tr>
														<th scope="row"> <?php echo $datos["fecha"]; ?> </th>

														<td><?php echo ($datos["factura"]); ?></td>

														<td><?php echo ($datos["provedor"]); ?></td>
														<td><?php echo ($datos["rut"]); ?></td>
														<td>$<?php echo number_format($datos["exento"]); ?></td>
														<td>$<?php echo number_format($datos["neto"]); ?></td>
														<td>$<?php echo number_format($datos["iva"]); ?></td>

														<td>$<?php echo number_format($datos["total"]); ?></td>


														<td><a href="../funciones/eliminarNotaCredito.php?idNotaCredito=<?php echo $datos["idNotaCredito"]; ?>"><button type="button" class="btn btn-danger"><i class="far fa-trash"></i></button></a>
															<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEditar-<?php echo $datos["idNotaCredito"]; ?>">
																<i class="far fa-edit"></i>
															</button>

															<div class="modal fade" id="ModalEditar-<?php echo $datos["idNotaCredito"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">MODO EDICION</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form id="editar-<?php echo $datos["idNotaCredito"]; ?>" action="../funciones/modificarNotaCredito.php" method="POST">
																				<div class="row">
																					<div class="col col-12 col-md-12 col-sm-12 mt-2">

																						<input type="date" name="fecha" class="form-control" placeholder=" fecha">
																					</div>



																					<div class="col col-12 col-md-6 col-sm-12 mt-2">

																						<input type="text" name="factura" class="form-control" placeholder="factura">
																					</div>
																					<div class="col col-12 col-md-6 col-sm-12 mt-2">

																						<input type="text" name="provedor" class="form-control" placeholder="provedor">
																					</div>
																					<div class="col col-12 col-md-6 col-sm-12 mt-2">

																						<input type="text" name="rut" class="form-control" placeholder="rut">
																					</div>
																					<div class="col col-12 col-md-6 col-sm-12 mt-2">

																						<input type="text" name="exento" class="form-control" placeholder="exento">
																					</div>
																					<div class="col col-12 col-md-6 col-sm-12 mt-2">

																						<input type="text" name="neto" class="form-control" placeholder="neto">
																					</div>
																					<div class="col col-12 col-md-6 col-sm-12 mt-2">

																						<input type="text" name="iva" class="form-control" placeholder="iva">
																					</div>

																					<div class="col col-12 col-md-6 col-sm-12 mt-2">
																						<input type="text" name="total" class="form-control" placeholder="total">
																					</div>


																					<div class="col col-12 col-md-6 col-sm-12 mt-2">
																						<input type="hidden" name="idNotaCredito" value="<?php echo $datos["idNotaCredito"]; ?>">

																					</div>


																				</div>
																			</form>
																		</div>
																		<div class="modal-footer">
																			<button form="editar-<?php echo $datos["idNotaCredito"]; ?>" type="submit" class="btn btn-warning"><i class="far fa-save"></i> ACTUALIZAR</button>
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
											

											<th>TOTAL COMPRAS: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
																	echo number_format($datosTotal["TotalValor"] - $datosNotaCredito["TotalValor"]);
																} ?></th>
																<th></th>
																<th></th>
																<th></th>
																<th></th>
																<th></th>
											<th>Total Nta Credito: $<?php if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
																			echo number_format($datosNotaCredito["TotalValor"]);
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


			</div>



			</tr>


			</tbody>
		</div>
	</div>
</div>