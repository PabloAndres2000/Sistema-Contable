<?php
if (isset($_POST['dateFrom'])) {
	$dateFrom = date('Y-m-d', strtotime($_POST['dateFrom']));
	$dateTo = date('Y-m-d', strtotime($_POST['dateTo']));
}
?>
<div class="container mt-4">
	<div class="row">
		<div class="col">

<h1>IMPUESTO IVA</h1>
			<p>

				<a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
					Nuevo
				</a>

			</p>
			<form action="" method="POST">
				<div class="row">
					<div class="col">
						<input  class="form-control" type="date" placeholder="Fecha Desde" name="dateFrom" value="<?php echo date ('Y-m-01');  ?>">
					</div>
					<div class="col">
						<input  class="form-control" type="date" placeholder="Fecha Hasta" name="dateTo" value="<?php echo date ('Y-m-t');  ?>">
					</div>
					<div class="col">
						<button type="submit" class="btn btn-success">BUSCAR</button>
					</div>
				</div>
			</form>
			<div class="collapse" id="collapseExample">
				<div class="card card-body">
					<form action="../funciones/agregarIva.php" method="POST">
						<div class="row">
							<div class="col">
								<input type="date" name="fecha" class="form-control" placeholder="Fecha">
							</div>
						
							<div class="col">
								<input type="text" name="valor" class="form-control" placeholder="Valor">
							</div>
							<div class="col">
								<button type="submit" class="btn btn-success">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
			require_once("./config/db.php");
			$pagos = $conexion->query("SELECT * FROM impuestoiva");

			?>

			<table style="margin-top:10px;" class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Fecha</th>
						<th scope="col">Valor</th>
						<th scope="col">Opciones</th>

					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_POST['dateFrom']) && isset($_POST['dateTo'])) {
						$total = $conexion->query(" SELECT sum(valor) as TotalValor FROM impuestoiva WHERE fecha>='$dateFrom' and fecha<='$dateTo'");
						$datosTotal = $total->fetch_assoc();
						while ($datos = $pagos->fetch_assoc()) {

							if (date('Y-m-d', strtotime($datos['fecha'])) >= $dateFrom && date('Y-m-d', strtotime($datos['fecha'])) <= $dateTo) {


					?>
								<tr>
									<th scope="row"> <?php echo $datos["fecha"]; ?> </th>
									
									<td>$<?php echo number_format($datos["valor"]); ?></td>
									<td><a href="../funciones/eliminarIva.php?idImpuestoIva=<?php echo $datos["idImpuestoIva"]; ?>"><button type="button" class="btn btn-danger"><i class="far fa-trash"></i></button></a>
										<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseEditar-<?php echo $datos["idImpuestoIva"]; ?>" aria-expanded="false" aria-controls="collapseExample">
											<i class="far fa-edit"></i>
										</button>

										<div class="collapse" id="collapseEditar-<?php echo $datos["idImpuestoIva"]; ?>">
											<div class="card card-body">
												<form action="../funciones/modificarImpuestoIva.php" method="POST">
													<div class="row">
														<div class="col">

															<input type="date" name="fecha" class="form-control" placeholder=" fecha">
														</div>
														

														<div class="col">
															<input type="hidden" name="idImpuestoIva" value="<?php echo $datos["idImpuestoIva"]; ?>">
															<input type="text" name="valor" class="form-control" placeholder=" Valor">
														</div>

														<div class="col">
															<button type="submit" class="btn btn-success">Actualizar</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</td>

								</tr>
					<?php
							}
						}
					} else {
						echo "<h2>seleccione un rango de fecha y presione buscar</h2>";
					}
					?>

					<tr>
						<th></th>
						

						<th>Total: $<?php if(isset($_POST['dateFrom']) && isset($_POST['dateTo'])){ echo number_format($datosTotal["TotalValor"]);} ?></th>
					</tr>


				</tbody>
			</table>



			</tr>


			</tbody>
		</div>
	</div>
</div>