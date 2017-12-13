@extends('layouts.app') @section('title', 'Manual de usuario') @section('content')
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1>Manual de usuario
				@role(['admin', 'vendedor'])
					<a href="{{ asset('/pdf/Manual_Usuario.pdf') }}" class="btn btn-default pull-right" title="Ver en PDF" target="_blank">
						<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
					</a>
				@endrole
				</h1>
			</div>
			<table class="table table-bordered" style="margin: 0px;">
				<tbody>
					<tr id="registrarse">
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4>Registrarse</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												En la página de web seleccione la opción
												<a href="#" class="btn btn-warning">Iniciar sesión</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción 
												<a href="#iniciarsesion" class="btn btn-default">Registrarse</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario con sus datos y haga clic en
												<a href="#iniciarsesion" class="btn btn-primary">Registrarse</a>
											</li>
											<li class="list-group-item">
												<b> 4. </b>
												Se le redirigirá a la página de inicio
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr id="iniciarsesion">
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4>Iniciar sesión</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												En la página de web seleccione la opción
												<a href="#" class="btn btn-warning">Iniciar sesión</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Llene el formulario con sus datos y haga clic en
												<a href="#iniciarsesion" class="btn btn-primary">Iniciar sesión</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Se le redirigirá a la página de inicio
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Cerrar sesión</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Su nombre
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Deleccione la opción
												<a href="" class="btn btn-default">Salir</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Se le redirigirá a la página web
												<i class="fa fa-refresh fa-3x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					@role(['admin', 'vendedor'])
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Registrar venta</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Registrar
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción
												<a href="#" class="btn btn-default">Venta</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información que desee y guarde la venta, haciendo clic en
												<a href="#" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 4. </b>
												Le aparecerá un mensaje de confirmación, debe dar clic en
												<a href="#" class="btn btn-success">Confirmar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles de la venta
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Imprimir factura de venta</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<b>Condición: </b> estar viendo los detalles de una venta.
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Hacer clic en el icono
												<i class="fa fa-print fa-2x" aria-hidden="true"></i>, se abrirá una nueva pestaña.
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												En la esquina superior derecha, verá de nuevo el icono
												<i class="fa fa-print fa-2x" aria-hidden="true"></i>
												haga clic en él, se abrirá una ventana.
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Haga clic en
												<a href="#" class="btn btn-primary">Imprimir</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Registrar compra a proveedor</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Registrar
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción
												<a href="#" class="btn btn-default">Compra a proveedor</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información que desee y guarde la compra al proveedor, haciendo clic en
												<a href="#" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 4. </b>
												Le aparecerá un mensaje de confirmación, debe dar clic en
												<a href="#" class="btn btn-success">Confirmar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles de la compra
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Registrar gasto</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Registrar
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción
												<a href="" class="btn btn-default">Gasto</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información que desee y guarde el gasto. haciendo clic en
												<a href="" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 4. </b>
												Le aparecerá un mensaje de confirmación, debe dar clic en
												<a href="" class="btn btn-success">Confirmar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles del gasto
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Registrar pedido</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Registrar
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción
												<a href="" class="btn btn-default">Pedido</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información que desee y guarde el gasto. haciendo clic en
												<a href="" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 4. </b>
												Le aparecerá un mensaje de confirmación, debe dar clic en
												<a href="" class="btn btn-success">Confirmar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles del pedido
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Cambiar estado de pedido</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												En la página de inicio haga clic sobre el pedido que desee cambiar el estado
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione una de las opciones
												<br>
												<a href="" class="btn btn-danger">Cancelar el pedido
													<i class="fa fa-times"></i>
												</a>
												&nbsp;
												<a href="" class="btn btn-success">Facturar
													<i class="fa fa-pencil-square-o"></i>
												</a>
												&nbsp;
												<a href="" class="btn btn-success">En camino
													<i class="fa fa-motorcycle"></i>
												</a>
												&nbsp;
												<a href="" class="btn btn-success">Entregado
													<i class="fa fa-check-square-o"></i>
												</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información que desee y guarde el gasto. haciendo clic en
												<a href="" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 4. </b>
												Le aparecerá un mensaje de confirmación, debe dar clic en
												<a href="" class="btn btn-success">Confirmar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles del pedido
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					@endrole @role('admin')
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Agregar producto</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Configuración
													<i class="fa fa-cog"></i>
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												En la sección "Agregar", seleccione la opción
												<a href="" class="btn btn-default">Producto</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información del producto y guárdelo haciendo clic en
												<a href="" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles del producto
												<i class="fa fa-refresh fa-3x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Agregar tipo de gasto</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Configuración
													<i class="fa fa-cog"></i>
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												En la sección "Agregar", seleccione la opción
												<a href="" class="btn btn-default">Tipo de gasto</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información del tipo de gasto y guárdelo haciendo clic en
												<a href="" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles del tipo de gasto
												<i class="fa fa-refresh fa-3x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Agregar usuario</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Configuración
													<i class="fa fa-cog"></i>
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												En la sección "Agregar", seleccione la opción
												<a href="" class="btn btn-default">Usuario</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información del usuario, asígnele un rol y guárdelo haciendo clic en
												<a href="" class="btn btn-primary">Crear</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a la lista de usuarios de la aplicación
												<i class="fa fa-refresh fa-3x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Cambiar información general (IVA, NIT, correo y teléfono)</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Configuración
													<i class="fa fa-cog"></i>
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												En la sección "Cambiar", seleccione la opción
												<a href="" class="btn btn-default">Información general</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Edite la información que desee y guárdela haciendo clic en
												<a href="" class="btn btn-primary">Guardar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los detalles de información general
												<i class="fa fa-refresh fa-3x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Realizar estado de resultados</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Balances
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción
												<a href="" class="btn btn-default">Estado de resultados</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Seleccione la
												<span>Fecha inicio
												</span> y la
												<span>Fecha final</span>, y haga clic en
												<a href="" class="btn btn-primary">Buscar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le mostrará el estado de resultado
												<i class="fa fa-eye fa-3x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Realizar balance por productos</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												Ir a la barra de navegación superior y hacer clic en
												<a href="#" class="dropdown-toggle yellow btn " style="color: black">Balances
													<span class="caret">
													</span>
												</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción
												<a href="" class="btn btn-default">Por productos</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Seleccione la
												<span>Fecha inicio
												</span> y la
												<span>Fecha final</span>, y haga clic en
												<a href="" class="btn btn-primary">Buscar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le mostrará el balance por productos
												<i class="fa fa-eye fa-3x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					@endrole
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4> Cancelar pedido</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												En la página de inicio haga clic sobre el pedido que desee cambiar el estado
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Seleccione la opción
												<br>
												<a href="" class="btn btn-danger">Cancelar el pedido
													<i class="fa fa-times"></i>
												</a>
												&nbsp;
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Se cambiará el estado del pedido y se le redirigirá a los de detalles del pedido
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					@role('cliente')
					<tr>
						<td>
							<div class="accordion-container">
								<b class="accordion-titulo">
									<b>
										<h4>Hacer pedido</h4>
									</b>
									<span class="toggle-icon"></span>
								</b>
								<div class="accordion-content">
									<div style="padding: 0;">
										<ul class="list-group">
											<li class="list-group-item">
												<b> 1. </b>
												En la página de web seleccione la opción
												<a href="#" class="btn btn-warning">Hacer pedido</a>
											</li>
											<li class="list-group-item">
												<b> 2. </b>
												Inicie sesión el sistema
												<a href="#iniciarsesion" class="btn btn-primary">Iniciar sesión</a>
											</li>
											<li class="list-group-item">
												<b> 3. </b>
												Llene el formulario completo con la información que desee y guarde el pedido. haciendo clic en
												<a href="" class="btn btn-primary">Hacer pedido</a>
											</li>
											<li class="list-group-item">
												<b> 4. </b>
												Le aparecerá un mensaje de confirmación, debe dar clic en
												<a href="" class="btn btn-success">Confirmar</a>
											</li>
											<li class="list-group-item">
												<b> 5. </b>
												Se le redirigirá a los de detalles del pedido
												<i class="fa fa-refresh fa-2x"></i>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</td>
					</tr>
					@endrole
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection('content') @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection