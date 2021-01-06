<div class="container mt-4">
	<div class="row">
		<div class="col">
		<h1>SALDO MES ANTERIOR</h1>
			
			<?php
			require_once("./config/db.php");
			$pagos = $conexion->query("SELECT * FROM mesanterior");

			?>

			<table class="table">
				<thead class="thead-dark">
					<tr>

						<th scope="col">Valor</th>
						<th scope="col">Opciones</th>

					</tr>
				</thead>
				<tbody>
					<?php
					while ($datos = $pagos->fetch_assoc()) {


					?>
						<tr>

							<td>$<?php echo number_format($datos["valor"]); ?></td>
							<td>


								<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseEditar-<?php echo $datos["idMesAnterior"]; ?>" aria-expanded="false" aria-controls="collapseExample">
									<i class="far fa-edit"></i>
								</button>

								<div class="collapse" id="collapseEditar-<?php echo $datos["idMesAnterior"]; ?>">
									<div class="card card-body">
										<form action="../funciones/modificarMesAnterior.php" method="POST">
											<div class="row">

												<div class="col">
													<input type="hidden" name="idMesAnterior" value="<?php echo $datos["idMesAnterior"]; ?>">
													<input type="text" name="valor" class="form-control" placeholder="Nuevo Valor">
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
					?>
					<?php
					$total = $conexion->query(" SELECT sum(valor) as TotalValor FROM mesanterior");
					$datosTotal = $total->fetch_assoc();
					?>
					<tr>



						<th>Total: $<?php echo number_format($datosTotal["TotalValor"]); ?></th>
						
					</tr>

				</tbody>
			</table>


		</div>
	</div>
</div>