
<div class="container mt-4">
	<div class="row">
		<div class="col">

			<div class="row">
				<div class="col col-12 col-md-6">
					<h1>USUARIOS</h1>
				</div>
				<div class="col col-12 col-md-6 text-right">
				<a class="btn btn-success " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
				<i class="far fa-plus-circle"></i> NUEVO 
				</a>
				</div>
			</div>
			
			
			<div class="collapse" id="collapseExample">
				<div class="card card-body">
					<form action="../funciones/agregarUsuarios.php" method="POST">
						<div class="row">
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="nombre" class="form-control" placeholder="nombre">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="correo" class="form-control" placeholder="correo">
							</div>
							<div class="col col-12 col-md-6 col-sm-12 mt-2">
								<input type="text" name="password" class="form-control" placeholder="contraseña">
							
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
			$pagos = $conexion->query("SELECT * FROM usuarios");

			?>

			<div class="table-responsive">
				<table style="margin-top:10px;" class="table table-hover">
					<thead class="thead-dark text-uppercase">
						<tr>
							<th scope="col">nombre</th>
							<th scope="col">correo</th>
							<th scope="col">opciones</th>

						</tr>
					</thead>
					<tbody>
						<?php
							while ($datos = $pagos->fetch_assoc()) {


						?>
									<tr>
										<th scope="row"> <?php echo $datos["nombre"]; ?> </th>
										<td><?php echo ($datos["correo"]); ?></td>


										<td><a href="../funciones/eliminarUsuarios.php?idUsuario=<?php echo $datos["idUsuario"]; ?>"><button type="button" class="btn btn-danger"><i class="far fa-trash"></i></button></a>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEditar-<?php echo $datos["idUsuario"]; ?>">
												<i class="far fa-edit"></i>
											</button>

											<div class="modal fade" id="ModalEditar-<?php echo $datos["idUsuario"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">MODO EDICION</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form id="editar-<?php echo $datos["idUsuario"]; ?>" action="../funciones/modificarUsuarios.php" method="POST">
																<div class="row">
																	<div class="col col-12 col-md-12 col-sm-12 mt-2">

																		<input type="text" name="nombre" class="form-control" placeholder=" nombre">
																	</div>
																	<div class="col col-12 col-md-12 col-sm-12 mt-2">

																		<input type="text" name="correo" class="form-control" placeholder=" correo">
																	</div>


																	
																	<div class="col col-12 col-md-6 col-sm-12 mt-2">

																		<input type="text" name="password" class="form-control" placeholder="contraseña">
																	</div>
																	
																

																	<div class="col col-12 col-md-6 col-sm-12 mt-2">
																		<input type="hidden" name="idUsuario" value="<?php echo $datos["idUsuario"]; ?>">

																	</div>


																</div>
															</form>
														</div>
														<div class="modal-footer">
															<button form="editar-<?php echo $datos["idUsuario"]; ?>" type="submit" class="btn btn-warning"><i class="far fa-save"></i> ACTUALIZAR</button>
														</div>
													</div>
												</div>
											</div>
										</td>

									</tr>
						<?php
								}
							
						
							
						
						?>

						

					</tbody>
				</table>
			</div>



			</tr>


			</tbody>
		</div>
	</div>
</div>