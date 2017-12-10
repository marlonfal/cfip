@extends('layouts.app') @section('title', 'Manual de usuario') @section('content')
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1>Manual de usuario
					<a href="{{ asset('/pdf/Manual_Usuario.pdf') }}" class="btn btn-default pull-right" title="Ver en PDF" target="_blank">
					<i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a>
				</h1>
			</div>
			<table class="table table-bordered" style="margin: 0px;">
				<tbody>
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
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection('content') @section('scripts')
<script src="{{ asset('js/form.js') }}"></script>
@endsection